<?php
// app/Http/Middleware/RoleMiddleware.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, $role)
    {
        // Convert the string role name to a Role object
        $roleObject = Role::findByName($role);

        if (!Auth::check() || !Auth::user()->hasRole($roleObject)) {
            // Redirect or abort if the user does not have the required role
            return redirect('/'); // Or abort(403);
        }

        return $next($request);
    }
}
