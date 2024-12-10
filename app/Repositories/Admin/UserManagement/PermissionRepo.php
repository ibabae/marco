<?php

namespace App\Repositories\Admin\UserManagement;

use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;
use Spatie\Permission\Models\Permission;

class PermissionRepo extends RepositoryBaseClass implements RepositoryInterface
{
    public function all(){
        return Permission::get();
    }

    public function create(array $data){
        return Permission::create([
            'name' => $data['name']
        ]);
    }

    public function find($id){
        return Permission::with('roles')->find($id);
    }

    public function update(array $data, $id){
        $permission = Permission::find($id);
        $permission->update([
            'name' => $data['name']
        ]);
    }

    public function delete($id){
        $permission = Permission::with('roles')->find($id);
        $permission->delete();
    }

}
