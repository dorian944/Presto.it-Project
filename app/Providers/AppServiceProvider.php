<?php

namespace App\Providers;

use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //se il nostro progetto ha una tabella che si chiama categories, e questo controllo preverrà errori in caso del mancato funzionamento corretto del db
        //allora sfruttiamo la classe view di laravel per dire condividi con tutte le viste del progetto una variabile categories che conterrà come valore tutte le categorie
        //in questo modo possiamo usarlo in tutto il progetto anche nei livewire
        if (Schema::hasTable('categories')) {
            View::share('categories', Category::all());
        }

        Paginator::useBootstrap();
    }
}
