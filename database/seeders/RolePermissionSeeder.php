<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'phone' => '9115152620',
            'password' => Hash::make(91151526201234),
        ]);

        $permissions = [
            [
                "name" => "admin.routes"
            ],
            [
                "name" => "admin.user.index"
            ],
            [
                "name" => "admin.user.store"
            ],
            [
                "name" => "admin.user.show"
            ],
            [
                "name" => "admin.user.update"
            ],
            [
                "name" => "admin.user.destroy"
            ],
            [
                "name" => "admin.role.index"
            ],
            [
                "name" => "admin.role.store"
            ],
            [
                "name" => "admin.role.show"
            ],
            [
                "name" => "admin.role.update"
            ],
            [
                "name" => "admin.role.destroy"
            ],
            [
                "name" => "admin.permission.index"
            ],
            [
                "name" => "admin.permission.store"
            ],
            [
                "name" => "admin.permission.show"
            ],
            [
                "name" => "admin.permission.update"
            ],
            [
                "name" => "admin.permission.destroy"
            ],
            [
                "name" => "admin.role-permission.index"
            ],
            [
                "name" => "admin.role-permission.store"
            ],
            [
                "name" => "admin.role-permission.show"
            ],
            [
                "name" => "admin.role-permission.update"
            ],
            [
                "name" => "admin.role-permission.destroy"
            ],
        ];
        $role = Role::create(['name' => 'admin']);
        foreach($permissions as $row){
            $permission = Permission::create($row);
            $role->givePermissionTo($permission);
        }

        $user->assignRole('admin');
    }
}
