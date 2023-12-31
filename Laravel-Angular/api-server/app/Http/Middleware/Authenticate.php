<?php

namespace App\Http\Middleware;


use App\Services\AuthService;
use Closure;
use Illuminate\Http\Request;

class Authenticate
{
    public function __construct(private readonly AuthService $authService)
    {
    }

    public function handle(Request $request, Closure $next)
    {
        $authToken = $request->cookie('auth-token');

        if ($authToken === null) {
            return response()->json('Your application is not authorised', 401);
        }

        $authInfo = $this->authService->getAuthInfo($authToken);

        if ($authInfo === null) {
            return response()->json('Your application is not authorised', 401);
        }

        $request->attributes->add(['authInfo' => $authInfo]);

        return $next($request);
    }
}
