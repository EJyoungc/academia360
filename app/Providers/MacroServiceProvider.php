<?php

namespace App\Providers;

use Illuminate\Support\Arr;
use Illuminate\Support\ServiceProvider;
// use Laravel\Scout\Builder;
use Illuminate\Database\Eloquent\Builder;

class MacroServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //

        // Builder::macro('whereLike', function ($attributes, string $searchTerm) {
        //     $this->where(function (Builder $query) use ($attributes, $searchTerm) {
        //         foreach (Arr::wrap($attributes) as $attribute) {
        //             $query->when(
        //                 str_contains($attribute, '.'),
        //                 function (Builder $query) use ($attribute, $searchTerm) {
        //                     [$relationName, $relationAttribute] = explode('.', $attribute);
        //                     $query->orwhereHas($relationName, function (Builder $query) use ($relationAttribute, $searchTerm) {
        //                         $query->where($relationAttribute, 'LIKE', "%{$searchTerm}%");
        //                     });
        //                 },
        //                 function (Builder $query) use ($attribute, $searchTerm) {
        //                     $query->orWhere($attribute, 'LIKE', "%{$searchTerm}%");
        //                 }
        //             );
        //         }
        //     });
        //     return $this;
        // });
    }
}
