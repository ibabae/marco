<?php

namespace App\Services\Admin\UserManagement;

use App\Repositories\Admin\UserManagement\UserRoleRepo;
use App\Services\ServiceBaseClass;

class UserRoleService extends ServiceBaseClass
{
    public function __construct(
        protected UserRoleRepo $repo,
    ){}

    public function allUserRoles(){
        return $this->repo->all();
    }

    public function createUserRole(array $data){
        return $this->repo->create($data);
    }

    public function findUserRole($id){
        return $this->repo->find($id);
    }

    public function updateUserRole(array $data, $id){
        $this->repo->update($data, $id);
        return $this->repo->find($id);
    }

    public function deleteUserRole($id){
        return $this->repo->delete($id);
    }
}
