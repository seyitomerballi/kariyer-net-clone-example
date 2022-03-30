<?php

namespace App\Http\Controllers;

use App\Models\Advertisements;
use App\Models\Country;
use App\Models\Department;
use App\Models\Disability;
use App\Models\DrivingLicense;
use App\Models\EducationLevel;
use App\Models\EmployerUser;
use App\Models\Experienced;
use App\Models\PositionLevel;
use App\Models\Sector;
use App\Models\WayOfWorking;
use App\Models\WorkingType;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployerController extends Controller
{
    public function index()
    {
//        return view(route('employee_user'));
        $title = 'İş Veren Kayıt';
        $url = 'employer_user';
        $form = [
            'user' => 'employer',
            'name' => 'employer_register_form'
        ];
        $district_list_url = route('country_districts.getListByCountry');
        $currentUser = Auth::guard('employer_user')->user();
        $updateUserInformationUrl = route('employerUser.updateUserInformation', $currentUser);
        $updateUserPasswordUrl = route('employerUser.updateUserPassword');
        $updateAdvertisement = route('employerUser.advertisements.updateAdvertisement');
        $country_list = Country::$country_list;
        $district_list = Country::$country_list[$currentUser->country]['districts'];
        $sector_list = Sector::all();
        $selectedSectors = json_decode($currentUser->sector, true);
        $department_list = Department::all();
        $working_type_list = WorkingType::all();
        $way_of_working_list = WayOfWorking::all();
        $position_level_list = PositionLevel::all();
        $education_level_list = EducationLevel::all();
        $experienced_list = Experienced::all();
        $disability_list = Disability::all();
        $driving_licence_list = DrivingLicense::all();
        return view('/employer-user', compact(
            'updateUserInformationUrl', 'updateUserPasswordUrl',
            'currentUser', 'country_list', 'district_list_url', 'updateAdvertisement',
            'form', 'url', 'title', 'department_list', 'district_list', 'position_level_list',
            'sector_list', 'selectedSectors', 'working_type_list', 'way_of_working_list',
            'education_level_list', 'experienced_list', 'disability_list', 'driving_licence_list'));
    }

    public function getUser()
    {
//        $currentUser = User::find(Auth::guard('employee_user')->user());
        $currentUser = Auth::guard('employer_user')->user();

        return response()->json(['currentUser' => $currentUser]);

    }

    public function updateUserInformation(Request $request, EmployerUser $employerUser)
    {
        if ($employerUser) {
            $this->validationUpdateUserInformation($request, $employerUser);
            $user = EmployerUser::find($employerUser->id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->phone_number = $request->phone;
            $user->company_name = $request->company_name;
            $user->country = $request->country;
            $user->district = $request->district;
            $user->description = $request->description;
            $user->sector = $request->sector;
            $user->foundation_year = $request->foundation_year;
            $user->address = $request->address;
            $user->save();

            $responseData = [
                'message' => 'Başarıyla Kaydedildi.',
                'user' => $user,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateUserInformation($request, $employerUser)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:255', 'regex:/(^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$)/u'],
            'company_name' => ['required', 'max:255', 'not_in:0'],
            'district' => ['required', 'max:255', 'not_in:0'],
            'description' => ['string', 'nullable'],
            'sector' => ['string', 'nullable'],
            'foundation_year' => ['date', 'nullable'],
            'address' => ['string', 'nullable']
        ];
        $customMessages = [
            'name.required' => ':attribute alanında  girilmesi zorunludur.',
            'name.max' => ':attribute alanında  max 255 karakter olabilir.',
            'surname.required' => ':attribute alanında  girilmesi zorunludur.',
            'surname.max' => ':attribute alanında  max 255 karakter olabilir.',
            'phone.required' => ':attribute alanında  girilmesi zorunludur.',
            'phone.max' => ':attribute alanında  max 255 karakter olabilir.',
            'phone.regex' => ':attribute alanında  uygun formatta değil',
            'company_name.required' => ':attribute alanında  girilmesi zorunludur.',
            'company_name.max' => ':attribute alanında  max 255 karakter olabilir.',
            'country.required' => ':attribute alanında  girilmesi zorunludur.',
            'country.max' => ':attribute alanında  max 255 karakter olabilir.',
            'country.not_in' => ':attribute alanında  girilmesi zorunludur.',
            'district.required' => ':attribute alanında  girilmesi zorunludur.',
            'district.max' => ':attribute alanında  max 255 karakter olabilir.',
            'description.not_in' => ':attribute alanında  girilmesi zorunludur.',
            'sector.array' => ':attribute en az bir seçenek giriniz',
            'foundation_year.date' => ':attribute formata uygun değil.',
        ];
        $customAttributes = [
            'name' => 'Ad',
            'surname' => 'Soyad',
            'phone' => 'Telefon',
            'company_name' => 'Şirket Adı',
            'country' => 'İl',
            'district' => 'İlçe',
            'description' => 'Açıklama',
            'sector' => 'Sektör',
            'foundation_year' => 'Kuruluş Yılı'
        ];

        if ($employerUser->email != Auth::guard('employer_user')->user()->email) {
            $rulesExtra = [
                'email' => ['required', 'string', 'max:255', 'unique:employer_user,email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            ];
            $customMessagesExtra = [
                'email.required' => ':attribute alanında  girilmesi zorunludur.',
                'email.max' => ':attribute alanında  max 255 karakter olabilir.',
                'email.regex' => ':attribute alanında  email formatında olmalıdır.',
                'email.unique' => 'Bu :attribute  zaten kullanılıyor',
            ];
            $customAttributesExtra = [
                'email' => 'E-mail',
            ];
            array_merge($rules, $rulesExtra);
            array_merge($customAttributes, $customMessagesExtra);
            array_merge($customAttributes, $customAttributesExtra);
        }

        $this->validate($request, $rules, $customMessages, $customAttributes);

    }

    public function updateUserPassword(Request $request)
    {
        $this->validationUpdateUserPassword($request);


        EmployerUser::find(Auth::guard('employer_user')->user()->id)->update(
            [
                'password' => Hash::make($request->password),
            ]);
        return response()->json(
            [
                'message' => 'Başarıyla güncellendi.',
            ]
        );
    }

    public function validationUpdateUserPassword($request)
    {

        $rules = [
            'currentPassword' => ['required', 'string', 'min:6',
                new MatchOldPassword(':attribute doğru değil.')],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'same:password'],
        ];
        $customMessages = [
            'currentPassword.required' => ':attribute alanında  girilmesi zorunludur.',
            'currentPassword.min' => ':attribute alanında en az 6 karakter girilmesi zorunludur.',
            'password.required' => ':attribute alanında  girilmesi zorunludur.',
            'password.min' => ':attribute alanında en az 6 karakter girilmesi zorunludur.',
            'password_confirmation.required' => ':attribute alanında  girilmesi zorunludur.',
            'password_confirmation.same' => ':attribute alanında şifreler ile uyuşmuyor.',
        ];
        $customAttributes = [
            'currentPassword' => 'Mevcut Şifre',
            'password' => 'Şifre',
            'password_confirmation' => 'Şifre Onaylama',
        ];

        $this->validate($request, $rules, $customMessages, $customAttributes);
    }

}
