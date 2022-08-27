<?php

namespace App\Hash\Models;

use Illuminate\Database\Eloquent\Model;

class HashRegistre extends Model
{
    protected $table = 'hash_registres';
    public $timestamps = false;

    protected $fillable = [
        'batch',
        'block_sequency',
        'entrace_string',
        'find_key',
        'hash',
        'trys'
    ];
}
