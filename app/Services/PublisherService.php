<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Publisher;

class PublisherService
{
    public function exist(string $name)
    {
        $count = Publisher::whereName($name)->count();
        if ($count > 0) {
            return true;
        }
        return false;
    }

    public function store(string $name, string $address): int
    {
        $publisher = Publisher::create(
            [
                'name' => $name,
                'address' => $address
            ]
        );

        return (int)$publisher->id;
    }
}
