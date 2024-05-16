<?php

namespace Modules\IPFilter\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class IPFiltersController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'IPFilters';

        // module name
        $this->module_name = 'ipfilters';

        // directory path of the module
        $this->module_path = 'ipfilter::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\IPFilter\Models\IPFilter";
    }

}
