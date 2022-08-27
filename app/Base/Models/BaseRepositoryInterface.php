<?php

namespace App\Base\Models;

use Illuminate\Database\Eloquent\Model;

interface BaseRepositoryInterface
{
    public function save(Model $model): Model;
}
