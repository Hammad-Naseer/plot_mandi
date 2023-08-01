<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use StoredProcedureHelper;

class VerifyEmail
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = $request->input('email');
        $getUser = StoredProcedureHelper::executeStoredProcedure("[dbo].[uspgetUserFromEmail]", [$email],1);
        if (!empty($getUser)) {
            $user = (object) $getUser[0];
            if ($user->email_verified_at == null OR empty($user->email_verified_at)) {
                return errorResponse("Please Verify Email", 400);
                // return Redirect::route('verification.notice');
            }
        } else {
            // User not found in the database
            return errorResponse("User not found", 404);
        }
        
        return $next($request);
    }
}
