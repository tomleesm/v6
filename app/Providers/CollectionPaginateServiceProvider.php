<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use Illuminate\Support\HtmlString;

class CollectionPaginateServiceProvider extends ServiceProvider
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
        /**
         * define collection method paginate()
         *
         * param int $perPage
         */
        Collection::macro('paginate', function ($perPage = null) {
            if( ! isset($perPage) || ! is_int($perPage) || $perPage <= 0)
                throw new \Exception('Bad parameter per page. It have to be integer, and greater than zero');

            $currentPage = intval(request()->input('page'));
            $currentPage = $currentPage <= 0 ? 1 : $currentPage;

            $offset = ($currentPage - 1) * $perPage;
            $items = $this->slice($offset, $perPage);
            $total = $this->count();
            $options = [ 'path' => Paginator::resolveCurrentPath(),
                         'pageName' => 'page' ];
            return new LengthAwarePaginator($items, $total, $perPage, $currentPage, $options);
        });
        Collection::macro('links', function ($view = null, $data = []) {
            return $this->render($view, $data);
        });
        Collection::macro('render', function ($view = null, $data = []) {
            return new HtmlString(static::viewFactory()->make($view ?: static::$defaultView, array_merge($data, [
                'paginator' => $this,
                'elements' => $this->elements(),
            ]))->render());
        });

    }
}
