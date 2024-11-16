<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = [
            [
                "name" => "user.user",
            ],
        ];
        $roleUser = Role::firstWhere('name', 'user');
        foreach($adminPermissions as $row){
            $permission = Permission::create($row);
            $roleUser->givePermissionTo($permission);
        }
        $firstUser = User::find(1);
        $firstUser->assignRole('user');
    }
}
