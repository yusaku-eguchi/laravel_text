<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Publisher;
use App\Repositories\Publisher\PublisherRepositoryInterface;

class PublisherService
{
    private $publisher;

    public function __construct(PublisherRepositoryInterface $publisher) {
        $this->publisher = $publisher;
    }
    public function exist(string $name)
    {
        
        if (!$this->publisher->findByName($name)) {
            return false;
        }
        return true;
    }

    public function store(string $name, string $address): int
    {
        return $this->publisher->store($name, $address);
    }
}
