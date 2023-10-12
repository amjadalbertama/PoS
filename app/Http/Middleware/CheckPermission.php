<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use App\Models\Permission;
use App\Models\RoleHasPermission;

class CheckPermission
{
    public function handle($request, Closure $next, $permissionName)
    {
        // Mendapatkan peran pengguna saat ini
        $user = Auth::user();

        // Mencari izin yang sesuai dari tabel permissions
        $permission = Permission::where('name', $permissionName)->first();

        if ($user && $permission) {
            // Memeriksa apakah pengguna memiliki izin yang sesuai dalam tabel role_has_permissions
            $hasPermission = RoleHasPermission::where('role_id', $user->role_id)
                ->where('permission_id', $permission->id)
                ->exists();

            if ($hasPermission) {
                return $next($request);
            }
        }

        // Redirect atau tampilkan pesan error jika pengguna tidak memiliki izin
        return redirect('/')->with('error', 'Anda tidak memiliki izin untuk akses halaman ini.');
    }
}
