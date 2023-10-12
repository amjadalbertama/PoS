<?php

namespace Database\Seeders;

use App\Models\User;
use Junges\ACL\Models\Group;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use function Laravel\Prompts\password;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::firstOrCreate([
            "name" => "sadmin",
            "email" => "sadmin@example.com"
        ], [
            "name" => "sadmin",
            "email" => "sadmin@example.com",
            "email_verified_at" => date('Y-M-d H:m:s'),
            "password" => Hash::make('super123'),
            "remember_token" => "1234567890",
            "created_at" => date('Y-M-d H:m:s'),
            "updated_at" => date('Y-M-d H:m:s'),
        ]);
        $role = Role::findByName('superadmin'); // Find the role named 'editor' in the 'api' guard
        $user->assignRole($role);
    }
}
