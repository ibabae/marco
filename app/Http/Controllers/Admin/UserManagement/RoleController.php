<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\StoreRoleRequest;
use App\Http\Requests\Admin\UserManagement\UpdateRoleRequest;
use App\Services\Admin\UserManagement\RoleService;
use Illuminate\Http\Request;

use Spatie\Permission\Models\Role;


class RoleController extends Controller
{
    public function __construct(
        protected RoleService $service,
    ){}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->allRoles();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request)
    {
        return $this->service->createRole($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->findRole($id);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, string $id)
    {
        return $this->service->updateRole($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->service->deleteRole($id);
    }
}
