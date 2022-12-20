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
    public function getDomainByName(string $name)
    {
        return $this->entity->where('name', $name);
    }

    public function createDomain(array $data)
    {
        if ($this->nameDomainExists($data['name'])) {
            return ['massage' => 'Dominio já cadastrado', 'status' => 400];
        }
        return $this->entity->create($data);
    }


    public function updateDomain(array $data, int $id)
    {
        if ($this->nameDomainExists($data['name'])) {
            if (!$this->idNameDomainExits($id, $data['name'])) {
                return ['massage' => 'Dominio já cadastrado', 'status' => 400];
            }
        }
        $domain = $this->getDomainById($id);
        return $domain->update($data);
    }

    public function destroyDomain(int $id)
    {
        $domain = $this->getDomainById($id);
        return $domain->delete();
    }

    public function idNameDomainExits(int $id, string $name)
    {
        return $this->entity
            ->where('id', $id)
            ->where('name', $name)->exists();
    }

    public function nameDomainExists(string $name)
    {
        return $this->getDomainByName($name)->exists();
    }
}
