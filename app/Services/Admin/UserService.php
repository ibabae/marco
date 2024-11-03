<?php

namespace App\Services\Admin;

use App\Repositories\Admin\UserRepo;

class UserService
{
    public function __construct(
        protected UserRepo $userRepository
    ) {
    }

    public function allUsers()
    {
        return $this->userRepository->all();
    }

    public function createUser(array $data)
    {
        return $this->userRepository->create($data);
    }

    public function findUser($id)
    {
        return $this->userRepository->find($id);
    }

    public function updateUser(array $data, $id)
    {
        return $this->userRepository->update($data, $id);
    }

    public function deleteUser($id)
    {
        return $this->userRepository->delete($id);
    }
}
