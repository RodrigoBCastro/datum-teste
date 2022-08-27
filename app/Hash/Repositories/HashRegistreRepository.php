<?php

namespace App\Hash\Repositories;

use App\Hash\Models\HashRegistre;
use App\Hash\Models\HashRegistreRepositoryInterface;
use App\Base\Repositories\BaseRepository;

class HashRegistreRepository extends BaseRepository implements HashRegistreRepositoryInterface
{
    protected string $_model = HashRegistre::class;

    public function getAllResults($qnty)
    {
        $results = $this->_model::select('batch', 'block_sequency', 'entrace_string', 'hash');

        if ($qnty != null)
            $results = $results->where('trys', '<', $qnty);

        return $results->paginate(2);
    }

}
