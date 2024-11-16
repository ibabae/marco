<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class AdminPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $adminPermissions = [
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
        $roleAdmin = Role::firstWhere('name', 'admin');
        foreach($adminPermissions as $row){
            $permission = Permission::create($row);
            $roleAdmin->givePermissionTo($permission);
        }
        $firstUser = User::find(1);
        $firstUser->assignRole('admin');
    }
}
