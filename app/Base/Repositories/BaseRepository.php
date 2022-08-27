<?php

namespace App\Base\Repositories;

use App\Base\Models\BaseRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;

class BaseRepository implements BaseRepositoryInterface
{
    protected string $_model;

    public function save(Model $model): Model
    {
        $model->save();
        return $model;
    }
}
