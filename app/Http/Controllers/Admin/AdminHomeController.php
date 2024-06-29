<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminHomeController extends Controller
{
    protected $toastr;
    public function __construct(ToastrInterface $toastr)
    {
        $this->middleware('auth');
        $this->toastr = $toastr;
    } 
    public function index(){
        return view('admin.dashboard');
    }
    //admin Custom logout
    public function logout()
    {
        Auth::logout();
        $this->toastr->success('You are logged out!');
        return redirect()->route('admin.login');
    }

    // password change page
    public function passwordChange(){
        return view('admin.profile.password_change');
    }
    //Password Update
    public function passwordUpdate(Request $request){
        $request->validate([
            'old_password' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);
        $current_password=Auth::user()->password;
        $oldpass=$request->old_password;

        if (Hash::check($oldpass,$current_password)){
            $user=User::findorfail(Auth::id());
            $user->password=Hash::make($request->password);
            $user->save();
            Auth::logout();
            $this->toastr->success('You Password Change!');
            return redirect()->route('admin.login');
        }else{
            $this->toastr->error('Old Password Not Matched!');
            return redirect()->back();
        }
    }
}
