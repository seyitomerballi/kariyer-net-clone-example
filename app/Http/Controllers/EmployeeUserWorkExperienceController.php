<?php

namespace App\Http\Controllers;

use App\Models\EmployeeUserWorkExperience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeUserWorkExperienceController extends Controller
{
    public function updateWorkExperience(Request $request)
    {
        $this->validationUpdateWorkExperience($request);

        $new_workExperience = new EmployeeUserWorkExperience();
        $new_workExperience->employee_user_id = Auth::user()->id;
        $new_workExperience->company_name = $request->cv_we_company_name;
        $new_workExperience->position = $request->cv_we_position;
        $new_workExperience->start_date = $request->cv_we_start_date;
        if (!($request->cv_we_still_working == 1)) {
            $new_workExperience->end_date = $request->cv_we_end_date;
        }
        $new_workExperience->still_working = $request->cv_we_still_working == 1 ? $request->cv_we_still_working : 0;
        $new_workExperience->company_sector = $request->cv_se_company_sector;
        $new_workExperience->business_area = $request->cv_se_business_area;
        $new_workExperience->working_type = $request->cv_se_working_type;
        $new_workExperience->country = $request->cv_se_country;
        $new_workExperience->city = $request->cv_se_city;
        $new_workExperience->desc = $request->cv_se_desc;

        if ($new_workExperience->save()) {
            $responseData = [
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $new_workExperience,
            ];
            return response()->json($responseData);
        } else {
            $responseData = [
                'message' => 'Kayıt edilirken bir sorun oluştu.',
                'data' => $new_workExperience,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateWorkExperience($request)
    {
        $rules = [
            'cv_we_company_name' => 'required|max:255',
            'cv_we_position' => 'required|max:255',
            'cv_we_start_date' => 'required|date',
            'cv_we_end_date' => 'date',
            'cv_se_company_sector' => 'required|integer|not_in:0',
            'cv_se_business_area' => 'required|integer|not_in:0',
            'cv_se_working_type' => 'required|not_in:0',
        ];

        $customMessages = [
            'cv_we_company_name.required' => ':attribute alanı zorunludur.',
            'cv_we_company_name.max' => ':attribute alanı maksimum 255 karakter olabilir.',
            'cv_we_position.required' => ':attribute alanı zorunludur.',
            'cv_we_position.max' => ':attribute alanı maksimum 255 karakter olabilir.',
            'cv_we_start_date.required' => ':attribute alanı zorunludur.',
            'cv_we_start_date.date' => ':attribute alanı tarih formatında olması zorunludur.',
            'cv_we_end_date.date' => ':attribute alanı tarih formatında olması zorunludur.',
            'cv_se_company_sector.required' => ':attribute alanı zorunludur.',
            'cv_se_company_sector.not_in' => ':attribute alanı zorunludur.',
            'cv_se_business_area.required' => ':attribute alanı zorunludur.',
            'cv_se_business_area.not_in' => ':attribute alanı zorunludur.',
            'cv_se_working_type.required' => ':attribute alanı zorunludur.',
            'cv_se_working_type.not_in' => ':attribute alanı zorunludur.',
        ];

        $customAttribute = [
            'cv_we_company_name' => 'Şirket Adı',
            'cv_we_position' => 'Pozisyon',
            'cv_we_start_date' => 'Başlangıç Tarihi',
            'cv_we_end_date' => 'Bitiş Tarihi',
            'cv_se_company_sector' => 'Firma Sektörü',
            'cv_se_business_area' => 'İş Alanı',
            'cv_se_working_type' => 'Çalışma Şekli',
        ];

        if ($request->cv_we_still_working == null) {
            $rules_ex = [
                'cv_we_end_date' => 'required',
            ];

            $customMessages_ex = [
                'cv_we_end_date.required' => ':attribute alanı zorunludur.',
            ];

            $rules['cv_we_end_date'] = $rules['cv_we_end_date'] . '|' . $rules_ex['cv_we_end_date'];
            $customMessages= array_merge($customMessages, $customMessages_ex);
        }else{
            $rules_ex = [
                'cv_we_end_date' => 'nullable',
            ];

            $rules['cv_we_end_date'] = $rules['cv_we_end_date'] . '|' . $rules_ex['cv_we_end_date'];
        }
        $this->validate($request, $rules, $customMessages, $customAttribute);
    }

    public function deleteWorkExperience(EmployeeUserWorkExperience $workExperience)
    {
        if ($workExperience->delete()) {
            $responseData = [
                'result' => 'ok',
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $workExperience,
            ];
            return response()->json($responseData);
        }
        $responseData = [
            'result' => 'fail',
            'message' => 'Kayıt silinirken bir sorun oluştu.',
            'data' => $workExperience,
        ];
        return response()->json($responseData);
    }
}
