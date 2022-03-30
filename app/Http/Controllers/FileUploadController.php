<?php

namespace App\Http\Controllers;

use App\Models\EmployeeUser;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class FileUploadController extends Controller
{
    public function store(Request $request)
    {
        $rules = [
            'file' => 'required|mimes:pdf|max:2048'
        ];
        $customMessages = [
            'file.required' => ':attribute yüklemek zorunludur.',
            'file.mimes' => ':attribute pdf formatında olması zorunludur.',
            'file.max' => ':attribute en fazla 2048 kb boyutunda olmalıdır.',
        ];

        $customAttribute = [
            'file' => 'Dosya'
        ];

        $this->validate($request, $rules, $customMessages, $customAttribute);
        $name = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->store('public/files');


        $file = File::where('employee_user_id', Auth::guard('employee_user')->user()->id)->first();
        if ($file) {
            $file->name = $name;
            $file->path = $path;
            $file->save();
        } else {
            $save = new File;
            $save->employee_user_id = Auth::guard('employee_user')->user()->id;
            $save->name = $name;
            $save->path = $path;
            $save->save();
        }

        return response()->json([
            'status' => 'ok',
            'message' => 'Dosya başarıyla yüklendi',
            'data' => [
                'url' => route('file.download', Auth::guard('employee_user')->user()->id),
                'name' => $save ? $save->name : $file->name,
            ]
        ]);

    }

    public function download(EmployeeUser $employeeUser)
    {
        if (Auth::guard('employer_user') || Auth::guard('employee_user')->user()->id == $employeeUser->id) {
            $file = File::where('employee_user_id', $employeeUser->id)->first();
            $headers = array(
                'Content-Type: application/pdf',
            );

            if ($file->count() > 0) {
                return Storage::download($file->path, $file->name, $headers);
            } else {
                return response()->json(['message' => 'Dosya Bulunamadı.']);
            }
        }else{
            return redirect()->back();
        }
    }
}
