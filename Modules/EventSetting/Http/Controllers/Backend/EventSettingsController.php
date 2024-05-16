<?php

namespace Modules\EventSetting\Http\Controllers\Backend;

use App\Authorizable;
use App\Http\Controllers\Backend\BackendBaseController;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
class EventSettingsController extends BackendBaseController
{
    use Authorizable;

    public function __construct()
    {
        // Page Title
        $this->module_title = 'EventSettings';

        // module name
        $this->module_name = 'eventsettings';

        // directory path of the module
        $this->module_path = 'eventsetting::backend';

        // module icon
        $this->module_icon = 'fa-regular fa-sun';

        // module model name, path
        $this->module_model = "Modules\EventSetting\Models\EventSetting";
    }
    public function index()
    {
        $module_title = $this->module_title;
        $module_name = $this->module_name;
        $module_path = $this->module_path;
        $module_icon = $this->module_icon;
        $module_model = $this->module_model;
        $module_name_singular = Str::singular($module_name);
        
        $dataCount = $module_model::count();
        $dataRecord = $module_model::first();
        if($dataRecord){
            $id = $dataRecord->id;
        }

        $module_action = 'List';

        $$module_name = $module_model::latest()->paginate();

        /*return view(
            "$module_path.$module_name.index",
            compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_action', 'module_name_singular')
        );*/
        if($dataCount == 0){
            return view(
                "$module_path.$module_name.create",
                compact('module_title', 'module_name', "$module_name", 'module_icon', 'module_name_singular', 'module_action','module_path')
            );
        }else{
            return redirect()->route("backend.$module_name.edit",$id );
        }
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
        $genre = $request->has('genre_filter') ? 1 : 0;
        $season = $request->has('season_filter') ? 1 : 0;
        $type = $request->has('type_filter') ? 1 : 0;
        $$module_name_singular->update([
            'genre_filter' => $genre,
            'season_filter'=>$season,
            'type_filter'=>$type,
           
        ]);
       $$module_name_singular->update($request->all());

        flash(icon().' '.Str::singular($module_title)."' Updated Successfully")->success()->important();

        logUserAccess($module_title.' '.$module_action.' | Id: '.$$module_name_singular->id);

        return redirect()->route("backend.$module_name.show", $$module_name_singular->id);
    }

}
