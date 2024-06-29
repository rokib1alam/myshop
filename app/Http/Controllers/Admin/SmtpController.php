<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\smtp;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;

class SmtpController extends Controller
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
    public function index()
    {
        $data=smtp::first();
        return view('admin.setting.smtp', compact('data'));
    }

    public function update(Request $request, smtp $smtp)
    {
        smtp::updateSmtps($request, $smtp);
        $this->toastr->success('SMTP updated successfully!');
        return back();
    }

}
