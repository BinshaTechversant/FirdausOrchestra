<?php

namespace Modules\IPFilter\Http\Middleware;

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

            // IPFilters
            $ip_menu = $menu->add('<i class="nav-icon fa-regular fa-globe"></i> '.__('IPFilters'), [
                //'route' => 'backend.ipfilters.index',
                'class' => 'nav-group',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/ipfilters*'],
                'permission'    => ['view_ipfilters'],
            ]);
            $ip_menu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
    
             // Submenu: Ip Whitelists
        $ip_menu->add('<i class="nav-icon fas fa-file-alt"></i> '.__('Ip WhiteList'), [
            'route' => 'backend.ipwhitelists.index',
            'class' => 'nav-item',
        ])
        ->data([
            'order' => 78,
            'activematches' => ['admin/ipfilters*'],
            'permission'    => ['view_ipfilters'],
        ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        

        $ip_menu->add('<i class="nav-icon fas fa-file-alt"></i> '.__('Ip BlackList'), [
            'route' => 'backend.ipfilters.index',
            'class' => 'nav-item',
        ])
        ->data([
            'order' => 78,
            'activematches' => ['admin/ipfilters*'],
            'permission'    => ['view_ipfilters'],
        ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');
       
        
        return $next($request);
    }
}
