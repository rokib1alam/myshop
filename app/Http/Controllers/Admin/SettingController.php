<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    protected $toastr;

    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }

    public function index()
    {
        $website = Setting::first();
        return view('admin.setting.website', compact('website'));
    }

    public function update(Request $request, Setting $website)
    {
        // Use dd() to dump and die to see the request data
        // dd($request->all()); 
        Setting::updateSetting($request, $website);
        
        $this->toastr->success('Setting updated successfully!');
        return back();
    }
}

