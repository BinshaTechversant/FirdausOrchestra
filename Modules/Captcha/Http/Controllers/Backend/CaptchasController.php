<?php

namespace Modules\Captcha\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class CaptchasController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Captchas';

        // module name
        $this->module_name = 'captchas';

        // directory path of the module
        $this->module_path = 'captcha::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Captcha\Models\Captcha";
    }

}
