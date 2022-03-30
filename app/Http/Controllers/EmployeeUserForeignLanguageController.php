<?php

namespace App\Http\Controllers;

use App\Models\EmployeeUserForeignLanguage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeUserForeignLanguageController extends Controller
{
    public function updateForeignLanguage(Request $request)
    {
        $this->validationUpdateForeignLanguage($request);

        $new_foreignLanguage = new EmployeeUserForeignLanguage();
        $new_foreignLanguage->employee_user_id = Auth::user()->id;
        $new_foreignLanguage->language = $request->cv_fl_language;
        $new_foreignLanguage->level = $request->cv_fl_level;
        $new_foreignLanguage->native = $request->cv_fl_native ?? 0;

        if ($new_foreignLanguage->save()) {
            $responseData = [
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $new_foreignLanguage,
            ];
            return response()->json($responseData);
        } else {
            $responseData = [
                'message' => 'Kayıt edilirken bir sorun oluştu.',
                'data' => $new_foreignLanguage,
            ];
            return response()->json($responseData);
        }
    }

    public function validationUpdateForeignLanguage($request)
    {
        $rules = [
            'cv_fl_language' => 'required|not_in:0',
            'cv_fl_level' => 'required|not_in:0',
        ];

        $customMessages = [
            'cv_fl_language.required' => ':attribute alanı zorunludur.',
            'cv_fl_language.not_in' => ':attribute alanı zorunludur.',
            'cv_fl_level.required' => ':attribute alanı zorunludur.',
            'cv_fl_level.not_in' => ':attribute alanı zorunludur.',
        ];

        $customAttribute = [
            'cv_fl_language' => 'Dil',
            'cv_fl_level' => 'Seviye',
        ];
        $this->validate($request, $rules, $customMessages, $customAttribute);
    }

    public function deleteForeignLanguage(EmployeeUserForeignLanguage $foreignLanguage)
    {
        if ($foreignLanguage->delete()) {
            $responseData = [
                'result' => 'ok',
                'message' => 'Başarıyla Kaydedildi.',
                'data' => $foreignLanguage,
            ];
            return response()->json($responseData);
        }
        $responseData = [
            'result' => 'fail',
            'message' => 'Kayıt silinirken bir sorun oluştu.',
            'data' => $foreignLanguage,
        ];
        return response()->json($responseData);
    }
}
