<?php

namespace App\Services\Admin\UserManagement;

use App\Repositories\Admin\UserManagement\RolePermissionRepo;
use App\Repositories\Admin\UserManagement\RoleRepo;
use App\Services\ServiceBaseClass;

class RolePermissionService extends ServiceBaseClass
{
    public function __construct(
        protected RolePermissionRepo $repo,
        protected RoleRepo $roleRepo,
    ){}

    public function allRolePermissions(){
        return $this->repo->all();
    }

    public function createRolePermission(array $data){
        $this->repo->create($data);
        return $this->roleRepo->find($data['role_id']);
    }

    public function findRolePermission($id){
        return $this->repo->find($id);
    }

    public function updateRolePermission(array $data, $id){
        $this->repo->update($data, $id);
        return $this->repo->find($id);
    }

    public function deleteRolePermission($id){
        return $this->repo->delete($id);
    }

}
