@extends('layouts.header.header_style')
@extends('layouts.auth')
@section('styles')
    <style>
        .card {
            transition: box-shadow .3s;
        }

        .card:hover {
            box-shadow: 0 0 11px rgba(33, 33, 33, .2);
        }

        .form-label {
            font-size: 0.8rem;
        }

        .form-control {
            size: 0.8rem;
        }

        .form-select {
            size: 0.5rem;
        }

    </style>
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <h5>{{$advertisement_count}} İş İlanı</h5>
            <div class="col-3  ">
                <form id="filterFormm" class="bg-secondary bg-opacity-10 p-2 rounded-3" action="">
                    <div class="d-flex justify-content-center mb-0">
                        <button type="submit" class="btn bg-light w-100 border btn-sm my-1 pt-1 me-2">Filtrele</button>
                        <button class="clearForm btn bg-light border w-100
                        btn-sm my-1
                        pt-1">Temizle
                        </button>
                    </div>
                    <div class="col-12 m-1">
                        <label for="filter_company_name" class="form-label">
                            Şirket Adı </label>
                        <input id="filter_company_name"
                               type="text"
                               name="cn"
                               class="form-control form-control-sm bg-white w-75"
                               value="{{@$f_company_name}}">
                    </div>
                    <div class="col-12 m-1">
                        <label for="filter_country" class="form-label text-md-end">
                            İl </label>
                        <select id="filter_country" name="c"
                                class="select2 form-select form-select-sm w-75"
                                aria-label="İl">
                            <option selected disabled value="-1">Seçiniz</option>
                            @foreach($country_list as $country)
                                <option value="{{$country['name']}}"
                                        {{@$f_country == $country['name'] ? 'selected' : ''}}>
                                    {{$country['name']}}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_sector" class="form-label text-md-end">--}}
                    {{--                            Sektör </label>--}}
                    {{--                        <select id="filter_sector" name="s[]"--}}
                    {{--                                class="select2 form-select form-select-sm w-75"--}}
                    {{--                                multiple--}}
                    {{--                                aria-label="Sektör">--}}
                    {{--                            @foreach($sector_list as $key => $sector)--}}
                    {{--                                <option value="{{$sector->title}}">{{$sector->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_sector" class="form-label text-md-end">
                            Sektör </label>
                        <input id="filter_sector" name="s"
                               class=" form-control bg-white form-control-sm w-75"
                               aria-label="Sektör" placeholder="Bilişim,Güvenlik,Üretim,Otomotiv"
                               value="{{@$f_sector}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_department" class="form-label text-md-end">--}}
                    {{--                            Departman </label>--}}
                    {{--                        <select id="filter_department" name="dep[]" class="select2 form-select--}}
                    {{--                    form-select-sm w-75" multiple aria-label="Departman">--}}
                    {{--                            @foreach($department_list as $key => $department)--}}
                    {{--                                <option value="{{$department->title}}">{{$department->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_department" class="form-label text-md-end">
                            Departman </label>
                        <input id="filter_department" name="dep"
                               class=" form-control bg-white form-control-sm w-75"
                               aria-label="Departman" placeholder="Akademik,AR-GE,Hukuk,Bilgi İşlem"
                               value="{{@$f_sector}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_way_of_working" class="form-label text-md-end">--}}
                    {{--                            Çalışma Şekli </label>--}}
                    {{--                        <select id="filter_way_of_working" name="wow[]" class="select2 form-select--}}
                    {{--                    form-select-sm w-75" multiple aria-label="Çalışma Şekli">--}}
                    {{--                            @foreach($way_of_working_list as $key => $way_of_working)--}}
                    {{--                                <option value="{{$way_of_working->title}}">{{$way_of_working->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_way_of_working" class="form-label text-md-end">
                            Çalışma Şekli </label>
                        <input id="filter_way_of_working" name="wow"
                               class=" form-control bg-white form-control-sm w-75"
                               placeholder="Sürekli,Dönemsel,Stajyer,Serbest Zamanlı,Yarı Zamanlı"
                               value="{{@$f_way_of_working}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_working_type" class="form-label text-md-end">--}}
                    {{--                            Çalışma Tipi </label>--}}
                    {{--                        <select id="filter_working_type" name="wt[]"--}}
                    {{--                                class="select2 form-select form-select-sm w-75" multiple--}}
                    {{--                                aria-label="Engelli">--}}
                    {{--                            @foreach($working_type_list as $key => $working_type)--}}
                    {{--                                <option value="{{$working_type->title}}">{{$working_type->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_working_type" class="form-label text-md-end">
                            Çalışma Tipi </label>
                        <input id="filter_working_type" name="wt"
                               class=" form-control bg-white form-control-sm w-75"
                               placeholder="İş Yerinde, Uzaktan/Remote, Hybrid"
                               value="{{@$f_working_type}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_position_level" class="form-label text-md-end">--}}
                    {{--                            Pozisyon Seviyesi </label>--}}
                    {{--                        <select id="filter_position_level" name="pl[]" class="select2 form-select--}}
                    {{--                    form-select-sm w-75" multiple aria-label="Pozisyon Seviyesi">--}}
                    {{--                            @foreach($position_level_list as $key => $position_level)--}}
                    {{--                                <option value="{{$position_level->title}}">{{$position_level->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_position_level" class="form-label text-md-end">
                            Pozisyon Seviyesi </label>
                        <input id="filter_position_level" name="pl"
                               class=" form-control bg-white form-control-sm w-75"
                               placeholder="Yazılım Gel. Uzm.,Mağaza Müdürü,Satış T."
                               value="{{@$f_position_level}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_education_level" class="form-label text-md-end">--}}
                    {{--                            Eğitim Seviyesi </label>--}}
                    {{--                        <select id="filter_education_level" name="el[]" class="select2 form-select--}}
                    {{--                    form-select-sm w-75" multiple aria-label="Eğitim Seviyesi">--}}
                    {{--                            @foreach($education_level_list as $key => $education_level)--}}
                    {{--                                <option value="{{$education_level->title}}">{{$education_level->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_education_level" class="form-label text-md-end">
                            Eğitim Seviyesi </label>
                        <input id="filter_education_level" name="el"
                               class=" form-control bg-white form-control-sm w-75"
                               placeholder="Doktora,Yüksek L.,Üni.,Lise"
                               value="{{@$f_education_level}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_experienced" class="form-label text-md-end">--}}
                    {{--                            Deneyim </label>--}}
                    {{--                        <select id="filter_experienced" name="e[]" class="select2 form-select--}}
                    {{--                    form-select-sm w-75" multiple aria-label="Deneyim">--}}
                    {{--                            @foreach($experienced_list as $key => $experienced)--}}
                    {{--                                <option value="{{$experienced->title}}">{{$experienced->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_experienced" class="form-label text-md-end">
                            Deneyim </label>
                        <input id="filter_experienced" name="e"
                               class=" form-control bg-white form-control-sm w-75"
                               placeholder="Deneyimli,Deneyimsiz"
                               value="{{@$f_experienced}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_disability" class="form-label text-md-end">--}}
                    {{--                            Engelli </label>--}}
                    {{--                        <select id="filter_disability" name="dis[]" class="select2 form-select--}}
                    {{--                    form-select-sm w-75"--}}
                    {{--                                aria-label="Engelli" multiple>--}}
                    {{--                            @foreach($disability_list as $key => $disability)--}}
                    {{--                                <option value="{{$disability->title}}">{{$disability->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_disability" class="form-label text-md-end">
                            Engel </label>
                        <input id="filter_disability" name="dis"
                               class=" form-control bg-white form-control-sm w-75"
                               placeholder="Engelli,Engelsiz"
                               value="{{@$f_disability}}">
                    </div>
                    {{--                    <div class="col-12 m-1">--}}
                    {{--                        <label for="filter_driving_license" class="form-label text-md-end">--}}
                    {{--                            Ehliyet </label>--}}
                    {{--                        <select id="filter_driving_license" name="dl[]" class="select2 form-select--}}
                    {{--                    form-select-sm w-75"--}}
                    {{--                                aria-label="Ehliyet" multiple>--}}
                    {{--                            @foreach($driving_licence_list as $key => $driving_licence)--}}
                    {{--                                <option value="{{$driving_licence->title}}">{{$driving_licence->title}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-12 m-1">
                        <label for="filter_driving_license" class="form-label text-md-end">
                            Ehliyet </label>
                        <input id="filter_driving_license" name="dl"
                               class=" form-control bg-white form-control-sm w-75"
                               placeholder="A1,A2,B,B1,C,C1..."
                               value="{{@$f_driving_license}}">
                    </div>
                    <div class="d-flex justify-content-center mb-0">
                        <button type="submit" class="btn bg-light w-100 border btn-sm my-1 pt-1 me-2">Filtrele</button>
                        <button class="clearForm btn bg-light border w-100
                        btn-sm my-1
                        pt-1">Temizle
                        </button>
                    </div>
                </form>
            </div>
            <div class="col-6">
                @foreach($data as $item)
                    <a href="{{route('detailAdvertisement',$item->id)}}">
                        <div class="card my-2 mx-1">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <div class="d-flex flex-column">
                                                    <span class="fs-4  fw-bold">
                                                        {{$item->title}}
                                                    </span>
                                            <span class="mx-1 fs-6">
                                                        {{$item->company_name}}
                                                    </span>
                                            <span class="mx-1 fst-italic text-muted" style="font-size: 14px">
                                                {{$item->country}} / {{$item->district}}
                                                    </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="col my-1">
                                        @foreach(json_decode($item->way_of_working,true) as $way_of_working)
                                            <span class="badge bg-light text-dark">
                                                {!!\App\Models\WayOfWorking::find($way_of_working)->title !!}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
                <div class="col-4 offset-4">{!! $data->links() !!}</div>
            </div>
            <div class="col-3"></div>
        </div>
    </div>
@endsection

@extends('layouts.footer.footer_script')
@section('scripts')
    <script>
        $(document).ready(function (){
           $('#filter_country').trigger('change');
        });
        $('#filter_country').on('change', function () {
            var url = "{{$district_list_url}}";
            var country = $(this).val();
            console.log()
            if (typeof country === 'null' || country === -1) {
                $.ajax({
                    url: url,
                    type: "POST",
                    data: {
                        country: country,
                    },
                    dataType: 'json',
                    success: function (response) {
                        $('#filter_district').html('<option disabled selected>Seçiniz</option>');
                        var districtList = response.data.districts;
                        var optionView = ``;
                        $.each(districtList, function (key, val) {
                            optionView += `<option value="${val}">${val}</option>`;
                        });
                        $('#filter_district').append(optionView);
                    },
                    error: function (response) {
                        showSuccessAlert(response, false);
                    },
                });
            }
        });
        $('.clearForm').on('click', function (e) {
            e.preventDefault();

            clearFormFilter($('#filterFormm'));
            var uri = window.location.toString();
            if (uri.indexOf("?") > 0) {
                var clean_uri = uri.substring(0, uri.indexOf("?"));
                window.history.replaceState({}, document.title, clean_uri);
            }
            $('#filter_country').trigger('change');
            window.location.reload(true);

        });

        function clearFormFilter(form) {
            $.each(form.find('input'), function (key, val) {
                if ($(val).attr('id') === 'new_ad_employer_user') {
                    return;
                }
                if ($(val).attr('type') === "number") {
                    $(val).val(30);
                } else {
                    $(val).val('');
                }
            });
            $.each(form.find('select'), function (key, val) {
                if ($(val).attr('multiple')) {
                    $(val).val(-1).trigger('change');
                }
                if ($(val).find('option') > 0) {
                    $(val).val('').trigger('change');
                }
            });
            $.each(form.find('textarea'), function (key, val) {
                $(val).text('');
            });
        }
    </script>
    </script>
@endsection