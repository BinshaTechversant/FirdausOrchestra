<?php

namespace Modules\News\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class NewsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'News';

        // module name
        $this->module_name = 'news';

        // directory path of the module
        $this->module_path = 'news::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\News\Models\News";
    }

}
