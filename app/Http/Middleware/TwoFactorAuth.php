<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use StoredProcedureHelper;

class TwoFactorAuth
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
            if ($user->two_factor_enabled == 1) {
                return successResponse(array("message" => "Two Factor Enabled"),200,"success");
                // return redirect()->route('enable.2fa'); // Replace with your 2FA setup route
            }
        } else {
            // User not found in the database
            return errorResponse("User not found", 404);
        }
        
        return $next($request);
    }
}
