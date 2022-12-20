<?php

namespace App\Repositories\Contracts;

interface UserRepositoryInterface
{

    public function getUserAll();

    public function getUserById(int $id);

    public function createUser(array $data);

    public function updateUser(array $data, int $id);

    public function destroyUser(int $id);
}
