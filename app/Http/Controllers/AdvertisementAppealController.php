<?php

namespace App\Http\Controllers;

use App\Models\AdvertisementAppeal;
use App\Models\Advertisements;
use App\Models\EmployeeUserContactInformation;
use App\Models\EmployeeUserEducationInformation;
use App\Models\EmployeeUserForeignLanguage;
use App\Models\EmployeeUserSummaryExplanation;
use App\Models\EmployeeUserSummaryInformation;
use App\Models\EmployeeUserWorkExperience;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class AdvertisementAppealController extends Controller
{
    public function createAppeal(Advertisements $advertisement)
    {
        if (Auth::guard('employee_user')->check()) {
            $currentUser = Auth::guard('employee_user')->user();

            $has_appeal = AdvertisementAppeal::where('employee_user_id', $currentUser->id)->where('advertisement_id',
                $advertisement->id);

            if (!$has_appeal->first()) {
                if (
                    EmployeeUserContactInformation::where('employee_user_id', $currentUser->id)->first() &&
                    EmployeeUserSummaryInformation::where('employee_user_id', $currentUser->id)->first() &&
                    EmployeeUserSummaryExplanation::where('employee_user_id', $currentUser->id)->first() &&
                    EmployeeUserWorkExperience::where('employee_user_id', $currentUser->id)->get()->count() > 0 &&
                    EmployeeUserEducationInformation::where('employee_user_id', $currentUser->id)->get()->count() > 0 &&
                    EmployeeUserForeignLanguage::where('employee_user_id', $currentUser->id)->get()->count() > 0
                ) {

                    $newAppealAdvertisement = new AdvertisementAppeal();
                    $newAppealAdvertisement->advertisement_id = $advertisement->id;
                    $newAppealAdvertisement->employee_user_id = $currentUser->id;
                    $newAppealAdvertisement->appeal_date = Carbon::now();
                    $newAppealAdvertisement->save();

                    return response()->json(['result' => 'ok', 'message' => 'Başvurunuz Alındı.']);
                } else {
                    return response()->json(['result' => 'fail', 'message' => 'Özgeçmişiniz güncel değil. Lütfen Profil kısmından özgeçmişiniz için zorunlu alanları ekleyiniz.']);
                }
            } else {
                return response()->json(['result' => 'fail', 'message' => 'Zaten bu başvuruya önceden başvurmuşsunuz']);
            }
        } else {
            return response()->json(['result' => 'fail', 'message' => 'Giriş yapmanız gerekmektedir.'], 200);
        }
    }

    public function getListByEmployee()
    {
        $query = AdvertisementAppeal::query()->with(['advertisement'])
            ->where('employee_user_id', Auth::guard('employee_user')->user()->id)
            ->get();

        $columns = [
            array('data' => 'advertisement_title', 'name' => 'İlan Başlığı'),
            array('data' => 'advertisement_country', 'name' => 'İlan İli'),
            array('data' => 'advertisement_district', 'name' => 'İlan İlçesi'),
            array('data' => 'advertisement_publication_date', 'name' => 'İlan Yayınlanma Tarihi'),
            array('data' => 'appeal_date', 'name' => 'Başvurduğum Tarih'),
            array('data' => 'process', 'name' => 'İşlem'),
        ];
        $data = [];
        $i = 1;

        foreach ($query as $item) {
            $processHtml = '<div class="dropdown">
                              <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                İşlem
                              </button>
                              <ul class="dropdown-menu dropdown-menu-dark">
                                <li><button class="dropdown-item" edit-button edit-button-url= "' . route('employerUser.advertisements.editAdvertisement', ['advertisement' => $item->id]) . '" modal-target="#editAdvertisement">Görüntüle/Düzenle</button></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" update-button update-button-url= "' . route('employerUser.advertisements.updateOnPublication', ['advertisement' => $item->id]) . '">Yayın Durumunu Değiştir</a></li>
                              </ul>
                            </div>';
            $data[] = [
                'no' => $i,
                'advertisement_title' => $item->advertisement->title,
                'advertisement_country' => $item->advertisement->country,
                'advertisement_district' => $item->advertisement->district,
                'advertisement_publication_date' => $item->getPublicationDateAttrAttribute($item->advertisement->publication_date),
                'appeal_date' => $item->appealDateAttr,
                'process' => $processHtml
            ];
            $i++;
        }
        $json = [
            'data' => $data,
            'columns' => $columns
        ];
        return response()->json($json);
    }

    public function viewUserAppealedUser(Advertisements $advertisement)
    {

        $dataTableRoute = route('employerUser.appeal_advertisements.getListByAdvertisement', ['advertisement' => $advertisement->id]);

        return view('employer-user-partials.employer-user-appealed-users', compact('dataTableRoute'));
    }

    public function getListByAdvertisement(Advertisements $advertisement)
    {
        $query = AdvertisementAppeal::query()->with(['employee_user'])
            ->where('advertisement_id', $advertisement->id)
            ->get();

        $columns = [
            array('data' => 'no', 'name' => 'No'),
            array('data' => 'employee_user_name', 'name' => 'Başvuran Adı'),
            array('data' => 'employee_user_surname', 'name' => 'Başvuran Soyadı'),
            array('data' => 'employee_user_email', 'name' => 'Başvuran E-posta'),
            array('data' => 'employee_user_phone_number', 'name' => 'Başvuran Telefon No'),
            array('data' => 'process', 'name' => 'İşlem'),
        ];
        $data = [];
        $i = 1;

        foreach ($query as $item) {
            $processHtml = '<div class="dropdown">
                              <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Özgeçmiş
                              </button>
                              <ul class="dropdown-menu dropdown-menu-dark">
                                <li><a class="dropdown-item" target="_blank" href="' . route('previewCv', $item->employee_user->id) . '">Görüntüle</a></li>
                              </ul>
                            </div>';
            $data[] = [
                'no' => $i,
                'employee_user_name' => $item->employee_user->name,
                'employee_user_surname' => $item->employee_user->surname,
                'employee_user_email' => $item->employee_user->email,
                'employee_user_phone_number' => $item->employee_user->phone_number,
                'process' => $processHtml
            ];
            $i++;
        }
        $json = [
            'data' => $data,
            'columns' => $columns
        ];
        return response()->json($json);
    }
}
