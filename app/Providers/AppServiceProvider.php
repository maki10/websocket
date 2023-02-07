<?php

namespace App\Providers;

use App\Repositories\Contracts\PDFInterface;
use App\Repositories\PDFRepository;
use App\Services\Contracts\PDFHandlerInterface;
use App\Services\Contracts\PDFParserInterface;
use App\Services\ParserService;
use App\Services\PDFHandlerService;
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
            PDFHandlerInterface::class => PDFHandlerService::class,
            PDFParserInterface::class => ParserService::class,
            PDFInterface::class => PDFRepository::class
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
