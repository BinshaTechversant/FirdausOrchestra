<?php

namespace Modules\IPWhitelist\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class IPWhitelistsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'IPWhitelists';

        // module name
        $this->module_name = 'ipwhitelists';

        // directory path of the module
        $this->module_path = 'ipwhitelist::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\IPWhitelist\Models\IPWhitelist";
    }

}
