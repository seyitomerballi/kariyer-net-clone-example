<div id="errorsEducationInformations" class="mt-1"></div>
<form id="cv-education-informations"
      action-data="{{route('cv.updateEducationInformation')}}">
    <div class="card p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_ei_education_status" class="form-label">Eğitim Durumu</label>
                        <select type="text" class="select2 form-control" id="cv_ei_education_status"
                                name="cv_ei_education_status">
                            <option disabled selected value="0">Seçiniz</option>
                            @foreach($education_status_list as $key => $education_status)
                                <option value="{{$key}}">{{$education_status}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="cv_ei_start_date" class="form-label">Başlangıç Tarihi</label>
                        <input type="date" class="form-control" id="cv_ei_start_date" name="cv_ei_start_date"
                               value="">
                    </div>
                    <div class="col-4 mb-3 endDateArea">
                        <label for="cv_ei_end_date" class="form-label">Bitiş Tarihi</label>
                        <input type="date" class="form-control" id="cv_ei_end_date" name="cv_ei_end_date"
                               value="">
                    </div>
                    <div class="col-2 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cv_ei_continues"
                                   name="cv_ei_continues">
                            <label class="form-check-label" for="cv_ei_continues">
                                Devam Ediyorum
                            </label>
                        </div>
                    </div>
                    <div class="col-2 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cv_ei_leave"
                                   name="cv_ei_leave">
                            <label class="form-check-label" for="cv_ei_leave">
                                Terk
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-3 mb-3">
                        <label for="cv_ei_university" class="form-label">Üniversite</label>
                        <input type="text" class="form-control" id="cv_ei_university" name="cv_ei_university"
                               value="">
                    </div>
                    <div class="col-3 mb-3">
                        <label for="cv_ei_country" class="form-label">Şehir</label>
                        <input type="text" class="form-control" id="cv_ei_country" name="cv_ei_country"
                               value="">
                    </div>
                    <div class="col-3 mb-3">
                        <label for="cv_ei_faculty" class="form-label">Fakülte</label>
                        <input type="text" class="form-control" id="cv_ei_faculty" name="cv_ei_faculty"
                               value="">
                    </div>
                    <div class="col-3 mb-3">
                        <label for="cv_ei_department" class="form-label">Bölüm</label>
                        <input type="text" class="form-control" id="cv_ei_department" name="cv_ei_department"
                               value="">
                    </div>
                </div>
                {{--                <div class="row">--}}
                {{--                    <div class="col-6 mb-3">--}}
                {{--                        <div class="form-check">--}}
                {{--                            <input class="form-check-input" type="checkbox" value="0" id="cv_ei_minor"--}}
                {{--                                   name="cv_ei_minor_major">--}}
                {{--                            <label class="form-check-label" for="cv_ei_minor">--}}
                {{--                                Yandal bilgisi girmek istiyorum--}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="col-6 mb-3">--}}
                {{--                        <div class="form-check">--}}
                {{--                            <input class="form-check-input" type="checkbox" value="1" id="cv_ei_major"--}}
                {{--                                   name="cv_ei_minor_major">--}}
                {{--                            <label class="form-check-label" for="cv_ei_major">--}}
                {{--                                Çift anadal bilgisi girmek istiyorum--}}
                {{--                            </label>--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                {{--                <div class="row minorMajorArea">--}}
                {{--                    <div class="minorArea">--}}
                {{--                        <div class="col-6 mb-3">--}}
                {{--                            <label for="cv_ei_minor_department" class="form-label">Yandan Bölüm</label>--}}
                {{--                            <input type="text" class="form-control" id="cv_ei_minor_department"--}}
                {{--                                   name="cv_ei_minor_department"--}}
                {{--                                   value="">--}}
                {{--                        </div>--}}
                {{--                        <div class="col-6 mb-3">--}}
                {{--                            <label for="cv_ei_minor_grade" class="form-label">Diploma Notu</label>--}}
                {{--                            <input type="text" class="form-control" id="cv_ei_minor_grade"--}}
                {{--                                   name="cv_ei_minor_grade"--}}
                {{--                                   value="">--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                    <div class="majorArea">--}}
                {{--                        <div class="col-6 mb-3">--}}
                {{--                            <label for="cv_ei_major_faculty" class="form-label">Çift Anadal Fakülte</label>--}}
                {{--                            <input type="text" class="form-control" id="cv_ei_major_faculty"--}}
                {{--                                   name="cv_ei_major_faculty"--}}
                {{--                                   value="">--}}
                {{--                        </div>--}}
                {{--                        <div class="col-6 mb-3">--}}
                {{--                            <label for="cv_ei_major_department" class="form-label">Çift Anadal Bölüm</label>--}}
                {{--                            <input type="text" class="form-control" id="cv_ei_major_department"--}}
                {{--                                   name="cv_ei_major_department"--}}
                {{--                                   value="">--}}
                {{--                        </div>--}}
                {{--                        <div class="col-6 mb-3">--}}
                {{--                            <label for="cv_ei_major_grade" class="form-label">Diploma Notu</label>--}}
                {{--                            <input type="text" class="form-control" id="cv_ei_major_grade"--}}
                {{--                                   name="cv_ei_major_grade"--}}
                {{--                                   value="">--}}
                {{--                        </div>--}}
                {{--                    </div>--}}
                {{--                </div>--}}
                <div class="row">
                    <label for="cv_ei_description" class="form-label">Açıklama</label>
                    <textarea name="cv_ei_description" id="cv_ei_description" cols="30" rows="10"></textarea>
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
    @if($userEducationInformationsList->count() > 0)
        @foreach($userEducationInformationsList as $education_information)
            <div class="card border border-3 mb-3">
                <div class="row m-2">
                    <div class="col-2 d-flex justify-content-center align-self-center">
                        <h3>{{\App\Models\EmployeeUserEducationInformation::$education_status_list[$education_information->education_status]}}</h3>
                    </div>
                    <div class="col-9">
                        <div class="col-9">
                            <div class="row">
                                <div class="col-4">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Üniversite</span>
                                    <div style="font-size: 1.3rem">{{$education_information->university}}</div>
                                </div>
                                <div class="col-4">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Fakülte</span>
                                    <div style="font-size: 1.3rem">{{$education_information->faculty}}</div>
                                </div>
                                <div class="col-4">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Bölüm</span>
                                    <div style="font-size: 1.3rem">{{$education_information->department}}</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="me-3">
                                    <span class="text-muted fst-italic"
                                          style="font-size: 0.9rem">Başlangıç Tarihi</span>
                                    <div style="font-size: 1.3rem">{{ \Illuminate\Support\Carbon::parse($education_information->start_date)->format('m.Y')}}</div>
                                </div>
                                <div class="me-3">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Bitiş Tarihi</span>
                                    @if($education_information->continues == 1)
                                        <div style="font-size: 1.3rem">Devam Ediyor</div>
                                    @elseif($education_information->leave == 1)
                                        <div style="font-size: 1.3rem">Terk</div>
                                    @else
                                        <div style="font-size: 1.3rem">{{ \Illuminate\Support\Carbon::parse(@$education_information->end_date)->format('m.Y')}}</div>
                                    @endif
                                </div>
                                <div class="me-3">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Şehir</span>
                                    <div style="font-size: 1.3rem">{{$education_information->country}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-danger deleteEduInfo"
                                data-delete-url="{{route('cv.deleteEducationInformation',$education_information->id)}}">
                            Sil
                        </button>
                    </div>
                    @if($education_information->description)
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <span class="text-muted fst-italic align-middle" style="font-size: 0.9rem">Açıklama</span>
                            </div>
                            <div class="row d-flex justify-content-between card-body border m-2"
                                 style="font-size: 1.3rem">
                                {!! $education_information->description !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        @endforeach
    @else
        <div class="card">
            <div class="alert alert-danger align-middle m-3" role="alert">
                <h5 class="align-center"> Eğitim Bilginiz Bulunmamaktadır.</h5>
            </div>
        </div>
    @endif
</div>

@section('cv-education-informations-scripts')
    <script>

        $(document).ready(function () {
            clearForm($('#cv-education-informations'));
            $('#cv_ei_continues').val(1);
            $('#cv_ei_leave').val(1);
        });

        $('#cv_ei_continues').click(function () {
            if ($(this).is(':checked')) {
                $('#cv_ei_leave').prop("checked", false);
                $('#cv_ei_leave').prop("disabled", true);
                $('.endDateArea').hide();
            } else {
                $('#cv_ei_leave').prop("disabled", false);
                $('.endDateArea').show();
            }
        });
        $('#cv_ei_leave').click(function () {
            if ($(this).is(':checked')) {
                $('#cv_ei_continues').prop("checked", false);
                $('#cv_ei_continues').prop("disabled", true);
                $('.endDateArea').hide();
            } else {
                $('#cv_ei_continues').prop("disabled", false);
                $('.endDateArea').show();
            }
        });
        // $(document).on('click', 'input[name="cv_ei_minor_major"]', function () {
        //
        //     $('.minorMajorArea').show();
        //     if ($(this).val() === 0) {
        //         if ($(this).is(':checked')) {
        //             $('.minorMajorArea').hide();
        //             $('.minorArea').hide();
        //         } else {
        //             $('.minorArea').show();
        //         }
        //     } else if ($(this).val() === 1) {
        //         if ($(this).is(':checked')) {
        //             $('.minorMajorArea').hide();
        //             $('.majorArea').hide();
        //         } else {
        //             $('.majorArea').show();
        //         }
        //
        //     }
        // });

        $(document).on('submit', '#cv-education-informations', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var url = $(this).attr('action-data');
            var formData = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#errorsEducationInformations').html('');
                    showSuccessAlertWithReload(response.message);
                },
                error: function (response) {
                    $(this).find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertViewEducationInformations(response.responseJSON.errors);
                    $('#errorsEducationInformations').html(viewError);
                },
            });
        });

        $(document).on('click', '.deleteEduInfo', function () {
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

        function addErrorAlertViewEducationInformations(errors) {
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