<?php

namespace App\Services;

use App\Repositories\Contracts\DomainRepositoryInterface;

class DomainService
{


    protected $repository;

    public function __construct(DomainRepositoryInterface $repository)
    {


        $this->repository = $repository;
    }

    /**
     * Pega todos os Domínios cadastrados
     *
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getAllDomains()
    {
        return $this->repository->getDomainAll();

    }

    /**
     * Pega um Domínio cadastrados
     ** @param int $id
     * @return \Illuminate\Database\Eloquent\Collection<int, static>
     */
    public function getDomain(int $id)
    {
        return $this->repository->getDomainById($id);

    }


     /**
      * Cadastrar o Domínios
      *
      * @param array $data
      * @return \Illuminate\Database\Eloquent\Collection<int, static>
      */
    public function createNewDomain(array $data)
    {
        return $this->repository->createDomain($data);

    }

    /**
     * Atualizar um domínio
     *
     * @param array   $data
     * @param integer $id
     * @return bool
     */
    public function updateDomain(array $data, int $id)
    {
        return $this->repository->updateDomain($data,$id);

    }
    /**
     * Deletar um domínio
     *
     * @param integer $id
     * @return bool
     */
    public function deleteDomain(int $id)
    {
        return $this->repository->destroyDomain($id);

    }


}
