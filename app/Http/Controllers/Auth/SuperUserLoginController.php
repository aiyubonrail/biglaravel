<?php
namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;
class SuperUserLoginController extends Controller
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
          public function __construct()
       {
           $this->middleware('guest:super')->except('logout');
       }
    
    public function login()
    {
        return view('auth.superlogin');
    }
    
    public function loginSuper(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'userame'   => 'required|min:3',
        'password' => 'required|min:6'
      ]);
      // Attempt to log the user in
      if (Auth::guard('super')->attempt(['username' => $request->username, 'password' => $request->password], $request->remember)) {

        return redirect()->intended(route('admin.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('username', 'remember'));
    }
    public function logout()
    {
        Auth::guard('super')->logout();
        return redirect()->route('auth.superlogin');
    }
}