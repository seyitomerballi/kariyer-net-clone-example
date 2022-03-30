<?php

namespace App\Http\Controllers;

use App\Models\EmployeeUserSummaryInformation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeUserSummaryInformationController extends Controller
{
    public function updateSummaryInformation(Request $request)
    {
        $this->validationUpdateSummaryInformation($request);
        $new_summaryInformation = EmployeeUserSummaryInformation::where('employee_user_id', Auth::user()->id)->first();
        if (!$new_summaryInformation) {
            $new_summaryInformation = new EmployeeUserSummaryInformation();
            $new_summaryInformation->employee_user_id = Auth::user()->id;
        }
        $new_summaryInformation->gender = $request->cv_si_gender;
        $new_summaryInformation->driving_licenses = json_encode($request->cv_si_driving_license);
        $new_summaryInformation->net_salary_expectation = $request->cv_si_net_salary_exp;
        $new_summaryInformation->nationality = json_encode($request->cv_si_nationality);
        $new_summaryInformation->military_status = $request->cv_si_military_status;

        if ($new_summaryInformation->save()) {
            $responseData = [
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $new_summaryInformation,
            ];
            return response()->json($responseData);
        } else {
            $responseData = [
                'message' => 'Kayıt edilirken bir sorun oluştu.',
                'data' => $new_summaryInformation,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateSummaryInformation($request)
    {
        $rules = [
            'cv_si_gender' => 'required|in:0,1',
            'cv_si_driving_license' => 'required',
            'cv_si_military_status' => 'required',
        ];

        $customMessages = [
            'cv_si_gender.required' => ':attribute alanı zorunludur.',
            'cv_si_driving_license.required' => ':attribute alanı zorunludur.',
            'cv_si_military_status.required' => ':attribute alanı zorunludur.',
        ];

        $customAttribute = [
            'cv_si_gender' => 'Cinsiyet',
            'cv_si_driving_license' => 'Sürücü Belgesi',
            'cv_si_military_status' => 'Askerlik Durumu',
        ];

        $this->validate($request, $rules, $customMessages, $customAttribute);
    }
}
