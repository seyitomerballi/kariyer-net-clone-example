@extends('layouts.header.header_style')
@extends('layouts.auth')
@section('styles')

@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-7">
                <div class="card p-3 d-flex justify-content-between">
                    <div class="row">
                        <div class="col-12 d-flex justify-content-between">
                            <div class="d-flex flex-column ">
                        <span class="fs-4  fw-bold">
                            {{$advertisement->title}}
                        </span>
                                <span class="mx-1 fs-4">
                            {{$advertisement->employer_user->name}}
                        </span>
                                <span class="mx-1 fst-italic text-muted" style="font-size: 14px">
                            {{$advertisement->country}} / {{$advertisement->district}}
                        </span>
                            </div>
                            <div class="col col-3">
                                <div class="row mt-1">
                                    <div class="text-center">
                                        @if(!Auth::guard('employer_user')->user())
                                            @if(!$is_appeal)
                                                <a id="appealAdvertisement"
                                                   data-action="{{route('appeal_advertisements.createAppeal',$advertisement->id)}}"
                                                   class="btn btn-success">Başvuru
                                                </a>
                                            @else
                                                <a href="javascript:void(0)" class="btn btn-danger disabled">Başvuru
                                                    Yapıldı</a>
                                            @endif
                                        @endif
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="text-center">
                                        <div class="badge bg-info">
                                            son {{$lastDate}} gün
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-between mt-3">
                            <div class="d-flex flex-column mx-2">
                                <h6>Sektör</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->sector,true) as $sector)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\Sector::find($sector)->id !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex flex-column mx-2">
                                <h6>Departman</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->department,true) as $department)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\Department::find($department)->title !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex flex-column mx-2">
                                <h6 class="text-dark">Çalışma Şekli</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->way_of_working,true) as $way_of_working)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\WayOfWorking::find($way_of_working)->title !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="d-flex flex-column mx-2">
                                <h6 class="text-dark">Başvuran Sayısı</h6>
                                <div class="my-1">
                                        <span class="badge bg-light text-dark mt-1">
                                                {{ $appealCount }}
                                            </span>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="card p-3 mt-3">
                    <h4>İlan Açıklaması</h4>
                    <hr class="m-0">
                    <div class="mt-3">
                        {!! $advertisement->description !!}
                    </div>
                </div>
                <div class="card p-3 mt-3">
                    <h4> Aday Kriterleri </h4>
                    <hr class="m-0">
                    <div class="col col-12">
                        <div class="d-flex flex-column justify-content-between mt-3">
                            <div class="mt-2">
                                <h6 class="bold">Çalışma Tipi</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->working_type,true) as $working_type)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\WorkingType::find($working_type)->title !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="bold">Pozisyon Seviyesi</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->position_level,true) as $position_level)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\PositionLevel::find($position_level)->title !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="bold">Eğitim Seviyesi</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->education_level,true) as $education_level)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\EducationLevel::find($education_level)->title !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="bold">Tecrübe</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->experienced,true) as $experienced)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\Experienced::find($experienced)->title !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="bold" class="">Engel Seviyesi</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->disability,true) as $disability)
                                        <span class="badge bg-light text-dark mt-1">
                                                {!!\App\Models\Disability::find($disability)->title !!}
                                            </span>
                                    @endforeach
                                </div>
                            </div>
                            <div class="mt-2">
                                <h6 class="bold">Ehliyet</h6>
                                <div class="col my-1">
                                    @foreach(json_decode($advertisement->driving_license,true) as $driving_license)
                                        <span class="badge bg-light text-dark mt-1">
                                            {!!\App\Models\DrivingLicense::find($driving_license)->title !!}
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-4 offset-1">
                <div class="card">
                    <div class="d-flex flex-column justify-content-between p-3">
                        <span class="fs-4  fw-bold">
                            Şirket Adı: {{$advertisementEU->company_name}}
                        </span>
                        <span class="mx-1 fs-5">
                            İrtibat: {{$advertisementEU->phone_number}}
                        </span>
                        <span class="mx-1 fst-italic text-muted" style="font-size: 14px">
                            Lokasyon: {{$advertisement->country}} / {{$advertisement->district}}
                        </span>
                        <hr class="mt-1 ">
                        @if($advertisementEU->description)
                            <h3>Hakkında</h3>
                            <p class="ms-1">
                                {{$advertisementEU->description}}
                            </p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.footer.footer_script')
@section('scripts')
    <script>
        $('#appealAdvertisement').on('click', function (e) {
            e.preventDefault();
            var url = $(this).attr('data-action');
            $.ajax({
                url: url,
                type: "GET",
                dataType: 'json',
                success: function (response) {
                    if (response.result == 'ok') {
                        showSuccessAlertWithReload(response.message);
                    } else if (response.result == 'fail') {
                        showSuccessAlert(response.message, false);
                    }
                },
                error: function (response) {
                    showSuccessAlertWithReload('Giriş yapmanız gerekmektedir.',false);
                },
            });
        });
    </script>
@endsection