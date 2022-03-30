<div id="errorsWorkExperiences" class="mt-1"></div>
<form id="cv-work-experiences"
      action-data="{{route('cv.updateWorkExperience')}}">
    <div class="card p-3">
        <div class="row">
            <div class="col-6">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_we_company_name" class="form-label">Şirket Adı</label>
                        <input type="text" class="form-control" id="cv_we_company_name" name="cv_we_company_name"
                               value="">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_we_position" class="form-label">Pozisyon</label>
                        <input type="text" class="form-control" id="cv_we_position" name="cv_we_position"
                               value="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-4 mb-3">
                        <label for="cv_we_start_date" class="form-label">Başlangıç Tarihi</label>
                        <input type="date" class="form-control" id="cv_we_start_date" name="cv_we_start_date"
                               value="{{@$userContactInformation->degree}}">
                    </div>
                    <div class="col-4 mb-3 endDateArea">
                        <label for="cv_we_end_date" class="form-label">Bitiş Tarihi</label>
                        <input type="date" class="form-control" id="cv_we_end_date" name="cv_we_end_date"
                               value="{{@$userContactInformation->degree}}">
                    </div>
                    <div class="col-2 mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="1" id="cv_we_still_working"
                                   name="cv_we_still_working">
                            <label class="form-check-label" for="cv_we_still_working">
                                Hala çalışıyorum
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_se_company_sector" class="form-label">Firma Sektörü</label>
                        <select type="text" class="select2 form-control" id="cv_se_company_sector"
                                name="cv_se_company_sector">
                            <option disabled selected value="0">Seçiniz</option>
                            @foreach($company_sector_list as $key => $company_sector)
                                <option value="{{$key}}">{{$company_sector}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_se_business_area" class="form-label">İş Alanı</label>
                        <select type="text" class="select2 form-control" id="cv_se_business_area"
                                name="cv_se_business_area">
                            <option disabled selected value="0">Seçiniz</option>
                            @foreach($business_area_list as $key => $business_area)
                                <option value="{{$key}}">{{$business_area}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 mb-3">
                        <label for="cv_se_working_type" class="form-label">Çalışma Şekli</label>
                        <select type="text" class="select2 form-control" id="cv_se_working_type"
                                name="cv_se_working_type">
                            <option disabled selected value="0">Seçiniz</option>
                            @foreach($working_type_list as $key => $working_type)
                                <option value="{{$key}}">{{$working_type}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_se_country" class="form-label">Ülke</label>
                        <input type="text" class="form-control" id="cv_se_country"
                               name="cv_se_country"
                               value="">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_se_city" class="form-label">Şehir</label>
                        <input type="text" class="form-control" id="cv_se_city"
                               name="cv_se_city"
                               value="">
                    </div>
                </div>
            </div>
            <div class="col-6">
                <textarea class="texteditor" name="cv_se_desc" id="cv_se_desc"></textarea>
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
    @if($userWorkExperiencesList)
        @foreach($userWorkExperiencesList as $work_experience)
            <div class="card border border-3 mb-3">
                <div class="row m-2">
                    <div class="col-11">
                        <div class="col-9">
                            <div class="row">
                                <div class="col">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Pozisyon</span>
                                    <div style="font-size: 1.3rem">{{$work_experience->position}}</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="me-3">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Firma Adı</span>
                                    <div style="font-size: 1.3rem">{{$work_experience->company_name}}</div>
                                </div>
                                <div class="me-3">
                                    @if($work_experience->city)
                                        <span class="text-muted fst-italic" style="font-size: 0.9rem">Şehir</span>
                                        <div style="font-size: 1.3rem">{{$work_experience->city}}</div>
                                    @endif
                                </div>
                                <div class="me-3">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Firma Sektörü</span>
                                    <div style="font-size: 1.3rem">{{\App\Models\EmployeeUserWorkExperience::$company_sector_list[$work_experience->company_sector]}}</div>
                                </div>
                            </div>
                            <div class="d-flex justify-content-start">
                                <div class="me-3">
                                    <span class="text-muted fst-italic"
                                          style="font-size: 0.9rem">Başlangıç Tarihi</span>
                                    <div style="font-size: 1.3rem">{{ \Illuminate\Support\Carbon::parse($work_experience->start_date)->format('m.Y')}}</div>
                                </div>
                                <div class="me-3">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Bitiş Tarihi</span>
                                    @if($work_experience->still_working == 1)
                                        <div style="font-size: 1.3rem">Hala Çalışıyor</div>
                                    @else
                                        <div style="font-size: 1.3rem">{{ \Illuminate\Support\Carbon::parse
                                        (@$work_experience->end_date)->format('m.Y')}}</div>
                                    @endif
                                </div>
                                <div class="me-3">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">Çalışma Tipi</span>
                                    <div style="font-size: 1.3rem">{{\App\Models\EmployeeUserWorkExperience::$working_type_list[$work_experience->working_type]}}</div>
                                </div>
                                <div class="me-3">
                                    <span class="text-muted fst-italic" style="font-size: 0.9rem">İş Alanı</span>
                                    <div style="font-size: 1.3rem">{{\App\Models\EmployeeUserWorkExperience::$business_area_list[$work_experience->business_area]}}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-1">
                        <button class="btn btn-danger deleteWorkExp"
                                data-delete-url="{{route('cv.deleteWorkExperience',$work_experience->id)}}">Sil</button>
                    </div>
                    <div class="col-12">
                        <span class="text-muted fst-italic" style="font-size: 0.9rem">İş Tanımı</span>
                        <div class="row d-flex justify-content-between border-warning border border-2 rounded-3 card-body"
                             style="font-size: 1.3rem">
                            {!! $work_experience->desc !!}
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    @else
        <div class="card">
            <div class="alert alert-danger align-middle m-3" role="alert">
                <h5 class="align-center"> İş Deneyiminiz Bulunmamaktadır.</h5>
            </div>
        </div>
    @endif
</div>

@section('cv-work-experiences-scripts')
    <script>
        $(document).ready(function () {
            clearForm($('#cv-work-experiences'));
        });

        function clearForm(form) {
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
                    $(val).val(null).trigger('change');
                }
                if ($(val).find('option') > 0) {
                    $(val).val(0).trigger('change');
                }
                $(val).val(0).trigger('change');
            });
            $.each(form.find('textarea'), function (key, val) {
                $(val).val('');
            });
            $.each(form.find('input[type="checkbox"]'),function (key,val){
                $(val).prop('checked',false);
            })
            $('.texteditor').val('');
        }

        $(document).on('click', '#cv_we_still_working', function () {
            if ($(this).is(':checked')) {
                $(this).val(1);
                $('.endDateArea').hide();
            } else {
                $(this).val(0);
                $('.endDateArea').show();
            }
        });
        $(document).on('submit', '#cv-work-experiences', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var url = $(this).attr('action-data');
            var formData = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (response) {
                    $('#errorsWorkExperiences').html('');
                    showSuccessAlertWithReload(response.message);
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertViewWorkExperiences(response.responseJSON.errors);
                    $('#errorsWorkExperiences').html(viewError);
                },
            });
        });

        $(document).on('click','.deleteWorkExp',function (){
           var url = $(this).attr('data-delete-url');
           $.ajax({
               url: url,
               method:'get',
               success: function (response) {
                   if (response.result == 'ok')
                       showSuccessAlertWithReload(response.message);
                   if (response.result == 'fail')
                       showSuccessAlert(response.message,false);
               },
               error: function (response) {
                   console.log(response);
               },
           })
        });

        function addErrorAlertViewWorkExperiences(errors) {
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