<?php

namespace App\Http\Controllers;

use App\Models\EmployeeUserContactInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManagerStatic as Image;

class EmployeeUserContactInformationController extends Controller
{
    public function updateContactInformation(Request $request)
    {
        $this->validationUpdateContactInformation($request);
        $new_contactInformation = EmployeeUserContactInformation::where('employee_user_id', Auth::user()->id)->first();
        if (!$new_contactInformation) {
            $new_contactInformation = new EmployeeUserContactInformation();
            $new_contactInformation->employee_user_id = Auth::user()->id;
        }
        $new_contactInformation->name = $request->cv_ci_name;
        $new_contactInformation->surname = $request->cv_ci_surname;
        $new_contactInformation->email = $request->cv_ci_email;
        $new_contactInformation->date_of_birth = $request->cv_ci_birthday;
        $new_contactInformation->degree = $request->cv_ci_degree;
        $new_contactInformation->phone_number = $request->cv_ci_phone_number;
        $new_contactInformation->phone_number_alternative = $request->cv_ci_phone_number_alternative;
        $new_contactInformation->country = $request->cv_ci_country;
        $new_contactInformation->city = $request->cv_ci_city;
        $new_contactInformation->web_page = $request->cv_ci_web_page;

        $image = $request->file('cv_ci_image');
        if ($image) {
            $imageName = $image->getClientOriginalName();
            $fileName = 'public/images/' . time() . '-' . $imageName;
            Image::make($image)->resize(100, 150)->save(storage_path('app/' . $fileName));

            $new_contactInformation->image_name = $imageName;
            $new_contactInformation->image_path = $fileName;
        }

        if ($new_contactInformation->save()) {
            $responseData = [
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $new_contactInformation,
            ];
            return response()->json($responseData);
        } else {
            $responseData = [
                'message' => 'Kayıt edilirken bir sorun oluştu.',
                'data' => $new_contactInformation,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateContactInformation($request)
    {
        $rules = [
            'cv_ci_name' => 'required',
            'cv_ci_surname' => 'required',
            'cv_ci_email' => 'required|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'cv_ci_birthday' => 'required|date',
            'cv_ci_phone_number' => 'required',
            'cv_ci_city' => 'required',
        ];

        $customMessages = [
            'cv_ci_name.required' => ':attribute alanı zorunludur.',
            'cv_ci_surname.required' => ':attribute alanı zorunludur.',
            'cv_ci_email.required' => ':attribute alanı zorunludur.',
            'cv_ci_email.regex' => ':attribute alanı formatı yanlıştır.',
            'cv_ci_birthday.required' => ':attribute alanı zorunludur.',
            'cv_ci_birthday.date' => ':attribute alanı tarih formatında  zorunludur.',
            'cv_ci_phone_number.required' => ':attribute alanı zorunludur.',
            'cv_ci_city.required' => ':attribute alanı zorunludur.',
        ];

        $customAttribute = [
            'cv_ci_name' => 'İsim',
            'cv_ci_surname' => 'Soyisim',
            'cv_ci_email' => 'Email',
            'cv_ci_birthday' => 'Doğum Tarihi',
            'cv_ci_phone_number' => 'Telefon No',
            'cv_ci_city' => 'Şehir',
        ];

        if ($request->file != null) {
            $rules_ex = [
                'cv_ci_image' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ];

            $customMessages_ex = [
                'cv_ci_image.mimes' => ':attribute alanı uygun formatta olması zorunludur.',
                'cv_ci_image.max' => ':attribute alanı maximum 2048 kb olması zorunludur.',
            ];

            $customAttribute_ex = [
                'cv_ci_image' => 'Kişisel Resim',
            ];
            array_push($rules, $rules_ex);
            array_push($customMessages, $customMessages_ex);
            array_push($customAttribute, $customAttribute_ex);
        }

        $this->validate($request, $rules, $customMessages, $customAttribute);
    }
}
