<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>İş Bul</title>
    @include('layouts.header.header_script')
    @include('layouts.header.header_style')
    <style>
        .row-main {
        }

        .cv-title {
            color: #cfe2ff;
            /*-webkit-text-stroke: 2px #cfe2ff;*/
            text-shadow: 0 0 3px #000000;
            -webkit-text-fill-color: white; /* Will override color (regardless of order) */
            -webkit-text-stroke-width: 1px;
            -webkit-text-stroke-color: #cfe2ff;
            font-family: 'Nunito', sans-serif;
        }

        .text-muted {
            color: #000102 !important;
            text-shadow: 0 1px 3px #e2e2e2;
        }
    </style>
</head>
<body>
<main class="py-5">
    <div class="container">
        <div class="row p-5 rounded bg-primary bg-opacity-25">
            @if($userContactInformation)
                <div class="row px-5">
                    <h3 class="fst-italic bold cv-title">İletişim Bilgileri</h3>
                    <hr>
                    <div class="row px-5">
                        <div class="col-10">
                            <table class="table table-sm table-borderless">
                                <tr>
                                    <th scope="row" width="300px">İsim :</th>
                                    <td>{{$userContactInformation->name}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="300px">Soyisim :</th>
                                    <td>{{$userContactInformation->surname}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="300px">Email :</th>
                                    <td>{{$userContactInformation->email}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="300px">Telefon No :</th>
                                    <td>{{$userContactInformation->phone_number}}</td>
                                </tr>
                                @if($userContactInformation->day_of_birth)
                                    <tr>
                                        <th scope="row" width="300px">Doğum Tarihi :</th>
                                        <td>{{$userContactInformation->day_of_birth}}</td>
                                    </tr>
                                @endif
                                @if($userContactInformation->phon_number_alternative)
                                    <tr>
                                        <th scope="row" width="300px">Alternatif Telefon No :</th>
                                        <td>{{$userContactInformation->phon_number_alternative}}</td>
                                    </tr>
                                @endif
                                @if($userContactInformation->country)
                                    <tr>
                                        <th scope="row" width="300px">Şehir :</th>
                                        <td>{{$userContactInformation->country}}</td>
                                    </tr>
                                @endif
                                @if($userContactInformation->web_page)
                                    <tr>
                                        <th scope="row" width="300px">Web Sayfa :</th>
                                        <td>{{$userContactInformation->web_page}}</td>
                                    </tr>
                                @endif
                                @if($userContactInformation->degree)
                                    <tr>
                                        <th scope="row" width="300px">Ünvan :</th>
                                        <td>{{$userContactInformation->degree}}</td>
                                    </tr>
                                @endif
                            </table>
                        </div>
                        <div class="col-2">
                            <div class="imagePreview" style="background-size: 100%;background-size: contain;
background-repeat: no-repeat;background: url({{@Storage::url($userContactInformation->image_path)}}">
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            @if($userSummaryInformation)
                <div class="row px-5">
                    <h3 class="fst-italic bold cv-title">Özet Bilgiler</h3>
                    <hr>
                    <div class="row px-5">
                        <div class="col-12">
                            <table class="table table-sm table-borderless table-responsive">
                                <tr>
                                    <th scope="row" width="300px" width="300px">Cinsiyet :</th>
                                    <td>{{$userSummaryInformation->gender == 0 ? 'Erkek' : 'Kadın'}}</td>
                                </tr>
                                <tr>
                                    <th scope="row" width="300px">Askerlik Durumu:</th>
                                    <td>{{\App\Models\EmployeeUser::$military_status_list[$userSummaryInformation->military_status]}}</td>
                                </tr>
                                @if($userSummaryInformation->net_salary_expectation)
                                    <tr>
                                        <th scope="row" width="300px">Net Maaş Beklentisi :</th>
                                        <td>{{$userSummaryInformation->net_salary_expectation}}</td>
                                    </tr>
                                @endif
                                @if($userSummaryInformation->nationality)
                                    <tr>
                                        <th scope="row" width="300px">Uyruk :</th>
                                        <td>
                                            @foreach(json_decode($userSummaryInformation->nationality) as $nationality)
                                                <span class="ms-1">{{$nationality}}</span>
                                                @if(!($loop->last))
                                                    -
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endif
                                <tr>
                                    <th scope="row" width="300px">Sürücü Belgesi :</th>
                                    <td>
                                        @foreach(json_decode($userSummaryInformation->driving_licenses) as $driving_license)
                                            <span class="ms-1">{{\App\Models\DrivingLicense::find($driving_license)
                                        ->title}}</span>
                                            @if(!($loop->last))
                                                -
                                            @endif
                                        @endforeach
                                    </td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
            @if($userSummaryExplanation)
                <div class="row px-5">
                    <h3 class="fst-italic bold cv-title">Özet Açıklama</h3>
                    <hr>
                    <div class="row px-5">
                        <div class="col-12">
                            {!! $userSummaryExplanation->desc !!}
                        </div>
                    </div>
                </div>
            @endif
            @if($userWorkExperience->count() > 0)
                <div class="row px-5">
                    <h3 class="fst-italic bold cv-title">İş Deneyimleri</h3>
                    <hr>
                    <div class="row px-5">
                        @foreach($userWorkExperience as $work_experience)
                            <div class="card bg-primary bg-opacity-10 border  border-3 mb-3">
                                <div class="row m-2">
                                    <div class="col-12">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Pozisyon</span>
                                                    <div style="font-size: 1rem">{{$work_experience->position}}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="me-3">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Firma Adı</span>
                                                    <div style="font-size: 1rem">{{$work_experience->company_name}}</div>
                                                </div>
                                                <div class="me-3">
                                                    @if($work_experience->city)
                                                        <span class="text-muted fst-italic" style="font-size: 0.9rem">Şehir</span>
                                                        <div style="font-size: 1rem">{{$work_experience->city}}</div>
                                                    @endif
                                                </div>
                                                <div class="me-3">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Firma Sektörü</span>
                                                    <div style="font-size: 1rem">{{\App\Models\EmployeeUserWorkExperience::$company_sector_list[$work_experience->company_sector]}}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="me-3">
                                    <span class="text-muted fst-italic"
                                          style="font-size: 0.9rem">Başlangıç Tarihi</span>
                                                    <div style="font-size: 1rem">{{ \Illuminate\Support\Carbon::parse($work_experience->start_date)->format('m.Y')}}</div>
                                                </div>
                                                <div class="me-3">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Bitiş Tarihi</span>
                                                    @if($work_experience->still_working == 1)
                                                        <div style="font-size: 1rem">Hala Çalışıyor</div>
                                                    @else
                                                        <div style="font-size: 1rem">{{ \Illuminate\Support\Carbon::parse
                                        (@$work_experience->end_date)->format('m.Y')}}</div>
                                                    @endif
                                                </div>
                                                <div class="me-3">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Çalışma Tipi</span>
                                                    <div style="font-size: 1rem">{{\App\Models\EmployeeUserWorkExperience::$working_type_list[$work_experience->working_type]}}</div>
                                                </div>
                                                <div class="me-3">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">İş Alanı</span>
                                                    <div style="font-size: 1rem">{{\App\Models\EmployeeUserWorkExperience::$business_area_list[$work_experience->business_area]}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <span class="text-muted fst-italic" style="font-size: 0.9rem">İş Tanımı</span>
                                        <div class="row d-flex justify-content-between  border border-2
                                         rounded-3 card-body small"
                                             style="font-size: 0.8rem">
                                            {!! $work_experience->desc !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($userEducationInformation->count() > 0)
                <div class="row px-5">
                    <h3 class="fst-italic bold cv-title">Eğitim Bilgileri</h3>
                    <hr>
                    <div class="row px-5">
                        @foreach($userEducationInformation as $education_information)
                            <div class="card bg-primary bg-opacity-10 border  border-3 mb-3">
                                <div class="row m-2">
                                    <div class="col-2 d-flex justify-content-center align-self-center">
                                        <h3>{{\App\Models\EmployeeUserEducationInformation::$education_status_list
                                        [$education_information->education_status]}}</h3>
                                    </div>
                                    <div class="col-10">
                                        <div class="col-9">
                                            <div class="row">
                                                <div class="col-4">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Üniversite</span>
                                                    <div style="font-size: 1rem">{{$education_information->university}}</div>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Fakülte</span>
                                                    <div style="font-size: 1rem">{{$education_information->faculty}}</div>
                                                </div>
                                                <div class="col-4">
                                                    <span class="text-muted fst-italic"
                                                          style="font-size: 0.9rem">Bölüm</span>
                                                    <div style="font-size: 1rem">{{$education_information->department}}</div>
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-start">
                                                <div class="me-3">
                                    <span class="text-muted fst-italic"
                                          style="font-size: 0.9rem">Başlangıç Tarihi</span>
                                                    <div style="font-size: 1rem">{{ \Illuminate\Support\Carbon::parse($education_information->start_date)->format('m.Y')}}</div>
                                                </div>
                                                <div class="me-3">
                                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Bitiş Tarihi</span>
                                                    @if($education_information->continues == 1)
                                                        <div style="font-size: 1rem">Devam Ediyor</div>
                                                    @elseif($education_information->leave == 1)
                                                        <div style="font-size: 1rem">Terk</div>
                                                    @else
                                                        <div style="font-size: 1rem">{{ \Illuminate\Support\Carbon::parse(@$education_information->end_date)->format('m.Y')}}</div>
                                                    @endif
                                                </div>
                                                <div class="me-3">
                                                    <span class="text-muted fst-italic"
                                                          style="font-size: 0.9rem">Şehir</span>
                                                    <div style="font-size: 1rem">{{$education_information->country}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if($education_information->description)
                                        <div class="col-12">
                                            <div class="d-flex justify-content-center">
                                                <span class="text-muted fst-italic align-middle"
                                                      style="font-size: 0.9rem">Açıklama</span>
                                            </div>
                                            <div class="row d-flex justify-content-between card-body rounded-3
                                            
                                            border border-2 m-2"
                                                 style="font-size: 0.8rem">
                                                {!! $education_information->description !!}
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
            @if($userForeignLanguage->count() > 0)
                <div class="row px-5">
                    <h3 class="fst-italic bold cv-title">Yabancı Dil</h3>
                    <hr>
                    <div class="row px-5">
                        @foreach($userForeignLanguage as $foreign_language)
                            <div class="card bg-primary bg-opacity-10 border  border-3 mb-3">
                                <div class="row m-2">
                                    <div class="col-12">
                                        <div class="row">
                                            <div class="col-4">
                                                <span class="text-muted fst-italic" style="font-size: 0.9rem">Dil</span>
                                                <div style="font-size: 1rem">
                                                    {{\App\Models\EmployeeUserForeignLanguage::$languages_list[$foreign_language->language]}}
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <span class="text-muted fst-italic"
                                                      style="font-size: 0.9rem">Seviye</span>
                                                <div style="font-size: 1rem">
                                                    {{\App\Models\EmployeeUserForeignLanguage::$language_level_list[$foreign_language->level]}}
                                                    <span class="fst-italic">{{$foreign_language->native == 1 ? '(Ana Dil)' :
                                    ''}}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            @endif
        </div>
    </div>
</main>
<script src="{{ asset('js/app.js') }}"></script>
@include('layouts.footer.footer_script')
</body>
</html>