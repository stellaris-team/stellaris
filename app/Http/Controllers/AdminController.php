<?php

namespace App\Http\Controllers;

use Artisan;
use App\Group;
use App\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct () { $this->middleware('auth'); }

    public function overview () { return view('admin.pages.overview'); }
    
    public function app () { return view('admin.pages.app.index'); }
    public function updateAppSettings (Request $request)
    {
        $validator = $request->validate([
            'app_name' => 'required|max:120',
            'app_base_url' => 'required',
            'fa_kit_id' => 'alpha_num'
        ]);

        $fa_pro = $request->fa_pro == "enabled" ? "true" : "false";

        Artisan::call('env:set app_name \"' . $request->app_name . '\"');
        Artisan::call('env:set app_base_url ' . $request->app_base_url);
        Artisan::call('env:set fa_pro ' . $fa_pro);
        Artisan::call('env:set fa_kit_id ' . $request->fa_kit_id);

        return redirect()->route('admin.app_settings');
    }

    public function groups () { return view('admin.pages.groups.index'); }
    public function addGroup (Request $request)
    {
        $validator = $request->validate([
            'group_name' => 'required|max:120',
            'group_after' => 'numeric'
        ]);

        $group = new Group();
        $group->name = $request->group_name;
        $group->uuid = Str::uuid();
        $group->order = Group::getNextOrderIndex();
        $group->save();
        return redirect()->route('admin.groups');
    }

    public function modules () { return view('admin.pages.modules.index'); }
    public function addModule ($groupId) { return view('admin.pages.modules.add')->with('group', Group::where('uuid', $groupId)->first()); }
    public function postAddModule (Request $request)
    {
        $validator = $request->validate([
            'group_uuid'    => 'required|exists:groups,uuid',
            'name'          => 'required',
            'ping_url'      => 'required_if:ping,1'
        ]);

        $module = new Module();
        $module->uuid = Str::uuid();
        $module->name = $request->name;
        $module->group = Group::where('uuid', $request->group_uuid)->first()->id;
        $module->order = Module::getNextOrderIndex();
        $module->ping = $request->ping == '1' ? true : false;
        $module->ping_url = $request->ping == '1' ? $request->ping_url : '';
        $module->save();
        return redirect()->route('admin.modules');
    }

    public function editModule ($moduleId) { return view('admin.pages.modules.edit')->with('module', Module::where('uuid', $moduleId)->first()); }
    public function postEditModule (Request $request)
    {
        $validator = $request->validate([
            'module_uuid'   => 'required|exists:modules,uuid',
            'name'          => 'required',
            'ping_url'      => 'required_if:ping,1'
        ]);

        if ($module = Module::where('uuid', $request->module_uuid)->first())
        {
            $module->name = $request->name;
            $module->ping = $request->ping == '1' ? true : false;
            $module->ping_url = $request->ping == '1' ? $request->ping_url : '';
            $module->save();
        }
        return redirect()->route('admin.modules');
    }



    public function users () { return view('admin.pages.users.index'); }
}
