<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\EmployeeUser;
use App\Models\EmployeeUserContactInformation;
use App\Models\EmployeeUserEducationInformation;
use App\Models\EmployeeUserForeignLanguage;
use App\Models\EmployeeUserSummaryExplanation;
use App\Models\EmployeeUserSummaryInformation;
use App\Models\EmployeeUserWorkExperience;
use App\Models\File;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{

    public function index()
    {
//        return view(route('employee_user'));
        $currentUser = Auth::guard('employee_user')->user();
        $updateUserInformationUrl = route('employeeUser.updateUserInformation', $currentUser);
        $updateUserPasswordUrl = route('employeeUser.updateUserPassword');
        $currentUserCv = File::where('id', $currentUser->id)->first();
        $country_master_list = Country::$country_master_list;
        $country_list = Country::$country_list;


        $userContactInformation = EmployeeUserContactInformation::where('employee_user_id', Auth::user()->id)->first();
        $userSummaryInformation = EmployeeUserSummaryInformation::where('employee_user_id', Auth::user()->id)->first();
        $userSummaryExplanation = EmployeeUserSummaryExplanation::where('employee_user_id', Auth::user()->id)->first();
        /* Work Exp */
        $userWorkExperiencesList = EmployeeUserWorkExperience::where('employee_user_id', Auth::user()->id)->get();
        $company_sector_list = EmployeeUserWorkExperience::$company_sector_list;
        $business_area_list = EmployeeUserWorkExperience::$business_area_list;
        $working_type_list = EmployeeUserWorkExperience::$working_type_list;

        /* Edu Info */
        $userEducationInformationsList = EmployeeUserEducationInformation::where('employee_user_id', Auth::user()->id)->get();
        $education_status_list = EmployeeUserEducationInformation::$education_status_list;

        /* fore lan */
        $userForeignLanguagesList = EmployeeUserForeignLanguage::where('employee_user_id', Auth::user()->id)->get();
        $foreign_languages_list = EmployeeUserForeignLanguage::$languages_list;
        $language_level_list = EmployeeUserForeignLanguage::$language_level_list;
        $currentCv = [
            'url' => '',
            'name' => '',
            'is_has' => false
        ];
        if ($currentUserCv)
            $currentCv = [
                'url' => route('file.download', $currentUser->id),
                'name' => $currentUserCv->name ?? '',
                'is_has' => true,
            ];
        return view('/employee-user', compact('updateUserInformationUrl',
            'userContactInformation', 'userSummaryInformation', 'userSummaryExplanation',
            'updateUserPasswordUrl', 'country_master_list', 'country_list',
            'userForeignLanguagesList', 'foreign_languages_list', 'language_level_list',
            'userWorkExperiencesList', 'education_status_list', 'userEducationInformationsList',
            'company_sector_list', 'business_area_list', 'working_type_list',
            'currentUser', 'currentCv'));
    }

    public function getUser()
    {
//        $currentUser = User::find(Auth::guard('employee_user')->user());
        $currentUser = Auth::guard('employee_user')->user();

        return response()->json(['currentUser' => $currentUser]);

    }

    public function updateUserInformation(Request $request, EmployeeUser $employeeUser)
    {
        if ($employeeUser) {
            $this->validationUpdateUserInformation($request, $employeeUser);
            $user = EmployeeUser::find($employeeUser->id);
            $user->name = $request->name;
            $user->surname = $request->surname;
            $user->email = $request->email;
            $user->phone_number = $request->phone;
            $user->save();
            $responseData = [
                'message' => 'Ba??ar??yla Kaydedildi.',
                'user' => $user,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateUserInformation($request, $employeeUser)
    {
        $rules = [
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'max:255', 'regex:/(^(\+\d{1,2}\s)?\(?\d{3}\)?[\s.-]?\d{3}[\s.-]?\d{4}$)/u'],
        ];
        $customMessages = [
            'name.required' => ':attribute alan??nda  girilmesi zorunludur.',
            'name.max' => ':attribute alan??nda  max 255 karakter olabilir.',
            'surname.required' => ':attribute alan??nda  girilmesi zorunludur.',
            'surname.max' => ':attribute alan??nda  max 255 karakter olabilir.',
            'phone.required' => ':attribute alan??nda  girilmesi zorunludur.',
            'phone.max' => ':attribute alan??nda  max 255 karakter olabilir.',
            'phone.regex' => ':attribute alan??nda  uygun formatta de??il',
        ];
        $customAttributes = [
            'name' => 'Ad',
            'surname' => 'Soyad',
            'phone' => 'Telefon',
        ];

        if ($employeeUser->email != Auth::guard('employee_user')->user()->email) {
            $rulesExtra = [
                'email' => ['required', 'string', 'max:255', 'unique:employee_user,email', 'regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix'],
            ];
            $customMessagesExtra = [
                'email.required' => ':attribute alan??nda  girilmesi zorunludur.',
                'email.max' => ':attribute alan??nda  max 255 karakter olabilir.',
                'email.regex' => ':attribute alan??nda  email format??nda olmal??d??r.',
                'email.unique' => 'Bu :attribute  zaten kullan??l??yor',
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


        EmployeeUser::find(Auth::guard('employee_user')->user()->id)->update(
            [
                'password' => Hash::make($request->password),
            ]);
        return response()->json(
            [
                'message' => 'Ba??ar??yla g??ncellendi.',
            ]
        );
    }

    public function validationUpdateUserPassword($request)
    {

        $rules = [
            'currentPassword' => ['required', 'string', 'min:6',
                new MatchOldPassword(':attribute do??ru de??il.')],
            'password' => ['required', 'string', 'min:6'],
            'password_confirmation' => ['required', 'string', 'same:password'],
        ];
        $customMessages = [
            'currentPassword.required' => ':attribute alan??nda  girilmesi zorunludur.',
            'currentPassword.min' => ':attribute alan??nda en az 6 karakter girilmesi zorunludur.',
            'password.required' => ':attribute alan??nda  girilmesi zorunludur.',
            'password.min' => ':attribute alan??nda en az 6 karakter girilmesi zorunludur.',
            'password_confirmation.required' => ':attribute alan??nda  girilmesi zorunludur.',
            'password_confirmation.same' => ':attribute alan??nda ??ifreler ile uyu??muyor.',
        ];
        $customAttributes = [
            'currentPassword' => 'Mevcut ??ifre',
            'password' => '??ifre',
            'password_confirmation' => '??ifre Onaylama',
        ];

        $this->validate($request, $rules, $customMessages, $customAttributes);
    }

    public function previewCv(EmployeeUser $employeeUser)
    {
        if (Auth::guard('employee_user')->user()) {
            if ($employeeUser->id == Auth::user()->id) {
                if (!$employeeUser->id) $employeeUser = Auth::user();
            }else{
                return "Yetkisiz Eri??im";
            }
        }
        $userContactInformation = EmployeeUserContactInformation::where('employee_user_id', $employeeUser->id)->first();
        $userSummaryInformation = EmployeeUserSummaryInformation::where('employee_user_id', $employeeUser->id)->first();
        $userSummaryExplanation = EmployeeUserSummaryExplanation::where('employee_user_id', $employeeUser->id)->first();
        $userWorkExperience = EmployeeUserWorkExperience::where('employee_user_id', $employeeUser->id)->get();
        $userEducationInformation = EmployeeUserEducationInformation::where('employee_user_id', $employeeUser->id)
            ->get();
        $userForeignLanguage = EmployeeUserForeignLanguage::where('employee_user_id', $employeeUser->id)->get();


        return view('employee-user-cv-preview',
            compact(
                'userSummaryInformation', 'userContactInformation',
                'userSummaryExplanation', 'userWorkExperience',
                'userEducationInformation', 'userForeignLanguage'
            ));
    }
}
