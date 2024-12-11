<?php

namespace App\Repositories\Admin;

use App\Models\User;
use App\Repositories\RepositoryBaseClass;
use App\Repositories\RepositoryInterface;

class UserRepo extends RepositoryBaseClass implements RepositoryInterface
{
    protected $user;
    public function __construct(
        User $user
    ){
        $this->user = $user;
    }
    public function all()
    {
        return $this->user->search(request('search'))->get();
    }

    public function create(array $data)
    {
        return $this->user->create($data);
    }

    public function find($id)
    {
        return $this->user->findOrFail($id);
    }

    public function update(array $data, $id)
    {
        $user = $this->find($id);
        $user->update($data);
        return $user;
    }

    public function delete($id)
    {
        $user = $this->find($id);
        $user->delete();
    }

}
