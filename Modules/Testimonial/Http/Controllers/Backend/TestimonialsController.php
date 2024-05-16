<?php

namespace Modules\Testimonial\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;

class TestimonialsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Testimonials';

        // module name
        $this->module_name = 'testimonials';

        // directory path of the module
        $this->module_path = 'testimonial::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Testimonial\Models\Testimonial";
    }

}
