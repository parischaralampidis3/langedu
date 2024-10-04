<?php 


namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Add this if you want to use Auth facade

class CheckSuspended
{
    public function handle(Request $request, Closure $next)
    {
        // Check if the user is authenticated and if they are suspended
        if (auth()->check()) {
            $user = auth()->user();
            
            // Ensure that the user has a student relationship
            if ($user->student && $user->student->is_suspended) {
                // Log the user out if they are suspended
                Auth::logout(); // You can also use auth()->logout();
                
                // Redirect to login with an error message
                return redirect()->route('login')->with('error', 'Your account is suspended.');
            }
        }

        // Allow the request to proceed
        return $next($request);
    }
}
