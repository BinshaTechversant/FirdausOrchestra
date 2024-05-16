<?php

namespace Modules\Mail\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\Request;
use App\Jobs\SendBulkEmail;

class MailsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Mails';

        // module name
        $this->module_name = 'mails';

        // directory path of the module
        $this->module_path = 'mail::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Mail\Models\Mail";
    }

    public function sendMail(Request $request)
    {
        $requestId = $request->id;

        dispatch(new SendBulkEmail($requestId));
        
        return redirect("admin/mails");
    }
}
