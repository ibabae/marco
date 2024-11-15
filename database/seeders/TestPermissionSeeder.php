<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class TestPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            [
                "name" => "admin.product.index",
            ],
            [
                "name" => "admin.product.store",
            ],
            [
                "name" => "admin.product.show",
            ],
            [
                "name" => "admin.product.update",
            ],
            [
                "name" => "admin.product.destroy",
            ],
            [
                "name" => "admin.category.index",
            ],
            [
                "name" => "admin.category.store",
            ],
            [
                "name" => "admin.category.show",
            ],
            [
                "name" => "admin.category.update",
            ],
            [
                "name" => "admin.category.destroy",
            ]
        ];
        $role = Role::firstWhere('name', 'admin');
        foreach($permissions as $row){
            $permission = Permission::create($row);
            $role->givePermissionTo($permission);
        }
        $user = User::find(1);
        $user->assignRole('admin');
    }
}
