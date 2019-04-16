<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
    protected $redirectTo = '/admin/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showLoginForm()
    {
        return view('admin.auth.login');
    }
    
    // // user check is active if equa 0 is not active, 1 is active
    // protected function sendFailedLoginResponse(Request $request)
    // {
    //     $fields = $this->credentials($request);
        
    //     if($fields['email']=='inactive')
    //     {
    //         $errors = $fields['password'];
    //     }else
    //     {
    //         $errors =  [$this->username() => trans('auth.failed')];
    //     }

    //     throw ValidationException::withMessages([
    //         //$this->username() => [trans('auth.failed')],
    //         $errors,
    //     ]);
    // }

    // // validation user is active in login
    // protected function credentials(Request $request)
    // {
    //     $admin = Admin::where('email',$request->email)->first();
        
    //     if($admin != null)
    //     {
    //         if ($admin->status == 0) {
    //             return ['email'=>'inactive','password'=>'You are not an active person, please contact Admin'];
    //         }else{
    //             return ['email'=>$request->email,'password'=>$request->password,'status'=>1];
    //         }
    //     }

    //     return $request->only($this->username(), 'password');
    // }

    

    // check admin/home => admin/login
    public function __construct()
    {
        //$this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }
}
