<?php

namespace App\Http\Controllers;

use App\Models\AdvertisementAppeal;
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
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class AdvertisementController extends Controller
{
    public function allAdvertisement(Request $request)
    {

        $district_list_url = route('country_districts.getListByCountry');
        $country_list = Country::$country_list;
        $country_master_list = Country::$country_master_list;
        $sector_list = Sector::all();
        $department_list = Department::all();
        $working_type_list = WorkingType::all();
        $way_of_working_list = WayOfWorking::all();
        $position_level_list = PositionLevel::all();
        $education_level_list = EducationLevel::all();
        $experienced_list = Experienced::all();
        $disability_list = Disability::all();
        $driving_licence_list = DrivingLicense::all();


        $f_company_name = $request->get('cn');
        $f_country = $request->get('c');
        $f_district = $request->get('d');
        $f_sector = $request->get('s');
        $f_department = $request->get('dep');
        $f_way_of_working = $request->get('wow');
        $f_working_type = $request->get('wt');
        $f_position_level = $request->get('pl');
        $f_education_level = $request->get('el');
        $f_disability = $request->get('dis');
        $f_driving_license = $request->get('dl');
        $f_experienced = $request->get('e');
        $f_description = $request->get('des');
        $f_search = $request->get('search');
        $filter_data = [$f_company_name, $f_country, $f_district, $f_sector, $f_department, $f_way_of_working,
            $f_working_type, $f_position_level, $f_education_level, $f_disability, $f_driving_license, $f_experienced];
        $filter = [
            'prm_id' => 'null',
            'prm_employee_id' => "null",
            'prm_company_name' => "''",
            'prm_title' => "''",
            'prm_location' => "''",
            'prm_country' => "''",
            'prm_district' => "''",
            'prm_sector' => "''",
            'prm_department' => "''",
            'prm_way_of_working' => "''",
            'prm_period' => "null",
            'prm_working_type' => "''",
            'prm_position_level' => "''",
            'prm_education_level' => "''",
            'prm_disability' => "''",
            'prm_driving_license' => "''",
            'prm_experienced' => "''",
            'prm_featured' => "null",
            'prm_on_publication' => 1,
            'prm_description' => "''",
            'prm_search' => "''",
        ];
        if ($f_company_name != null ||
            $f_country != null ||
            $f_district != null ||
            $f_sector != null ||
            $f_department != null ||
            $f_way_of_working != null ||
            $f_working_type != null ||
            $f_position_level != null ||
            $f_education_level != null ||
            $f_disability != null ||
            $f_driving_license != null ||
            $f_experienced != null ||
            $f_description != null ||
            $f_search != null) {
            $filter = [
                'prm_id' => 'null',
                'prm_employee_id' => 'null',
                'prm_company_name' => "'" . $f_company_name . "'",
                'prm_title' => "''",
                'prm_location' => "''",
                'prm_country' => "'" . $f_country . "'",
                'prm_district' => "'" . $f_district . "'",
                'prm_sector' => "'" . $f_sector . "'",
                'prm_department' => "'" . $f_department . "'",
                'prm_way_of_working' => "'" . $f_way_of_working . "'",
                'prm_period' => 'null',
                'prm_working_type' => "'" . $f_working_type . "'",
                'prm_position_level' => "'" . $f_position_level . "'",
                'prm_education_level' => "'" . $f_education_level . "'",
                'prm_disability' => "'" . $f_disability . "'",
                'prm_driving_license' => "'" . $f_driving_license . "'",
                'prm_experienced' => "'" . $f_experienced . "'",
                'prm_featured' => 'null',
                'prm_on_publication' => 1,
                'prm_description' => "'" . $f_description . "'",
                'prm_search' => "'" . $f_search . "'",
            ];
        }

        $filters = implode(", ", $filter);
//        dd($filters);
        $data = DB::select(DB::raw("call AdvertisementSelectList(" . $filters . ")"));

        $datas = $this->arrayPaginator($data, $request);
        $advertisement_count = $datas->total();
        return view('is-ilanlari', [
            'data' => $datas,
            'advertisement_count' => $advertisement_count
        ], compact('disability_list',
            'country_list',
            'sector_list',
            'department_list',
            'district_list_url',
            'working_type_list',
            'way_of_working_list',
            'position_level_list',
            'education_level_list',
            'driving_licence_list',
            'experienced_list', 'filter_data','f_experienced',
            'f_driving_license', 'f_disability', 'f_education_level',
            'f_position_level', 'f_working_type', 'f_way_of_working',
            'f_department','f_sector','f_district','f_country','f_company_name'));
    }

    public function arrayPaginator($array, $request)
    {
        $page = $request->get('page', 1);
        $perPage = 10;
        $offset = ($page * $perPage) - $perPage;

        return new LengthAwarePaginator(array_slice($array, $offset, $perPage, true), count($array), $perPage, $page,
            ['path' => $request->url(), 'query' => $request->query()]);
    }

    public function detailAdvertisement(Advertisements $advertisement)
    {
        Carbon::setLocale('tr');
        $advertisementEU = EmployerUser::find($advertisement->employer_user_id)->first();
        $is_appeal = false;
        if (Auth::guard('employee_user')->user()) {
            $is_appeal = AdvertisementAppeal::where('employee_user_id', Auth::guard('employee_user')->user()->id)
                ->where('advertisement_id', $advertisement->id)->first();
        }

        $appealCount = AdvertisementAppeal::where('advertisement_id', $advertisement->id)->count();
        $lastDate = $advertisement->lastPublishedDateAttr;
        return view('detay', compact('advertisement', 'advertisementEU', 'is_appeal', 'appealCount', 'lastDate'));
    }

    public function updateAdvertisement(Request $request)
    {
        $this->validationUpdateAdvertisement($request);

        $advertisement = new Advertisements();
        $advertisement->employer_user_id = Auth::guard('employer_user')->user()->id;
        $advertisement->title = $request->new_ad_title;
        $advertisement->location = $request->new_ad_location;
        $advertisement->country = $request->new_ad_country;
        $advertisement->district = $request->new_ad_district;
        $advertisement->sector = json_encode($request->new_ad_sector);
        $advertisement->department = json_encode($request->new_ad_department);
        $advertisement->way_of_working = json_encode($request->new_ad_way_of_working);
        $advertisement->period = $request->new_ad_period;
        $advertisement->description = $request->new_ad_description;
        $advertisement->working_type = json_encode($request->new_ad_working_type);
        $advertisement->position_level = json_encode($request->new_ad_position_level);
        $advertisement->education_level = json_encode($request->new_ad_education_level);
        $advertisement->experienced = json_encode($request->new_ad_experienced);
        $advertisement->disability = json_encode($request->new_ad_disability);
        $advertisement->driving_license = json_encode($request->new_ad_driving_license);
        $advertisement->publication_date = Carbon::now();

        $advertisement->save();
        $data = [
            'result' => 'ok',
            'message' => '??lan ba??ar??yla yay??nland??.',
            'data' => $advertisement
        ];

        return response()->json($data);
    }

    public function validationUpdateAdvertisement($request)
    {
        $rules = [
            'new_ad_title' => 'required|string|max:255',
            'new_ad_location' => 'required|string|max:255',
            'new_ad_country' => 'required|not_in:0',
            'new_ad_district' => 'required|not_in:0',
            'new_ad_sector' => 'required|array|min:1',
            'new_ad_department' => 'required|array|not_in:0',
            'new_ad_way_of_working' => 'required|array|not_in:0',
            'new_ad_period' => 'required|integer|min:1|max:30',
            'new_ad_working_type' => 'required|array|not_in:0',
            'new_ad_position_level' => 'required|array|not_in:0',
            'new_ad_education_level' => 'required|array|not_in:0',
            'new_ad_experienced' => 'required|array|not_in:0',
            'new_ad_disability' => 'required|array|not_in:0',
            'new_ad_driving_license' => 'required|array|not_in:0',
            'new_ad_description' => 'required|max:20000',
        ];

        $customMessages = [
            'new_ad_title.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_title.max' => ':attribute alan?? max 255 karakter olabilir.',

            'new_ad_location.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_location.max' => ':attribute alan?? max 255 karakter olabilir.',

            'new_ad_country.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_country.not_in' => ':attribute alan?? se??ilmesi zorunludur.',

            'new_ad_district.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_district.not_in' => ':attribute alan?? se??ilmesi zorunludur.',

            'new_ad_sector.required' => ':attribute alan?? doldurulmas?? zorunludur.',

            'new_ad_department.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_department.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_way_of_working.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_way_of_working.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_period.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_period.integer' => ':attribute rakamlardan olu??abilir.',
            'new_ad_period.min' => ':attribute minimum 1 g??n olabilir.',
            'new_ad_period.max' => ':attribute maksimum 30 g??n olabilir.',

            'new_ad_working_type.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_working_type.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_position_level.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_position_level.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_education_level.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_education_level.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_experienced.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_experienced.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_disability.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_disability.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_driving_license.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_driving_license.array' => ':attribute en az bir se??enek se??ilmelidir',

            'new_ad_description.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'new_ad_description.max' => ':attribute en fazla 20000 karakter olabilir.',
        ];

        $customAttributes = [
            'new_ad_title' => 'Ba??l??k',
            'new_ad_location' => 'Konum',
            'new_ad_country' => '??l',
            'new_ad_district' => '??l??e',
            'new_ad_sector' => 'Sekt??r',
            'new_ad_department' => 'Departman',
            'new_ad_way_of_working' => '??al????ma ??ekli',
            'new_ad_period' => '??lan S??resi',
            'new_ad_working_type' => '??al????ma Tipi',
            'new_ad_position_level' => 'Pozisyon Seviyesi',
            'new_ad_education_level' => 'E??itim Seviyesi',
            'new_ad_experienced' => 'Deneyim',
            'new_ad_disability' => 'Engelli',
            'new_ad_driving_licence' => 'Ehliyet',
            'new_ad_description' => '??lan A????klamas??',
        ];

        $this->validate($request, $rules, $customMessages, $customAttributes);
    }

    public function getList()
    {
        $query = Advertisements::select('id', 'title', 'country', 'district', 'publication_date', 'on_publication')
            ->where('employer_user_id', Auth::guard('employer_user')->user()->id)
            ->get();
        $columns = [
            array('data' => 'no', 'name' => 'No'),
            array('data' => 'title', 'name' => 'Ba??l??k'),
            array('data' => 'country', 'name' => '??l'),
            array('data' => 'district', 'name' => '??l??e'),
            array('data' => 'publication_date', 'name' => 'Yay??nlanma Tarihi'),
            array('data' => 'on_publication', 'name' => 'Yay??n Durumu'),
            array('data' => 'process', 'name' => '????lem'),
        ];
        $data = [];
        $i = 1;
        setlocale(LC_TIME, 'tr_TR.utf8');
        foreach ($query as $item) {
            $processHtml = '<div class="dropdown">
                              <button class="btn btn-sm btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ????lem
                              </button>
                              <ul class="dropdown-menu dropdown-menu-dark">
                                <li><button class="dropdown-item" edit-button edit-button-url= "' . route('employerUser.advertisements.editAdvertisement', ['advertisement' => $item->id]) . '" modal-target="#editAdvertisement">G??r??nt??le/D??zenle</button></li>
                                <li><a class="dropdown-item" href="javascript:void(0);" update-button update-button-url= "' . route('employerUser.advertisements.updateOnPublication', ['advertisement' => $item->id]) . '">Yay??n Durumunu De??i??tir</a></li>
                                <li><a class="dropdown-item" target="_blank" href="' . route('employerUser.appeal_advertisements.viewUserAppealedUser', ['advertisement' => $item->id]) . '">Ba??vuranlar?? G??r??nt??le</a></li>
                              </ul>
                            </div>';
            $data[] = [
                'no' => $i,
                'title' => $item->title,
                'country' => $item->country,
                'district' => $item->district,
                'publication_date' => $item->publicationDateAttr,
                'on_publication' => $item->onPublicationAttr,
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

    public function editOnPublication(Request $request, Advertisements $advertisement)
    {
        return redirect('employerUser.advertisements.updateOnPublication', ['advertisement' => $advertisement]);
    }

    public function updateOnPublication(Request $request, Advertisements $advertisement)
    {
        $updateAdvertisement = Advertisements::find($advertisement->id);
        $updateAdvertisement->on_publication = !$updateAdvertisement->on_publication;
        $updateAdvertisement->save();

        $responseData = [
            'message' => 'Ba??ar??yla ger??ekle??ti.',
            'data' => $updateAdvertisement
        ];
        return response()->json($responseData);
    }

    public function editAdvertisement(Advertisements $advertisement)
    {
        $editData = Advertisements::find($advertisement->id);

        $jsonData = [
            'updateEditAdvertisement' => route('employerUser.advertisements.updateEditAdvertisement', $advertisement),
            'data' => [
                'title' => $editData->title,
                'location' => $editData->location,
                'country' => $editData->country,
                'district' => $editData->district,
                'sector' => json_decode($editData->sector),
                'department' => json_decode($editData->department),
                'way_of_working' => json_decode($editData->way_of_working),
                'period' => json_decode($editData->period),
                'working_type' => json_decode($editData->working_type),
                'position_level' => json_decode($editData->position_level),
                'education_level' => json_decode($editData->education_level),
                'disability' => json_decode($editData->disability),
                'driving_license' => json_decode($editData->driving_license),
                'experienced' => json_decode($editData->experienced),
                'description' => $editData->description,
            ]
        ];

        return response()->json($jsonData);
    }

    public function updateEditAdvertisement(Request $request, Advertisements $advertisement)
    {
        $this->validationUpdateEditAdvertisement($request);

        $advertisement = Advertisements::find($advertisement->id);
        $advertisement->title = $request->update_ad_title;
        $advertisement->location = $request->update_ad_location;
        $advertisement->country = $request->update_ad_country;
        $advertisement->district = $request->update_ad_district;
        $advertisement->sector = json_encode($request->update_ad_sector);
        $advertisement->department = json_encode($request->update_ad_department);
        $advertisement->way_of_working = json_encode($request->update_ad_way_of_working);
        $advertisement->period = $request->update_ad_period;
        $advertisement->description = $request->update_ad_description;
        $advertisement->working_type = json_encode($request->update_ad_working_type);
        $advertisement->position_level = json_encode($request->update_ad_position_level);
        $advertisement->education_level = json_encode($request->update_ad_education_level);
        $advertisement->experienced = json_encode($request->update_ad_experienced);
        $advertisement->disability = json_encode($request->update_ad_disability);
        $advertisement->driving_license = json_encode($request->update_ad_driving_license);

        $advertisement->save();
        $data = [
            'result' => 'ok',
            'message' => '??lan ba??ar??yla g??ncellendi.',
            'data' => $advertisement
        ];

        return response()->json($data);
    }

    public function validationUpdateEditAdvertisement($request)
    {
        $rules = [
            'update_ad_title' => 'required|string|max:255',
            'update_ad_location' => 'required|string|max:255',
            'update_ad_country' => 'required|not_in:0',
            'update_ad_district' => 'required|not_in:0',
            'update_ad_sector' => 'required|array|min:1',
            'update_ad_department' => 'required|array|not_in:0',
            'update_ad_way_of_working' => 'required|array|not_in:0',
            'update_ad_period' => 'required|integer|min:1|max:30',
            'update_ad_working_type' => 'required|array|not_in:0',
            'update_ad_position_level' => 'required|array|not_in:0',
            'update_ad_education_level' => 'required|array|not_in:0',
            'update_ad_experienced' => 'required|array|not_in:0',
            'update_ad_disability' => 'required|array|not_in:0',
            'update_ad_driving_license' => 'required|array|not_in:0',
            'update_ad_description' => 'required|max:20000',
        ];

        $customMessages = [
            'update_ad_title.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_title.max' => ':attribute alan?? max 255 karakter olabilir.',

            'update_ad_location.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_location.max' => ':attribute alan?? max 255 karakter olabilir.',

            'update_ad_country.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_country.not_in' => ':attribute alan?? se??ilmesi zorunludur.',

            'update_ad_district.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_district.not_in' => ':attribute alan?? se??ilmesi zorunludur.',

            'update_ad_sector.required' => ':attribute alan?? doldurulmas?? zorunludur.',

            'update_ad_department.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_department.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_way_of_working.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_way_of_working.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_period.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_period.integer' => ':attribute rakamlardan olu??abilir.',
            'update_ad_period.min' => ':attribute minimum 1 g??n olabilir.',
            'update_ad_period.max' => ':attribute maksimum 30 g??n olabilir.',

            'update_ad_working_type.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_working_type.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_position_level.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_position_level.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_education_level.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_education_level.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_experienced.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_experienced.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_disability.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_disability.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_driving_license.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_driving_license.array' => ':attribute en az bir se??enek se??ilmelidir',

            'update_ad_description.required' => ':attribute alan?? doldurulmas?? zorunludur.',
            'update_ad_description.max' => ':attribute en fazla 20000 karakter olabilir.',
        ];

        $customAttributes = [
            'update_ad_title' => 'Ba??l??k',
            'update_ad_location' => 'Konum',
            'update_ad_country' => '??l',
            'update_ad_district' => '??l??e',
            'update_ad_sector' => 'Sekt??r',
            'update_ad_department' => 'Departman',
            'update_ad_way_of_working' => '??al????ma ??ekli',
            'update_ad_period' => '??lan S??resi',
            'update_ad_working_type' => '??al????ma Tipi',
            'update_ad_position_level' => 'Pozisyon Seviyesi',
            'update_ad_education_level' => 'E??itim Seviyesi',
            'update_ad_experienced' => 'Deneyim',
            'update_ad_disability' => 'Engelli',
            'update_ad_driving_licence' => 'Ehliyet',
            'update_ad_description' => '??lan A????klamas??',
        ];

        $this->validate($request, $rules, $customMessages, $customAttributes);
    }
}
