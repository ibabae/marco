<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepo;

class UserService
{
    public function __construct(
        protected UserRepo $userRepository
    ) {
    }

    public function all()
    {
        return $this->userRepository->all();
    }

    public function create(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function find($id)
    {
        return $this->userRepository->find($id);
    }

    public function update(array $data, $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->userRepository->delete($id);
    }
}
