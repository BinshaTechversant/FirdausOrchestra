<?php

namespace Modules\Template\Http\Middleware;

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

        // Templates Dropdown
        $template_menu = $menu->add('<i class="nav-icon fa-regular fa-sun"></i> '.__('Templates'), [
            'class' => 'nav-group',
        ])
        ->data([
            'order'         => 77,
            'activematches' => ['admin/templates*'],
            'permission'    => ['view_templates'],
        ]);
        $template_menu->link->attr([
            'class' => 'nav-link nav-group-toggle',
            'href' => '#',
        ]);

        // Submenu: Page Templates
        $template_menu->add('<i class="nav-icon fas fa-file-alt"></i> '.__('Page Templates'), [
            'route' => 'backend.templates.index',
            'class' => 'nav-item',
        ])
        ->data([
            'order' => 78,
            'activematches' => 'admin/templates*',
            'permission' => ['edit_templates'],
        ])
        ->link->attr([
            'class' => 'nav-link',
        ]);

        // Submenu: Fields
        $template_menu->add('<i class="nav-icon fas fa-file-alt"></i> '.__('Fields'), [
            'route' => 'backend.fields.index',
            'class' => 'nav-item',
        ])
        ->data([
            'order' => 79,
            'activematches' => 'admin/fields*',
            'permission' => ['edit_fields'],
        ])
        ->link->attr([
            'class' => 'nav-link',
        ]);

    })->sortBy('order');

        return $next($request);
    }
}
