<?php

namespace Modules\EventSetting\Http\Middleware;

use Closure;

class GenerateMenus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        /*
         *
         * Module Menu for Admin Backend
         *
         * *********************************************************************
         */
        /*\Menu::make('admin_sidebar', function ($menu) {

            // EventSettings
            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('EventSettings'), [
                'route' => 'backend.eventsettings.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/eventsettings*'],
                'permission'    => ['view_eventsettings'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');*/

        return $next($request);
    }
}
