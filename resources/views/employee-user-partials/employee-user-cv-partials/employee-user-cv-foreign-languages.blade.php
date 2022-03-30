<div id="errorsForeignLanguages" class="mt-1"></div>
<form id="cv-foreign-languages"
      action-data="{{route('cv.updateForeignLanguage')}}">
    <div class="card p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="cv_fl_language" class="form-label">Dil</label>
                        <select type="text" class="select2 form-control" id="cv_fl_language"
                                name="cv_fl_language">
                            <option disabled selected value="0">Seçiniz</option>
                            @foreach($foreign_languages_list as $key => $foreign_language)
                                <option value="{{$key}}">{{$foreign_language}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <label for="cv_fl_level" class="form-label">Seviye</label>
                        <select type="text" class="select2 form-control" id="cv_fl_level"
                                name="cv_fl_level">
                            <option disabled selected value="0">Seçiniz</option>
                            @foreach($language_level_list as $key => $education_status)
                                <option value="{{$key}}">{{$education_status}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-4 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cv_fl_native"
                                   name="cv_fl_native">
                            <label class="form-check-label" for="cv_fl_native">
                                Ana Dil
                            </label>
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
    </div>
</form>
<hr>
<div class="mt-3">
    @if($userForeignLanguagesList)
        @foreach($userForeignLanguagesList as $foreign_language)
            <div class="card border border-3 mb-3">
                <div class="row m-2">
                    <div class="col-11">
                        <div class="row">
                            <div class="col-4">
                                <span class="text-muted fst-italic" style="font-size: 0.9rem">Dil</span>
                                <div style="font-size: 1.3rem">
                                    {{\App\Models\EmployeeUserForeignLanguage::$languages_list[$foreign_language->language]}}
                                </div>
                            </div>
                            <div class="col-4">
                                <span class="text-muted fst-italic" style="font-size: 0.9rem">Seviye</span>
                                <div style="font-size: 1.3rem">
                                    {{\App\Models\EmployeeUserForeignLanguage::$language_level_list[$foreign_language->level]}}
                                    <span class="fst-italic">{{$foreign_language->native == 1 ? '(Ana Dil)' :
                                    ''}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-danger deleteForeignLang"
                                data-delete-url="{{route('cv.deleteForeignLanguage',$foreign_language->id)}}">
                            Sil
                        </button>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="card">
            <div class="alert alert-danger align-middle m-3" role="alert">
                <h5 class="align-center"> Yabancı Dil Bulunmamaktadır.</h5>
            </div>
        </div>
    @endif
</div>

@section('cv-foreign-languages-scripts')

    <script>
        $(document).ready(function () {
            $('#cv_fl_native').prop('checked', false);
            $('#cv_fl_language').val(0).trigger('change');
            $('#cv_fl_level').val(0).trigger('change');
        });
        $(document).on('click', '#cv_fl_native', function () {
            if ($(this).is(':checked')) {
                $('#cv_fl_level').val(5).trigger('change');
            }
        });

        $(document).on('submit', '#cv-foreign-languages', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var url = $(this).attr('action-data');
            var formData = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#errorsForeignLanguages').html('');
                    showSuccessAlertWithReload(response.message);
                },
                error: function (response) {
                    $(this).find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertViewForeignLanguages(response.responseJSON.errors);
                    $('#errorsForeignLanguages').html(viewError);
                },
            });
        });

        $(document).on('click', '.deleteForeignLang', function () {
            var url = $(this).attr('data-delete-url');
            $.ajax({
                url: url,
                method: 'get',
                success: function (response) {
                    if (response.result == 'ok')
                        showSuccessAlertWithReload(response.message);
                    if (response.result == 'fail')
                        showSuccessAlert(response.message, false);
                },
                error: function (response) {
                    console.log(response);
                },
            })
        });

        function addErrorAlertViewForeignLanguages(errors) {
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