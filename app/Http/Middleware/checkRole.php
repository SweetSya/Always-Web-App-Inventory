<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\CheckRole as Middleware;

use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class checkRole {
    public function handle(Request $request, Closure $next) {
        $roles = array_slice(func_get_args(), 2);
        $user = Auth::user();
        
        foreach ($roles as $role) {
            if(isset($user->role))
                if($user->role == $role) {
                    return $next($request);
                }
            }
            
        return back()->with(['checkRoleInfo' => 'Inssuficient access, please log in with the corresponding account!']);
    }
}