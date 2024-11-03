<?php

namespace App\Http\Controllers\Admin\UserManagement;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
        protected UserService $userService
    ){}

    /**
     * @OA\Get(
     *     path="/api/admin/user-management/user",
     *     tags={"User"},
     *     summary="Get list of users",
     *     description="Only accessible for authenticated users",
     *     security={{"passport":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="List of users"
     *     ),
     *     @OA\Response(
     *         response=401,
     *         description="Unauthorized"
     *     )
     * )
     */
    public function index()
    {
        return $this->userService->allUsers();
    }

    /**
     * @OA\Post(
     *     path="/api/admin/user-management/user",
     *     tags={"User"},
     *     summary="Create new user",
     *     description="Only accessible for authenticated users",
     *     security={{"passport":{}}},
     *     @OA\Parameter(
     *         name="phone",
     *         in="query",
     *         required=true,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="firstName",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Parameter(
     *         name="lastName",
     *         in="query",
     *         required=false,
     *         @OA\Schema(
     *             type="string"
     *         )
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="User created"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Content"
     *     )
     * )
     */
    public function store(StoreUserRequest $request)
    {
        return $this->userService->createUser($request->validated());
    }

    /**
     * @OA\Get(
     *     path="/api/admin/user-management/user/{id}",
     *     tags={"User"},
     *     summary="Get a user",
     *     description="Only accessible for authenticated users",
     *     security={{"passport":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="User data"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function show(string $id)
    {
        return $this->userService->findUser($id);
    }

    /**
     * @OA\Put(
     *     path="/api/admin/user-management/user/{id}",
     *     tags={"User"},
     *     summary="Update a user",
     *     description="Only accessible for authenticated users",
     *     security={{"passport":{}}},
     *     @OA\Response(
     *         response=200,
     *         description="User data"
     *     ),
     *     @OA\Response(
     *         response=422,
     *         description="Unprocessable Content"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        return $this->userService->updateUser($request->validated(), $id);
    }

    /**
     * @OA\Delete(
     *     path="/api/admin/user-management/user/{id}",
     *     tags={"User"},
     *     summary="delete a user",
     *     description="Only accessible for authenticated users",
     *     security={{"passport":{}}},
     *     @OA\Response(
     *         response=204,
     *         description="User deleted"
     *     ),
     *     @OA\Response(
     *         response=404,
     *         description="User not found"
     *     )
     * )
     */
    public function destroy(string $id)
    {
        return $this->userService->deleteUser($id);
    }
}
