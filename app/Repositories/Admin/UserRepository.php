<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Repositories\RepositoryInterface;

class UserRepository implements RepositoryInterface
{
    public function all()
    {
        return User::all();
    }

    public function create(array $data)
    {
        return User::create($data);
    }

    public function update(array $data, $id)
    {
        $user = User::findOrFail($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
    }

    public function find($id)
    {
        return User::findOrFail($id);
    }
}
