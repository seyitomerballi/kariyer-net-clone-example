<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    public function getList()
    {
        $country_list = Country::$country_list;
        $data = [
            'result' => 'ok',
            'message' => 'Başarıyla gerçekleşti',
            'countries' => $country_list,
        ];
        return response()->json(['data' => $data]);
    }

    public function getListDistrictByCountry(Request $request)
    {
        $country = $request->country;
        if ($country) {
            $district_list = Country::$country_list[$country]['districts'];
            $data = [
                'result' => 'ok',
                'message' => 'Başarıyla gerçekleşti',
                'districts' => $district_list,
            ];
            return response()->json(['data' => $data]);
        }
    }
}
