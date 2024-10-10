<?php

namespace App\Http\Middleware;

use App\Http\Requests\Api\ApiResponse;
use Closure;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;
use Symfony\Component\HttpFoundation\Response;

class ApiAuthenticate
{
    use ApiResponse;

    /**
     * Handle an incoming request.
     *
     * @param Closure(Request): (Response) $next
     */
    public function handle(Request $request, Closure $next): \Inertia\Response|JsonResponse
    {
        if (!Auth::guard('api')->check()) {
            return response()->json()->setStatusCode(Response::HTTP_UNAUTHORIZED);
        }
        if (!Auth::guard('web')->check()) {
            return Inertia::render('Error', [
                'status' => Response::HTTP_UNAUTHORIZED,
            ]);
        }

        return $next($request);
    }
}
