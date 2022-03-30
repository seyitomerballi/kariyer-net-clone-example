<?php

namespace App\Http\Controllers;

use App\Models\EmployeeUserEducationInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeUserEducationInformationController extends Controller
{
    public function updateEducationInformation(Request $request)
    {
        $this->validationUpdateEducationInformation($request);

        $new_educationInformation = new EmployeeUserEducationInformation();
        $new_educationInformation->employee_user_id = Auth::user()->id;
        $new_educationInformation->education_status = $request->cv_ei_education_status;
        $new_educationInformation->start_date = $request->cv_ei_start_date;
        if ($request->cv_ei_leave === null && $request->cv_ei_continues === null) {
            $new_educationInformation->end_date = $request->cv_ei_end_date;
        }
        $new_educationInformation->continues = $request->cv_ei_continues ?? 0;
        $new_educationInformation->leave = $request->cv_ei_leave ?? 0;
        $new_educationInformation->university = $request->cv_ei_university;
        $new_educationInformation->country = $request->cv_ei_country;
        $new_educationInformation->faculty = $request->cv_ei_faculty;
        $new_educationInformation->department = $request->cv_ei_department;
        $new_educationInformation->description = $request->cv_ei_description;

        if ($new_educationInformation->save()) {
            $responseData = [
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $new_educationInformation,
            ];
            return response()->json($responseData);
        } else {
            $responseData = [
                'message' => 'Kayıt edilirken bir sorun oluştu.',
                'data' => $new_educationInformation,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateEducationInformation($request)
    {
        $rules = [
            'cv_ei_education_status' => 'required|not_in:0',
            'cv_ei_start_date' => 'required|date',
            'cv_ei_end_date' => 'date',
            'cv_ei_university' => 'required',
            'cv_ei_country' => 'required',
            'cv_ei_faculty' => 'required',
            'cv_ei_department' => 'required',
        ];

        $customMessages = [
            'cv_ei_education_status.required' => ':attribute alanı zorunludur.',
            'cv_ei_education_status.not_in' => ':attribute alanı zorunludur.',
            'cv_ei_start_date.required' => ':attribute alanı zorunludur.',
            'cv_ei_start_date.date' => ':attribute alanı tarih formatında olması zorunludur.',
            'cv_ei_end_date.date' => ':attribute alanı tarih formatında olması zorunludur.',
            'cv_ei_university.required' => ':attribute alanı zorunludur.',
            'cv_ei_country.required' => ':attribute alanı zorunludur.',
            'cv_ei_faculty.required' => ':attribute alanı zorunludur.',
            'cv_ei_department.required' => ':attribute alanı zorunludur.',
        ];

        $customAttribute = [
            'cv_ei_education_status' => 'Eğitim Durumu',
            'cv_ei_start_date' => 'Başlangıç Tarihi',
            'cv_ei_end_date' => 'Bitiş Tarihi',
            'cv_ei_university' => 'Üniversite',
            'cv_ei_country' => 'Şehir',
            'cv_ei_faculty' => 'Fakülte',
            'cv_ei_department' => 'Bölüm',
        ];

        if ($request->cv_ei_continues == null && $request->cv_ei_leave == null) {
            $rules_ex = [
                'cv_ei_end_date' => 'required',
            ];

            $customMessages_ex = [
                'cv_ei_end_date.required' => ':attribute alanı zorunludur.',
            ];

            $rules['cv_ei_end_date'] = $rules['cv_ei_end_date'] . '|' . $rules_ex['cv_ei_end_date'];
            $customMessages = array_merge($customMessages, $customMessages_ex);
        } else {

            $rules_ex = [
                'cv_ei_end_date' => 'nullable',
            ];

            $rules['cv_ei_end_date'] = $rules['cv_ei_end_date'] . '|' . $rules_ex['cv_ei_end_date'];

        }
        $this->validate($request, $rules, $customMessages, $customAttribute);
    }

    public function deleteEducationInformation(EmployeeUserEducationInformation $educationInformation)
    {
        if ($educationInformation->delete()) {
            $responseData = [
                'result' => 'ok',
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $educationInformation,
            ];
            return response()->json($responseData);
        }
        $responseData = [
            'result' => 'fail',
            'message' => 'Kayıt silinirken bir sorun oluştu.',
            'data' => $educationInformation,
        ];
        return response()->json($responseData);
    }
}
