<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Flasher\Toastr\Prime\ToastrInterface;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    
    public function login(Request $request , ToastrInterface $toastr){
        $request->validate([
            'email' =>'required|email',
            'password'=>'required'
        ]);

        if(Auth::attempt($request->only('email','password'))){
            if(auth()->user()->is_admin==1){
                $toastr->success('Admin loggedin Successfuly !');
                return redirect()->route('admin.home');
                }else{
                    $toastr->success('User loggedin Successfuly !');
                        return redirect()->route('home');
                    }
            }else{
                    return back()->withErrors(['email'=>'Invalid email or password']);
                }
    }

    // admin login form
    public function adminLogin(){
        return view('admin.auth.login');
    }
}
