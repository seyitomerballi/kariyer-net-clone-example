<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
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
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:employer_user')->except('logout');
        $this->middleware('guest:employee_user')->except('logout');
    }

    public function showEmployerUserLoginForm()
    {
        $title = 'İş Veren Giriş';
        $url = 'employer_user';
        $form = [
            'user' => 'employer',
            'name' => 'employer_login_form'
        ];
        $actionUrl = route('employer_user.login');
        return view('auth.login', compact(['title', 'url', 'form', 'actionUrl']));
    }

    public function employerUserLogin(Request $request)
    {

        $rules = [
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:6'
        ];
        $customMessages = [
            'email.required' => ':attribute alanı zorunludur.',
            'password.required' => ':attribute alanı zorunludur.',
            'password.min' => ':attribute en az 6 karakter olmalıdır.',
        ];

        $customAttributes = [
            'email' => 'Email',
            'password' => 'Şifre',
        ];

        $this->validate($request, $rules, $customMessages, $customAttributes);

        if (Auth::guard('employer_user')->attempt([
            'email' => $request->email,
            'password' => $request->password,], ($request->get('remember') == 'on') ? true : false)) {

            return response()->json(['message' => 'Giriş Yapıldı','redirect' => '/']);
        }
        return response()->json([
            'message' => 'Böyle bir kullanıcı bulunamadı veya şifre yanlış',
            'redirect' => route('employer_user.login')
        ]);
    }

    public function showEmployeeUserLoginForm()
    {
        $title = 'İş Arayan Giriş';
        $url = 'employee_user';
        $form = [
            'user' => 'employee',
            'name' => 'employee_login_form'
        ];
        $actionUrl = route('employee_user.login');
        return view('auth.login', compact(['title', 'url', 'form', 'actionUrl']));
    }

    public function employeeUserLogin(Request $request)
    {
        $rules = [
            'email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'password' => 'required|min:6'
        ];
        $customMessages = [
            'email.required' => ':attribute alanı zorunludur.',
            'email.regex' => ':attribute alanı formatı yanlış.',
            'password.required' => ':attribute alanı zorunludur.',
            'password.min' => ':attribute en az 6 karakter olmalıdır.',
        ];

        $customAttributes = [
            'email' => 'Email',
            'password' => 'Şifre',
        ];

        $this->validate($request, $rules, $customMessages, $customAttributes);

        if (Auth::guard('employee_user')->attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
            ],
            ($request->get('remember') == 'on') ? true : false)) {
            return response()->json(['message' => 'Giriş Yapıldı','redirect' => '/']);
        }
        return response()->json([
            'message' => 'Böyle bir kullanıcı bulunamadı',
            'redirect' => route('employee_user.login')
        ]);
    }

    public function logout(Request $request)
    {
        if (Auth::guard('employee_user')->check() || Auth::guard('employer_user')->check()) {
            Auth::guard('employee_user')->logout();
            Auth::guard('employer_user')->logout();
            return redirect('/');
        }
    }
}
