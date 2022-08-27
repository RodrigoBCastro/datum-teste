<?php

declare(strict_types=1);

namespace App\Hash\Services;

use App\Hash\Util\StringGenerator;

class HashGeneratorService
{
    public function __construct
    (
        StringGenerator     $stringGenerator
    )
    {
        $this->stringGenerator =   $stringGenerator;
    }

    public function execute(string $string): array
    {
        $trys = 0;

        do {
            $trys += 1;

            $key = $this->stringGenerator->execute(8);
            $hash = md5( $string . $key);

        } while (!str_starts_with($hash, '0000'));;

        return ['hash' => $hash, 'key' => $key, 'trys' => $trys];
    }
}
