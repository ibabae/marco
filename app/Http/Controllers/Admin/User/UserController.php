<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;
use App\Services\Admin\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct(
      protected UserService $userService
    ) {
    }

    public function index()
    {
        $users = $this->userService->all();
        $title = 'کاربران';
        return view('admin.user.index', compact('users','title'));
    }

    public function create()
    {
        return view('admin.user.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        $user = $this->userService->create($data);

        return redirect()->route('admin.layer.user.show', $user->id);
    }

    public function show($id)
    {
        $user = $this->userService->find($id);
        return view('admin.user.show', compact('user'));
    }

    public function edit($id)
    {
        $user = $this->userService->find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function update(UpdateUserRequest $request, $id)
    {
        $data = $request->validated();

        $user = $this->userService->update($data, $id);

        return redirect()->route('admin.layer.user.show', $user->id);
    }

    public function destroy($id)
    {
        $this->userService->delete($id);

        return redirect()->route('admin.layer.user.index');
    }
}
