<?php

namespace Modules\Performance\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class PerformancesController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Performances';

        // module name
        $this->module_name = 'performances';

        // directory path of the module
        $this->module_path = 'performance::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Performance\Models\Performance";
    }

}
