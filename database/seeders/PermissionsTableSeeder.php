<?php

namespace Database\Seeders;

use App\Models\Menu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    public function run()
    {
        // Mendapatkan daftar menu dari tabel menus dengan parent_id null
        $menus = Menu::where('parent_id', null)->get();

        foreach ($menus as $menu) {
            // Ubah nama menu menjadi lowercase dan ganti spasi dengan garis bawah
            $permissionName = str_replace(' ', '_', strtolower($menu->name));

            // Buat permission hanya berdasarkan aksi yang sesuai
            if ($menu->name === 'dashboard') {
                Permission::firstOrCreate(['name' => $permissionName . '.view']);
            } elseif ($menu->name === 'settings') {
                Permission::firstOrCreate(['name' => $permissionName . '.view']);
                Permission::firstOrCreate(['name' => $permissionName . '.update']);
            } else {
                Permission::firstOrCreate(['name' => $permissionName . '.view']);
                Permission::firstOrCreate(['name' => $permissionName . '.create']);
                Permission::firstOrCreate(['name' => $permissionName . '.update']);
                Permission::firstOrCreate(['name' => $permissionName . '.delete']);
                Permission::firstOrCreate(['name' => $permissionName . '.approve']);
                Permission::firstOrCreate(['name' => $permissionName . '.review']);
            }
        }

        $permissions = Permission::all();
        $superadminRole = Role::where('name', 'superadmin')->first();
        $superadminRole->syncPermissions($permissions);

        // Mendapatkan peran "manager"
        $managerRole = Role::where('name', 'manager')->first();

        $permissionsNotForManager = $permissions->filter(function ($permission) {
            $hasCreateUpdateSuffix = strpos($permission->name, 'create') === (strlen($permission->name) - strlen('create')) ||
                strpos($permission->name, 'update') === (strlen($permission->name) - strlen('update'));

            $isNotUsersPermission = $permission->name !== 'users';

            return !$hasCreateUpdateSuffix || $isNotUsersPermission;
        });

        // Menyinkronkan permission yang sesuai untuk peran "manager"
        $managerRole->syncPermissions($permissionsNotForManager);

        // Mendapatkan peran "supervisor"
        $supervisorRole = Role::where('name', 'supervisor')->first();

        // Mendapatkan permission yang tidak memiliki suffix "review" atau "delete"
        $permissionsForSupervisor = $permissions->filter(function ($permission) {
            $hasReviewDeleteSuffix = strpos($permission->name, 'review') === (strlen($permission->name) - strlen('review')) ||
                strpos($permission->name, 'delete') === (strlen($permission->name) - strlen('delete'));

            return !$hasReviewDeleteSuffix;
        });

        // Menyinkronkan permission untuk peran "supervisor"
        $supervisorRole->syncPermissions($permissionsForSupervisor);

        // Mendapatkan peran "employee"
        $employeeRole = Role::where('name', 'staff')->first();
        // Mendapatkan permission yang tidak memiliki prefix "users" atau "employee"
        $permissionsForEmployee = $permissions->filter(function ($permission) {
            $hasUsersEmployeePrefix = strpos($permission->name, 'users') === 0 || strpos($permission->name, 'employee') === 0;

            return !$hasUsersEmployeePrefix;
        });

        // Menyinkronkan permission untuk peran "employee"
        $employeeRole->syncPermissions($permissionsForEmployee);
    }
}
