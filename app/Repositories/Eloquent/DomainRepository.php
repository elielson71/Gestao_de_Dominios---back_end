<?php

namespace App\Repositories\Eloquent;

use App\Models\Domain;
use App\Repositories\Contracts\DomainRepositoryInterface;

class DomainRepository implements DomainRepositoryInterface
{

    protected $entity;

    public function __construct(Domain $domain)
    {
        $this->entity = $domain;
    }

    public function getDomainAll()
    {
        return $this->entity->all();
    }

    public function getDomainById(int $id)
    {
        return $this->entity->findOrFail($id);
    }

    public function createDomain(array $data)
    {
        return $this->entity->create($data);
    }

    public function updateDomain(array $data, int $id)
    {
        $domain = $this->getDomainById($id);
        return $domain->update($data);
    }

    public function destroyDomain(int $id)
    {
        $domain = $this->getDomainById($id);
        return $domain->delete();
    }
}
