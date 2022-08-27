<?php

namespace App\Hash\Providers;

use App\Hash\Models\HashRegistreRepositoryInterface;
use App\Hash\Repositories\HashRegistreRepository;
use Illuminate\Support\ServiceProvider;

class HashRegistreServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(HashRegistreRepositoryInterface::class, HashRegistreRepository::class);
    }

    public function boot()
    {
        //
    }
}
