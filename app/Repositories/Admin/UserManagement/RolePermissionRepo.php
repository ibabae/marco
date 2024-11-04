<?php

namespace App\Repositories\Admin\UserManagement;

use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;
use Spatie\Permission\Models\Role;

class RolePermissionRepo extends RepositoryBaseClass implements RepositoryInterface
{
    public function all(){
        return Role::with('permissions')->get();
    }

    public function create(array $data){

    }

    public function find($id){
        return Role::with('permissions')->findOrFail($id);
    }

    public function update(array $data, $id){
        $role = Role::find($data['role_id']);
        $permissions = collect($data['permissions'])->pluck('id');
        $role->permissions()->sync($permissions);
    }

    public function delete($id){

    }

}
