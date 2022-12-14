<?php

namespace App\Repositories\Contracts;

interface DomainRepositoryInterface
{

    public function getDomainAll();

    public function getDomainById(int $id);

    public function createDomain(array $data);

    public function updateDomain(array $data, int $id);

    public function destroyDomain(int $id);
}
