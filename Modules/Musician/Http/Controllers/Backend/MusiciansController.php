<?php

namespace Modules\Musician\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Flash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Modules\Article\Events\PostCreated;
use Modules\Article\Events\PostUpdated;
use Modules\Article\Http\Requests\Backend\PostsRequest;
use Modules\Category\Models\Category;
use Spatie\Activitylog\Models\Activity;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\DB;
use Modules\Musician\Models\Musician;
class MusiciansController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Musicians';

        // module name
        $this->module_name = 'musicians';

        // directory path of the module
        $this->module_path = 'musician::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Musician\Models\Musician";
    }

    public function getSubCategories(Request $request)
    {
        $categoryId = $request->input('category_id');
        
        $subCategories = Category::where('parent_category', $categoryId)->where('status','Active')->get();
        
        return response()->json($subCategories);
    }
    public function getSubCategory(Request $request)
    {
        $musicianId = $request->input('musician_id');
        
        $subCategory = Musician::where('id', $musicianId)->where('status',1)->get();
        
        return response()->json($subCategory);
    }

    
   
    


}
