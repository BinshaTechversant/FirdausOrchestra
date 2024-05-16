<?php

namespace Modules\Template\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class TemplatesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Templates';

        // module name
        $this->module_name = 'templates';

        // directory path of the module
        $this->module_path = 'template::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Template\Models\Template";
    }

    public function fieldNames(){
        
    }

}
