<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class AuthGates
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
        $user = Auth::user();
        $rawSQL = "
			SELECT LOWER(CONCAT_WS('_',privileges.privilegeCode,accessLevel.accessLevel)) AS permission
			FROM userRole
			INNER JOIN rolePrivilege ON rolePrivilege.roleID = userRole.roleID
			INNER JOIN privileges ON privileges.privilegeID = rolePrivilege.privilegeID
			INNER JOIN accessLevel ON accessLevel.accessLevelID = privileges.accessLevelID
			WHERE userRole.userID = " ;

        if (!app()->runningInConsole() && $user) {
            $rawSQL .= $user->userID;
            $userPermissions = DB::select($rawSQL);
            foreach ($userPermissions as $permission) {
                Gate::define($permission->permission, function () {
                    return true;
                });
            }

            // Settings stuff
            // \App\Services\SettingService::initializeSettings();
        }
        return $next($request);
    }
}
