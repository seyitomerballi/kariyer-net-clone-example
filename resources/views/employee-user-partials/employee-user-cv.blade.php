<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-eu-contact-tab" data-bs-toggle="tab"
                data-bs-target="#nav-eu-contact" type="button" role="tab"
                aria-controls="nav-eu-contact" aria-selected="true">İletişim Bilgileri
        </button>
        <button class="nav-link" id="nav-eu-summary-information-tab" data-bs-toggle="tab"
                data-bs-target="#nav-eu-summary-information" type="button" role="tab"
                aria-controls="nav-eu-summary-information" aria-selected="false">Özet Bilgiler
        </button>
        <button class="nav-link" id="nav-eu-summary-explanation-tab" data-bs-toggle="tab"
                data-bs-target="#nav-eu-summary-explanation" type="button" role="tab"
                aria-controls="nav-eu-summary-explanation" aria-selected="false">Özet Açıklama
        </button>
        <button class="nav-link" id="nav-eu-work-experiences-tab" data-bs-toggle="tab"
                data-bs-target="#nav-eu-work-experiences" type="button" role="tab"
                aria-controls="nav-eu-work-experiences" aria-selected="false">İş Deneyimleri
        </button>
        <button class="nav-link" id="nav-eu-education-informations-tab" data-bs-toggle="tab"
                data-bs-target="#nav-eu-education-informations" type="button" role="tab"
                aria-controls="nav-eu-education-informations" aria-selected="false">Eğitim Bilgileri
        </button>
        <button class="nav-link" id="nav-eu-foreign-languages-tab" data-bs-toggle="tab"
                data-bs-target="#nav-eu-foreign-languages" type="button" role="tab"
                aria-controls="nav-eu-foreign-languages" aria-selected="false">Yabancı Dil
        </button>
{{--        <button class="nav-link" id="nav-eu-talents-tab" data-bs-toggle="tab"--}}
{{--                data-bs-target="#nav-eu-talents" type="button" role="tab"--}}
{{--                aria-controls="nav-eu-talents" aria-selected="false">Yetenekler--}}
{{--        </button>--}}
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-eu-contact" role="tabpanel" aria-labelledby="nav-eu-contact-tab">
        @include('employee-user-partials.employee-user-cv-partials.employee-user-cv-contact-information')
    </div>
    <div class="tab-pane fade" id="nav-eu-summary-information" role="tabpanel"
         aria-labelledby="nav-summary-information-tab">
        <div id="errorsUpdatePassword" class="mt-1"></div>
        @include('employee-user-partials.employee-user-cv-partials.employee-user-cv-summary-information')
    </div>
    <div class="tab-pane fade" id="nav-eu-summary-explanation" role="tabpanel"
         aria-labelledby="nav-summary-explanation-tab">
        <div id="errorsUpdatePassword" class="mt-1"></div>
        @include('employee-user-partials.employee-user-cv-partials.employee-user-cv-summary-explanation')
    </div>
    <div class="tab-pane fade" id="nav-eu-work-experiences" role="tabpanel" aria-labelledby="nav-work-experiences-tab">
        <div id="errorsUpdatePassword" class="mt-1"></div>
        @include('employee-user-partials.employee-user-cv-partials.employee-user-cv-work-experiences')
    </div>
    <div class="tab-pane fade" id="nav-eu-education-informations" role="tabpanel"
         aria-labelledby="nav-eu-education-informations-tab">
        <div id="errorsUpdatePassword" class="mt-1"></div>
        @include('employee-user-partials.employee-user-cv-partials.employee-user-cv-education-informations')
    </div>
    <div class="tab-pane fade" id="nav-eu-foreign-languages" role="tabpanel"
         aria-labelledby="nav-foreign-languages-tab">
        <div id="errorsUpdatePassword" class="mt-1"></div>
        @include('employee-user-partials.employee-user-cv-partials.employee-user-cv-foreign-languages')
    </div>
{{--    <div class="tab-pane fade" id="nav-eu-talents" role="tabpanel" aria-labelledby="nav-eu-talents-tab">--}}
{{--        <div id="errorsUpdatePassword" class="mt-1"></div>--}}
{{--        @include('employee-user-partials.employee-user-cv-partials.employee-user-cv-talents')--}}
{{--    </div>--}}
</div>
@section('cv-scripts')
    @yield('cv-contact-information-scripts')
    @yield('cv-summary-information-scripts')
    @yield('cv-summary-explanation-scripts')
    @yield('cv-work-experiences-scripts')
    @yield('cv-education-informations-scripts')
    @yield('cv-foreign-languages-scripts')
{{--    @yield('cv-talents-scripts')--}}
@endsection