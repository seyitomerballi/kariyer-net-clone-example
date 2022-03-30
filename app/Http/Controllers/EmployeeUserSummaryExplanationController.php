<?php

namespace App\Http\Controllers;

use App\Models\EmployeeUserSummaryExplanation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeUserSummaryExplanationController extends Controller
{
    public function updateSummaryExplanation(Request $request)
    {
        $this->validationUpdateSummaryExplanation($request);
        $new_summaryExplanation = EmployeeUserSummaryExplanation::where('employee_user_id', Auth::user()->id)->first();
        if (!$new_summaryExplanation) {
            $new_summaryExplanation = new EmployeeUserSummaryExplanation();
            $new_summaryExplanation->employee_user_id = Auth::user()->id;
        }
        $new_summaryExplanation->desc = $request->cv_se_description;

        if ($new_summaryExplanation->save()) {
            $responseData = [
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $new_summaryExplanation,
            ];
            return response()->json($responseData);
        } else {
            $responseData = [
                'message' => 'Kayıt edilirken bir sorun oluştu.',
                'data' => $new_summaryExplanation,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateSummaryExplanation($request)
    {
        $rules = [
            'cv_se_description' => 'required',
        ];

        $customMessages = [
            'cv_se_description.required' => ':attribute alanı zorunludur.',
        ];

        $customAttribute = [
            'cv_se_description' => 'Özet Açıklama',
        ];

        $this->validate($request, $rules, $customMessages, $customAttribute);
    }
}
