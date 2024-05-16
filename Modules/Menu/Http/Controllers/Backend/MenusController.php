<?php

namespace Modules\Menu\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Modules\Menu\Models\Menu;
use Illuminate\Http\Request;
class MenusController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Menus';

        // module name
        $this->module_name = 'menus';

        // directory path of the module
        $this->module_path = 'menu::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Menu\Models\Menu";
    }
    public function menuCount(Request $request)
    {
        $groupName = $request->input('groupName');
        
        $menuCount = Menu::where('group_name', $groupName)->count();;
       
        return response()->json($menuCount);
    

    }
    public function menuSelect(Request $request)
    {
        $menuName = $request->input('menuName');
        
        $menuSelect = Menu::where('name', $menuName)->get();
       
        return response()->json($menuSelect);
    

    }
}
