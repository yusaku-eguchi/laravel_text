<?php

declare(strict_types=1);

namespace App\Repositories\Publisher;

use App\Repositories\Publisher\PublisherRepositoryInterface;
use App\Models\Publisher;

class PublisherRepository  implements PublisherRepositoryInterface
{
    private $publisher;

    public function __construct(Publisher $publisher) {
        $this->publisher = $publisher;
    }

    public function findByName(string $name): ?Publisher
    {
        $record = $this->publisher->whereName($name)->first();
        if ($record === null) {
            return null;
        }

        return $record;
    }

    public function store(string $name, string $address): int
    {
        $eloquent = $this->publisher->newInstance();
        $eloquent->name = $name;
        $eloquent->address = $address;
        $eloquent->save();

        return (int)$eloquent->id;
    }
}
