<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Traits\HasPermissions;
use Spatie\Permission\Models\Permission;



class CheckPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();
        $user = User::find(Auth::user()->id)->getPermissions();
        $perm = json_decode($user, true);
        $permission = $perm['permissions'];
        // echo $routeName;
        // dd($perm['permissions']);
        if (in_array($routeName, $permission))
        {
            return $next($request);
        // dd('yes');
        }
        else
        {
        // dd('no');
        return redirect(route('home'))->withErrors(['AuthError' => 'You does not have the permissions to access. Please contact administrator for permission.']);
        }
        // $role_name = Auth::user()->roles->pluck('id');
        // $per = Auth::user()->getallPermissions()->pluck('id');
        // $permissions = $role_name->permissions->pluck('name');
        // $permission = $role_name->getAllPermissions();
        // $routeName = $request->route()->getName();
        // echo $role_name;
        // dd($permission);
        return $next($request);
    }
}
