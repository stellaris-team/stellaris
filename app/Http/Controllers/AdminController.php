<?php

namespace App\Http\Controllers;

use Artisan;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AdminController extends Controller
{
    public function __construct () { $this->middleware('auth'); }

    public function overview () { return view('admin.pages.overview'); }
    
    public function app () { return view('admin.pages.app'); }
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

    public function groups () { return view('admin.pages.groups'); }
    public function addGroup (Request $request)
    {
        $validator = $request->validate([
            'group_name' => 'required|max:120',
            'group_after' => 'numeric'
        ]);

        $group = new Group();
        $group->name = $request->group_name;
        $group->uuid = Str::uuid();
        $group->save();
        return redirect()->route('admin.groups');
    }

    public function items () { return view('admin.pages.items'); }
    public function users () { return view('admin.pages.users'); }
}
