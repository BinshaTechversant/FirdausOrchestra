<?php

namespace Modules\IPWhitelist\Http\Middleware;

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

            // IPWhitelists
            $menu->add('<i class="nav-icon fa-regular fa-thumbs-up"></i> '.__('IPWhitelists'), [
                'route' => 'backend.ipwhitelists.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/ipwhitelists*'],
                'permission'    => ['view_ipwhitelists'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');*/

        return $next($request);
}
}
