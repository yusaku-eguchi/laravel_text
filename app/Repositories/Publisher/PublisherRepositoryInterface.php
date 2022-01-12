<?php

declare(strict_types=1);

namespace App\Repositories\Publisher;

interface PublisherRepositoryInterface
{
    public function findByName(string $name);

    public function store(string $name, string $address): int;
}