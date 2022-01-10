<?php

declare(strict_types=1);

namespace App\DataProvider;

use stdClass;

interface UserTokenProviderInterface
{
    public function retrieveUserByToken(
        string $token
    ): ?stdClass;
}