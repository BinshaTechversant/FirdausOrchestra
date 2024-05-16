<?php

namespace Modules\Performance\Http\Middleware;

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
        \Menu::make('admin_sidebar', function ($menu) {

            // Performances
            $event_menu = $menu->add('<i class="nav-icon fa-regular fa-calendar"></i> '.__('Events'), [
                'route' => 'backend.performances.index',
                'class' => 'nav-group',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/performances*'],
                'permission'    => ['view_performances'],
            ]);
            $event_menu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            $event_menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Event List'), [
                'route' => 'backend.performances.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/performances*'],
                'permission'    => ['view_performances'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
            $event_menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Event Settings'), [
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
        })->sortBy('order');

        return $next($request);
    }
}
