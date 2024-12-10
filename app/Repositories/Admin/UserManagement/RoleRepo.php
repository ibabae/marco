<?php

namespace App\Repositories\Admin\UserManagement;

use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;
use Spatie\Permission\Models\Role;

class RoleRepo extends RepositoryBaseClass implements RepositoryInterface
{
    public function all(){
        return Role::all();
    }

    public function create(array $data){
        return Role::create([
            'name' => $data['name']
        ]);
    }

    public function find($id){
        return Role::with('permissions')->findOrFail($id);
    }

    public function update(array $data, $id){
        $role = Role::findOrFail($id);
        $role->update([
            'name' => $data['name']
        ]);
    }

    public function delete($id){
        $role = Role::findOrFail($id);
        $role->delete();
    }

}
