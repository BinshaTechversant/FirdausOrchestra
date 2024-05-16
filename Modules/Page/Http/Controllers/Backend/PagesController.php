<?php

namespace Modules\Page\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Modules\Template\Models\Template;
use Modules\Field\Models\Field;
use Modules\Page\Models\Page;
use Modules\Page\Models\PageField;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

class PagesController extends BackendBaseController
{
    use Authorizable;
    
    public $module_data;
    public $module_dataFields;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'Pages';

        // module name
        $this->module_name = 'pages';

        // directory path of the module
        $this->module_path = 'page::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\Page\Models\Page";

        
    }

    public function getTemplateFields(Request $request)
    {
        $templateId = $request->input('template_id');
        $fields = Field::where('template_id', $templateId)
                  ->where('status', 1)
                  ->whereNull('fields.deleted_at')
                  ->get();

        return response()->json($fields);
    }

    public function getPageData(Request $request)

    {
        $templateId = $request->input('template_id');
        $pageId =  $request->input('page_id');
        
        /*$fields = Field::join('page_fields','fields.id','=','page_fields.field_id')
                ->join('templates','fields.template_id','=','templates.id')
                ->select('fields.id','fields.name','fields.field_type','fields.slug','fields.status','page_fields.field_value',)
                ->where('fields.template_id', $templateId)
                ->where('page_fields.page_id',$pageId)
                ->where('fields.status', 1)
                ->get();*/
        $fields = Template::select(
                    'fields.id',
                    'fields.name',
                    'fields.field_type',
                    'fields.slug',
                    'fields.status',
                    'page_fields.field_value'
                    //DB::raw("COALESCE(page_fields.field_value, '') AS field_value")
                )
                ->leftJoin('fields', 'templates.id', '=', 'fields.template_id')
                ->leftJoin('page_fields', function ($join) use ($pageId) {
                    $join->on('fields.id', '=', 'page_fields.field_id')
                         ->where('page_fields.page_id', '=', $pageId);
                })
                ->where('templates.id', '=', $templateId)
                ->whereNull('fields.deleted_at')
                ->get();
        
        return response()->json($fields);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'template_id' => 'required|exists:templates,id',
            'status' => 'required|in:1,0,2',
            'url' => 'required|string|max:255',
        ]);

        $templateId = $request->input('template_id');
        $pageName = $request->input('name');
        $url = $request->input('url');
        $metaTitle = $request->input('meta_title');
        $metaKeywords = $request->input('meta_keywords');
        $metaDescription = $request->input('meta_description');
        $metaOgImage = $request->input('meta_og_image');
        $metaOgUrl = $request->input('meta_og_url');
        $order = $request->input('order');
        

        // insert into the pages table
        $page = Page::create([
            'template_id' => $templateId,
            'name' => $pageName,
            'url' => $url,
            'meta_title' => $metaTitle,
            'meta_keywords' => $metaKeywords,
            'meta_description' => $metaDescription,
            'meta_og_image' => $metaOgImage,
            'meta_og_url' => $metaOgUrl,
            'order' => $order,
        ]);

    //   Extract the "journey" field ID and value

      
      $journeyFieldId = (int)$request->input('journey'); //$request->input('fields.'.$journeyId);
      $journeyFieldValues = $request->input('fields.'.$journeyFieldId.'.value');
     
      
    if (is_array($journeyFieldValues)) {
    // Store the journey field ID and values in the page_fields table
    foreach ($journeyFieldValues as $journeyFieldValue) {
        PageField::create([
            'page_id' => $page->id,
            'field_id' => $journeyFieldId,
            'field_value' => $journeyFieldValue,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
    }
  
      // Regular fields
        $fieldsData = $request->input('fields');
        
            foreach ($fieldsData as $fieldId => $fieldValue) {
                    if ($fieldId !== $journeyFieldId) {
        
                        if (is_array($fieldValue)) {
                            // Convert the array to a string
                            $fieldValue = implode(',', $fieldValue);
                        }
                        PageField::create([
                            'page_id' => $page->id,
                            'field_id' => $fieldId,
                            'field_value' => $fieldValue,
                            'created_at' => now(),
                            'updated_at' => now(),
                        ]);
                    }
            } 
        

      return redirect("admin/pages");
    }
    
    public function update(Request $request, $id)
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);

        $module_action = 'Update';

        $$module_name_singular = $module_model::findOrFail($id);

        $fields = $request->input('fields');

        
        foreach ($fields as $fieldId => $fieldData) {
            
            $fieldModel = PageField::where('field_id',$fieldId);
            $fieldModel->update(['field_value' => $fieldData['value']]);
            
        }
   
        $$module_name_singular->update($request->except('fields'));
        flash(icon().' '.Str::singular($module_title)."' Updated Successfully")->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect()->route("backend.$module_name.show", $$module_name_singular->id);
    }

/*
    public function edit($id)
    {
        $module_data = Page::findOrFail($id);
        $module_dataFields = PageField::where('page_id', $id)
            ->join('fields', 'page_fields.field_id', '=', 'fields.id')
            ->select('fields.id as field_id', 'fields.name as field_name', 'page_fields.field_value', 'fields.field_type as field_type')
            ->get();
        
         
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_name_singular = Str::singular($module_name);
        $module_action = 'Edit';

        logUserAccess($module_title.' '.$module_action.' | Id: '.$module_data->id);
       
        
        return view(
            "$module_path.$module_name.edit",
            compact(
                'module_title',
                'module_name',
                'module_path',
                'module_icon',
                'module_action',
                'module_name_singular',
                'module_data',
                'module_dataFields'
            )
        );
    }
*/

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
            $record->pageFields()->forceDelete();
            $record->forceDelete();
        }
        flash(icon() . '' . label_case($module_name) . ' Trash Emptied Successfully!')->success()->important();

        logUserAccess($module_title . ' ' . $module_action);
    
        return redirect("admin/$module_name");

    }

}
