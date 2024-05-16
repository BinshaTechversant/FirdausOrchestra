<?php

namespace Modules\Field\Http\Middleware;

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
       /* \Menu::make('admin_sidebar', function ($menu) {

            // Fields
            $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Fields'), [
                'route' => 'backend.fields.index',
                'class' => 'nav-item',
            ])
            ->data([
                'order'         => 79,
                'activematches' => ['admin/fields*'],
                'permission'    => ['view_fields'],
            ])
            ->link->attr([
                'class' => 'nav-link',
            ]);
        })->sortBy('order');*/

        return $next($request);
    }
}
