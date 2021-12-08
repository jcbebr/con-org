<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use TCG\Voyager\Facades\Voyager;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Voyager::addAction(\App\Actions\AvaliacaoAtividadeAction::class);
        Voyager::addAction(\App\Actions\AvaliacaoAtividadeVoltarAction::class);
        Voyager::replaceAction(\TCG\Voyager\Actions\ViewAction::class, \App\Actions\VerAction::class);
        Voyager::replaceAction(\TCG\Voyager\Actions\EditAction::class, \App\Actions\EditarAction::class);

        Voyager::addFormField(\App\FormFields\RatingFormField::class);
    }
}
