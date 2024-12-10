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
     * @OA\Get(
     *      path="/api/admin/user-management/permission",
     *      summary="Permissions data",
     *      tags={"Permissions"},
     *      description="list of permissions",
     *      @OA\Response(
     *          response=200,
     *          description="list",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="unauthorized",
     *      )
     * )
     */

     public function index()
    {
        return $this->service->allPermissions();
    }

    /**
     * @OA\Post(
     *      path="/api/admin/user-management/permission",
     *      summary="Create Permission",
     *      tags={"Permissions"},
     *      description="create Permission",
     *      @OA\Parameter(
     *          name="name",
     *          in="query",
     *          description="Permission name",
     *          required=true,
     *          @OA\Schema(
     *              type="unique"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful created",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="unauthorized",
     *      )
     * )
     */

     public function store(StorePermissionRequest $request)
    {
        return $this->service->createPermission($request->validated());
    }

    /**
     * @OA\Get(
     *      path="/api/admin/user-management/permission/{id}",
     *      summary="Permissions data",
     *      tags={"Permissions"},
     *      description="show a permission",
     *      @OA\Response(
     *          response=200,
     *          description="show item",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="unauthorized",
     *      )
     * )
     */

     public function show(string $id)
    {
        return $this->service->findPermission($id);
    }

    /**
     * @OA\Put(
     *      path="/api/admin/user-management/permission/{id}",
     *      summary="Update Permission",
     *      tags={"Permissions"},
     *      description="update Permission",
     *      @OA\Parameter(
     *          name="name",
     *          in="query",
     *          description="Permission name",
     *          required=true,
     *          @OA\Schema(
     *              type="unique"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful updated",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="unauthorized",
     *      )
     * )
     */

     public function update(UpdatePermissionRequest $request, string $id)
    {
        return $this->service->updatePermission($request->validated(), $id);
    }

    /**
     * @OA\Delete(
     *      path="/api/admin/user-management/permission/{id}",
     *      summary="Permissions data",
     *      tags={"Permissions"},
     *      description="delete a permission",
     *      @OA\Response(
     *          response=200,
     *          description="permission deleted",
     *      ),
     *      @OA\Response(
     *          response=422,
     *          description="unauthorized",
     *      )
     * )
     */

     public function destroy(string $id)
    {
        return $this->service->deletePermission($id);
    }
}
