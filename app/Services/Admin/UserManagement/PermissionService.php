<?php

namespace App\Services\Admin\UserManagement;

use App\Repositories\Admin\UserManagement\PermissionRepo;
use App\Services\ServiceBaseClass;

class PermissionService extends ServiceBaseClass
{
    public function __construct(
        protected PermissionRepo $repo,
    ){}

    public function allPermissions(){
        return $this->repo->all();
    }

    public function createPermission(array $data){
        return $this->repo->create($data);
    }

    public function findPermission($id){
        return $this->repo->find($id);
    }

    public function updatePermission(array $data, $id){
        $this->repo->update($data, $id);
        return $this->repo->find($id);
    }

    public function deletePermission($id){
        return $this->repo->delete($id);
    }

}
