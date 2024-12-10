<?php

namespace App\Repositories\Admin\UserManagement;

use App\Models\User;
use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;
use Spatie\Permission\Models\Role;

class UserRoleRepo extends RepositoryBaseClass implements RepositoryInterface
{
    public function all(){
        // return $this->role
    }

    public function create(array $data){

    }

    public function find($id){
        $role = Role::findOrFail($id);
        $users = User::get()->filter(
            fn ($user) => $user->roles->where('name', $role->name)->toArray()
        );
        return $users;
    }

    public function update(array $data, $id){
        $role = Role::findOrFail($id);
        $role->users()->sync(collect($data['users'])->pluck('id'));
    }

    public function delete($id){

    }

}
