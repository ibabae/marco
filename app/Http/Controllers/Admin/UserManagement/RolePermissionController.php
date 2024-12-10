<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\StoreRolePermissionRequest;
use App\Http\Requests\Admin\UserManagement\UpdateRolePermissionRequest;
use App\Services\Admin\UserManagement\RolePermissionService;
use Illuminate\Http\Request;

class RolePermissionController extends Controller
{
    public function __construct(
        protected RolePermissionService $service,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->allRolePermissions();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolePermissionRequest $request)
    {
        return $this->service->createRolePermission($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->findRolePermission($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRolePermissionRequest $request, string $id)
    {
        return $this->service->updateRolePermission($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->service->deleteRolePermission($id);
    }
}
