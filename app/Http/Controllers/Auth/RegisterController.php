<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\EmployeeUser;
use App\Models\EmployerUser;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class  RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
        $this->middleware('guest:employer_user');
        $this->middleware('guest:employee_user');
    }

    public function showEmployerUserRegisterForm()
    {
        $title = 'İş Veren Kayıt';
        $url = 'employer_user';
        $form = [
            'user' => 'employer',
            'name' => 'employer_register_form'
        ];
        $actionUrl = route('employer_user.create_employer_user');
        $country_list = Country::$country_list;
        $district_list_url = route('country_districts.getListByCountry');
        return view('auth.register', compact(['title', 'url', 'form', 'actionUrl', 'country_list', 'district_list_url']));
    }

    public function showEmployeeUserRegisterForm()
    {
        $title = 'İş Arayan Kayıt';
        $url = 'employee_user';
        $form = [
            'user' => 'employee',
            'name' => 'employee_register_form'
        ];
        $actionUrl = route('employee_user.create_employee_user');
//        $country_list = Country::$country_list;
//        $district_list_url = route('country_districts.getListByCountry');
        return view('auth.register', compact(['title', 'url', 'form', 'actionUrl']));
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function createEmployerUser(Request $request)
    {

        $this->validatorEmployerUser($request->all())->validate();
        EmployerUser::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone,
            'company_name' => $request->company_name,
            'country' => $request->country,
            'district' => $request->district,
        ]);

        return response()->json([
            'message' => 'Başarıyla gerçekleşti.',
            'redirect' => route('employer_user.login_form')
        ]);
    }

    protected function validatorEmployerUser(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:employer_user'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'min:6', 'same:password'],
            'phone' => ['required', 'max:255'],
            'company_name' => ['required', 'string', 'max:255', 'not_in:0'],
            'country' => ['required', 'string', 'max:255', 'not_in:0'],
            'district' => ['required', 'string', 'max:255']
        ];
        $customMessages = [
            'name.required' => ':attribute alanında  girilmesi zorunludur.',
            'name.max' => ':attribute alanında  max 255 karakter olabilir.',
            'surname.required' => ':attribute alanında  girilmesi zorunludur.',
            'surname.max' => ':attribute alanında  max 255 karakter olabilir.',
            'email.required' => ':attribute alanında  girilmesi zorunludur.',
            'email.max' => ':attribute alanında  max 255 karakter olabilir.',
            'email.email' => ':attribute alanında  email formatında olmalıdır.',
            'email.unique' => ':attribute alanında  zaten kullanılıyor',
            'password.required' => ':attribute alanında  girilmesi zorunludur.',
            'password_confirmation.required' => ':attribute alanının girilmesi zorunludur.',
            'password_confirmation.same' => ':attribute alanında  Onaylama :attribute alanında  ile uyuşmuyor.',
            'phone.required' => ':attribute alanında  girilmesi zorunludur.',
            'phone.max' => ':attribute alanında  max 255 karakter olabilir.',
            'company_name.required' => ':attribute alanında  girilmesi zorunludur.',
            'company_name.max' => ':attribute alanında  max 255 karakter olabilir.',
            'country.required' => ':attribute alanında  girilmesi zorunludur.',
            'country.max' => ':attribute alanında  max 255 karakter olabilir.',
            'country.not_in' => ':attribute alanında  girilmesi zorunludur.',
            'district.required' => ':attribute alanında  girilmesi zorunludur.',
            'district.max' => ':attribute alanında  max 255 karakter olabilir.',
            'district.not_in' => ':attribute alanında  girilmesi zorunludur.',
        ];
        $customAttributes = [
            'name' => 'Ad',
            'surname' => 'Soyad',
            'email' => 'E-mail',
            'password' => 'Şifre',
            'password_confirmation' => 'Şifre',
            'phone' => 'Telefon',
            'company_name' => 'Şirket Adı',
            'country' => 'İl',
            'district' => 'İlçe'
        ];

        return Validator::make($data, $rules, $customMessages, $customAttributes);
    }

    protected function createEmployeeUser(Request $request)
    {
        $this->validatorEmployeeUser($request->all())->validate();
        EmployeeUser::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'phone_number' => $request->phone,
        ]);

        return response()->json(['message'=>'Başarıyla Kaydoldunuz.','redirect' => route('employee_user.login_form')]);
    }

    protected function validatorEmployeeUser(array $data)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:employee_user,email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'same:password'],
            'phone' => ['required', 'max:255', 'regex:/(^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$)/u'],
        ];
        $customMessages = [
            'name.required' => ':attribute alanında  girilmesi zorunludur.',
            'name.max' => ':attribute alanında  max 255 karakter olabilir.',
            'surname.required' => ':attribute alanında  girilmesi zorunludur.',
            'surname.max' => ':attribute alanında  max 255 karakter olabilir.',
            'email.required' => ':attribute alanında  girilmesi zorunludur.',
            'email.max' => ':attribute alanında  max 255 karakter olabilir.',
            'email.regex' => ':attribute alanında  email formatında olmalıdır.',
            'email.unique' => 'Bu :attribute  zaten kullanılıyor',
            'password.required' => ':attribute alanında  girilmesi zorunludur.',
            'password.min' => ':attribute alanında en az 6 karakter girilmesi zorunludur.',
            'password_confirmation.required' => ':attribute alanında  girilmesi zorunludur.',
            'password_confirmation.same' => ':attribute alanında şifreler ile uyuşmuyor.',
            'phone.required' => ':attribute alanında  girilmesi zorunludur.',
            'phone.max' => ':attribute alanında  max 255 karakter olabilir.',
            'phone.regex' => ':attribute alanında  uygun formatta değil',
        ];
        $customAttributes = [
            'name' => 'Ad',
            'surname' => 'Soyad',
            'email' => 'E-mail',
            'password' => 'Şifre',
            'password_confirmation' => 'Şifre Onaylama',
            'phone' => 'Telefon',
        ];

        return Validator::make($data, $rules, $customMessages, $customAttributes);
    }
}
