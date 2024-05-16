<?php

namespace Modules\Field\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Str;
use Modules\Page\Models\Page;
use Modules\Page\Models\PageField;
use Illuminate\Support\Facades\DB;
class FieldsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Fields';

        // module name
        $this->module_name = 'fields';

        // directory path of the module
        $this->module_path = 'field::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Field\Models\Field";
    }

    public function store(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Store';

        $$module_name_singular = $module_model::create($request->all());
        $request->validate([
            'ip_address' => 'ip',
        ]);
        $templateId = $request->input('template_id');
        $existsInPageFields = Page::where('template_id', $templateId)
        ->whereExists(function ($query) {
            $query->select(DB::raw(1))
                ->from('page_fields')
                ->whereRaw('page_fields.page_id = pages.id');
        })
        ->value('id');
        if ($existsInPageFields) {
            // Inserting a row into the page_fields table
            PageField::create([
                'field_id' => $$module_name_singular->id,
                'page_id' => $existsInPageFields,
                'created_by' => 1, 
                'updated_by' => 1,
                'created_at' => now(),
                'updated_at' => now(),
                
            ]);
        }
        flash(icon()."New '".Str::singular($module_title)."' Added")->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect("admin/$module_name");
    }


    public function emptyTrash(Request $request)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
   
        $module_action = 'Empty Trash';
        $trashedRecords = $module_model::onlyTrashed()->get();
        
        foreach($trashedRecords as $record){
            $record->forceDelete();
        }
        flash(icon() . '' . label_case($module_name) . ' Trash Emptied Successfully!')->success()->important();

        logUserAccess($module_title . ' ' . $module_action);
    
        return redirect("admin/$module_name");

    }
}
