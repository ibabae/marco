<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\StorePermissionRequest;
use App\Http\Requests\Admin\UserManagement\UpdatePermissionRequest;
use App\Services\Admin\UserManagement\PermissionService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;


class PermissionController extends Controller
{
    public function __construct(
        protected PermissionService $service,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->allPermissions();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePermissionRequest $request)
    {
        return $this->service->createPermission($request->validated());
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->findPermission($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePermissionRequest $request, string $id)
    {
        return $this->service->updatePermission($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        return $this->service->deletePermission($id);
    }
}
