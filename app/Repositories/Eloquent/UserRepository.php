<?php

namespace App\Repositories\Eloquent;

use App\Models\User;
use App\Repositories\Contracts\UserRepositoryInterface;

class UserRepository implements UserRepositoryInterface
{

    protected $entity;

    public function __construct(User $domain)
    {

        $this->entity = $domain;
    }

    public function getUserAll()
    {
        return $this->entity->all();
    }

    public function getUserById(int $id)
    {
        return $this->entity->findOrFail($id);
    }
    public function getUserByName(string $name)
    {
        return $this->entity->where('name', $name);
    }

    public function createUser(array $data)
    {
        
        return $this->entity->create($data);
    }


    public function updateUser(array $data, int $id)
    {

        $domain = $this->getUserById($id);
        return $domain->update($data);
    }

    public function destroyUser(int $id)
    {
        $domain = $this->getUserById($id);
        return $domain->delete();
    }
}
