<div id="errorsSummaryInformation" class="mt-1"></div>
<form id="cv-summary-information"
      action-data="{{route('cv.updateSummaryInformation')}}">
    <div class="card p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 mb-3 d-flex justify-content-between">
                        <label for="cv_si_gender" class="form-label">Cinsiyetim</label>
                        <div class="d-flex flex-row">
                            <div class="form-check me-3 ">
                                <input class="form-check-input" type="radio" name="cv_si_gender" id="cv_si_gender_man"
                                       value="0"
                                        {{@$userSummaryInformation->gender == 0 ? 'checked' : '' }}>
                                <label class="form-check-label" for="cv_si_gender_man">
                                    Erkek
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="cv_si_gender" id="cv_si_gender_woman"
                                       value="1" {{@$userSummaryInformation->gender == 1 ? 'checked' : '' }}>
                                <label class="form-check-label" for="cv_si_gender_woman">
                                    Kadın
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_si_driving_license" class="form-label">Sürücü Belgesi</label>
                        <select type="text" class="select2 form-control" id="cv_si_driving_license"
                                multiple
                                name="cv_si_driving_license[]">
                            @foreach(\App\Models\DrivingLicense::all() as $driving_license)
                                <option value="{{$driving_license->id}}">{{$driving_license->title}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_si_nationality" class="form-label">Uyruk</label>
                        <select type="text" class="select2 form-control" id="cv_si_nationality"
                                multiple
                                name="cv_si_nationality[]">
                            @foreach(\App\Models\Country::$country_master_list as $country_master)
                                <option value="{{$country_master}}">{{$country_master}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_si_net_salary_exp" class="form-label">Net Maaş Beklentisi</label>
                        <input type="text" class="form-control" id="cv_si_net_salary_exp" name="cv_si_net_salary_exp"
                               value="{{@$userSummaryInformation->net_salary_expectation}}">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_si_military_status" class="form-label">Askerlik Durumu</label>
                        <select type="text" class="select2 form-control" id="cv_si_military_status"
                                name="cv_si_military_status">
                            @foreach(\App\Models\EmployeeUser::$military_status_list as $key => $military_status)
                                <option value="{{$key}}">{{$military_status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2 mb-0 p-3">
        <button type="submit" class="btn btn-primary rounded">
            Kaydet
        </button>
    </div>
</form>
@section('cv-summary-information-scripts')
    <script>
        $(document).ready(function () {
            $('#cv_si_military_status').val("{{@$userSummaryInformation->military_status}}").trigger('change');
            $('#cv_si_nationality').val({!!@$userSummaryInformation->nationality ?
            $userSummaryInformation->nationality : '' !!}).trigger('change');
            $('#cv_si_driving_license').val({!!@$userSummaryInformation->driving_licenses ?
            $userSummaryInformation->driving_licenses : ''!!}).trigger('change');
        });
        $(document).on('submit', '#cv-summary-information', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var url = $(this).attr('action-data');
            var formData = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (response) {
                    showSuccessAlertWithReload(response.message);
                    $('#cv_si_city').trigger('change');
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertViewSummaryInformation(response.responseJSON.errors);
                    $('#errorsSummaryInformation').html(viewError);
                },
            });
        });

        function addErrorAlertViewSummaryInformation(errors) {
            var error = ``;
            $.each(errors, function (key, val) {
                if ($(`#${key}`).length > 0) $(`#${key}`).addClass('is-invalid');
                error += `<li>${val}</li>`;
            });
            var viewError = `<div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <ul>${error}</ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>`;
            return viewError;
        }
    </script>
@endsection