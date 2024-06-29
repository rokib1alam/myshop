<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\seo;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class SeoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    }
    //seo page show method
    public function index()
    {
        $data=seo::first();
        return view('admin.setting.seo', compact('data'));
    }

    
    public function update(Request $request, seo $seo)
    {
        seo::updateSeos($request, $seo);
        $this->toastr->success('SEO updated successfully!');
        return back();
    }

}
