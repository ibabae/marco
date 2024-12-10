<?php

namespace App\Services\Admin\UserManagement;

use App\Repositories\Admin\UserManagement\RoleRepo;
use App\Services\ServiceBaseClass;

class RoleService extends ServiceBaseClass
{
    public function __construct(
        protected RoleRepo $repo,
    ){}

    public function allRoles(){
        return $this->repo->all();
    }

    public function createRole(array $data){
        return $this->repo->create($data);
    }

    public function findRole($id){
        return $this->repo->find($id);
    }

    public function updateRole(array $data, $id){
        $this->repo->update($data, $id);
        return $this->repo->find($id);
    }

    public function deleteRole($id){
        return $this->repo->delete($id);
    }
}
