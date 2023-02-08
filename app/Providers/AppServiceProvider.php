<?php

namespace App\Providers;

use App\Repositories\Contracts\PDFRepositoryInterface;
use App\Repositories\PDFRepositoryRepository;
use App\Services\Contracts\File\FileInterface;
use App\Services\Contracts\PDF\ParserInterface;
use App\Services\File\FileService;
use App\Services\PDF\ParserService;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $services = [
            ParserInterface::class => ParserService::class,
            PDFRepositoryInterface::class => PDFRepositoryRepository::class,
            FileInterface::class => FileService::class
        ];

        foreach ($services as $key => $value) {
            $this->app->bindIf($key, $value);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
