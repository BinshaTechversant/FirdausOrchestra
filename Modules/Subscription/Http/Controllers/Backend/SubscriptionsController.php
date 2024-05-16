<?php

namespace Modules\Subscription\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class SubscriptionsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Subscriptions';

        // module name
        $this->module_name = 'subscriptions';

        // directory path of the module
        $this->module_path = 'subscription::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Subscription\Models\Subscription";
    }

}
