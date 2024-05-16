<?php

namespace Modules\Subscription\Http\Middleware;

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

            // Subscriptions
            $subscription_menu = $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Subscriptions'), [
                // 'route' => 'backend.subscriptions.index',
                'class' => 'nav-group',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/subscriptions*'],
                'permission'    => ['view_subscriptions'],
            ]);
            $subscription_menu->link->attr([
                'class' => 'nav-link nav-group-toggle',
                'href' => '#',
            ]);
            //Submenu: Subscribers
            $subscription_menu->add('<i class="nav-icon fa-regular fa-user"></i> '.__('Subscribers'), [
                'route' => 'backend.subscribers.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/subscribers*'],
                'permission'    => ['view_subscribers'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
            //Submenu: Mails
             $subscription_menu->add('<i class="nav-icon fa-regular fa-envelope"></i> '.__('Mails'), [
                'route' => 'backend.mails.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 77,
                'activematches' => ['admin/mails*'],
                'permission'    => ['view_mails'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);

        })->sortBy('order');

        return $next($request);
    }
}
