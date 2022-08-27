<?php

declare(strict_types=1);

namespace App\Hash\Models;

use App\Base\Models\BaseRepositoryInterface;

interface HashRegistreRepositoryInterface extends BaseRepositoryInterface
{
    public function getAllResults($qnty);
}
