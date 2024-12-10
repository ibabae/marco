<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\UserManagement\UpdateUserRoleRequest;
use App\Services\Admin\UserManagement\UserRoleService;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function __construct(
        protected UserRoleService $service,
    ){}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return $this->service->allUserRoles();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return $this->service->findUserRole($id);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRoleRequest $request, string $id)
    {
        return $this->service->updateUserRole($request->validated(), $id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
