<?php

namespace App\Services;

use App\Repositories\Contracts\UserRepositoryInterface;

class UserService
{


    protected $repository;

    public function __construct(UserRepositoryInterface $repository)
    {

        $this->repository = $repository;

    }

    /**
     * Pega todos os Usuário cadastrados
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getAllUsers()
    {
        return $this->repository->getUserAll();

    }

    /**
     * Pega um Domínio cadastrados
     ** @param int $id
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getUser(int $id)
    {
        return $this->repository->getUserById($id);

    }


     /**
      * Cadastrar o Usuário
      *
      * @param array $data
      * @return \Illuminate\Database\Eloquent\Collection<int, static>
      */
    public function registerNewUser(array $data)
    {
        $data['password'] = bcrypt($data['password']);
        return $this->repository->createUser($data);

    }

    /**
     * Atualizar um domínio
     *
     * @param array   $data
     * @param integer $id
     * @return bool
     */
    public function updateUser(array $data, int $id)
    {
        return $this->repository->updateUser($data,$id);

    }
    /**
     * Deletar um domínio
     *
     * @param integer $id
     * @return bool
     */
    public function deleteUser(int $id)
    {
        return $this->repository->destroyUser($id);

    }


}
