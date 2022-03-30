<table id="advertisementsListEmployer" class="table table-striped table-condensed dataTable"
       data-action="{{route('employerUser.advertisements.getList')}}"
       style="width:100%">
    <thead>
    <tr></tr>
    </thead>
</table>
<div class="modal fade" id="editAdvertisement" tabindex="-1" aria-labelledby="editAdvertisementLabel"
     aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editAdvertisementLabel">Veri</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form class="p-2" id="employer-user-update-advertisement" action="">
                @csrf
                <div class="modal-body">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-update-advertisement-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-update-advertisement" type="button" role="tab"
                                    aria-controls="nav-update-advertisement" aria-selected="true">İlan
                            </button>
                            <button class="nav-link" id="nav-update-ad-description-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-update-ad-description" type="button" role="tab"
                                    aria-controls="nav-update-ad-description" aria-selected="false">İlan Açıklaması
                            </button>
                            <button class="nav-link" id="nav-update-candidate-criteria-tab" data-bs-toggle="tab"
                                    data-bs-target="#nav-update-candidate-criteria" type="button" role="tab"
                                    aria-controls="nav-update-candidate-criteria" aria-selected="false">Aday Kriterleri
                            </button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-update-tabContent">
                        <div id="errorsUpdateEditAdvertisement" class="mt-1"></div>
                        <div class="tab-pane fade show active" id="nav-update-advertisement" role="tabpanel"
                             aria-labelledby="nav-advertisement-tab">
                            <div class="row">
                                <div class="col-6 my-1">
                                    <label for="update_ad_title" class="form-label">
                                        Başlık </label>
                                    <input id="update_ad_title" type="text"
                                           class="form-control"
                                           name="update_ad_title"
                                           value=""
                                           autocomplete="update_ad_title" autofocus>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_location" class="form-label">
                                        Konum </label>
                                    <input id="update_ad_location"
                                           type="text"
                                           class="form-control"
                                           name="update_ad_location" value=""
                                           autocomplete="surname">
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_country" class="form-label text-md-end">
                                        İl </label>
                                    <select id="update_ad_country" name="update_ad_country"
                                            class="select2 form-select form-select-sm w-auto"
                                            aria-label="İl">
                                        @foreach($country_list as $country)
                                            <option value="{{$country['name']}}">{{$country['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_district" class="form-label text-md-end">
                                        İlçe </label>
                                    <select id="update_ad_district" name="update_ad_district"
                                            class="select2 form-select form-select-sm w-auto"
                                            aria-label="İlçe">
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_sector" class="form-label text-md-end">
                                        Sektör </label>
                                    <select id="update_ad_sector" name="update_ad_sector[]"
                                            class="select2 form-select form-select-sm w-auto"
                                            multiple
                                            aria-label="Sektör">
                                        @foreach($sector_list as $key => $sector)
                                            <option value="{{$sector->id}}">{{$sector->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_department" class="form-label text-md-end">
                                        Departman </label>
                                    <select id="update_ad_department" name="update_ad_department[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Departman">
                                        @foreach($department_list as $key => $department)
                                            <option value="{{$department->id}}">{{$department->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_way_of_working" class="form-label text-md-end">
                                        Çalışma Şekli </label>
                                    <select id="update_ad_way_of_working" name="update_ad_way_of_working[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Çalışma Şekli">
                                        @foreach($way_of_working_list as $key => $way_of_working)
                                            <option value="{{$way_of_working->id}}">{{$way_of_working->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_period" class="form-label text-md-end"> İlan Süresi
                                    </label>
                                    <input id="update_ad_period"
                                           type="number"
                                           min="1"
                                           max="30"
                                           class="form-control"
                                           name="update_ad_period" value="30"
                                           autocomplete="update_ad_period">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-update-ad-description" role="tabpanel"
                             aria-labelledby="nav-ad-description-tab">
                            <div class="row">
                                <textarea class="texteditor" id="update_ad_description"
                                          name="update_ad_description"></textarea>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-update-candidate-criteria" role="tabpanel"
                             aria-labelledby="nav-candidate-criteria-tab">
                            <div class="row">
                                <div class="col-6 my-1">
                                    <label for="update_ad_working_type" class="form-label text-md-end">
                                        Çalışma Tipi </label>
                                    <select id="update_ad_working_type" name="update_ad_working_type[]"
                                            class="select2 form-select form-select-sm w-auto" multiple
                                            aria-label="Engelli">
                                        @foreach($working_type_list as $key => $working_type)
                                            <option value="{{$working_type->id}}">{{$working_type->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_position_level" class="form-label text-md-end">
                                        Pozisyon Seviyesi </label>
                                    <select id="update_ad_position_level" name="update_ad_position_level[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Pozisyon Seviyesi">
                                        @foreach($position_level_list as $key => $position_level)
                                            <option value="{{$position_level->id}}">{{$position_level->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_education_level" class="form-label text-md-end">
                                        Eğitim Seviyesi </label>
                                    <select id="update_ad_education_level" name="update_ad_education_level[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Eğitim Seviyesi">
                                        @foreach($education_level_list as $key => $education_level)
                                            <option
                                                    value="{{$education_level->id}}">{{$education_level->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_experienced" class="form-label text-md-end">
                                        Deneyim </label>
                                    <select id="update_ad_experienced" name="update_ad_experienced[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Deneyim">
                                        @foreach($experienced_list as $key => $experienced)
                                            <option value="{{$experienced->id}}">{{$experienced->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_disability" class="form-label text-md-end">
                                        Engelli </label>
                                    <select id="update_ad_disability" name="update_ad_disability[]" class="select2 form-select
                    form-select-sm w-auto"
                                            aria-label="Engelli" multiple>
                                        @foreach($disability_list as $key => $disability)
                                            <option value="{{$disability->id}}">{{$disability->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-6 my-1">
                                    <label for="update_ad_driving_license" class="form-label text-md-end">
                                        Ehliyet </label>
                                    <select id="update_ad_driving_license" name="update_ad_driving_license[]" class="select2 form-select
                    form-select-sm w-auto"
                                            aria-label="Ehliyet" multiple>
                                        @foreach($driving_licence_list as $key => $driving_licence)
                                            <option
                                                    value="{{$driving_licence->id}}">{{$driving_licence->title}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>
@section('table-advertisements-scripts')
    <script>
        $(document).on('click', 'button[edit-button]', function (e) {
            e.preventDefault();
            var url = $(this).attr('edit-button-url');
            var modal = $(this).attr('modal-target');
            var table = $(this).parents('table.dataTable');
            $.ajax({
                url: url,
                type: "GET",
                dataType: 'json',
                success: function (response) {
                    fillEditData(response.data);
                    $('#employer-user-update-advertisement').attr('action', response.updateEditAdvertisement)
                    $(`${modal}`).modal('show');
                },
                error: function (response) {
                    showSuccessAlert(response, false);
                },
            })
        });
        {{--$(document).on('click', 'button[show-button]', function (e) {--}}
        {{--    e.preventDefault();--}}
        {{--    var id = $(this).attr('show-advertisement-id');--}}
        {{--    var modal = $(this).attr('modal-target');--}}
        {{--    var url = `{{url('/employer-user/appeal-advertisements/getListByEmployeeUser')}}` + `/${id}`;--}}
        {{--    $.ajax({--}}
        {{--        url: url,--}}
        {{--        type: "GET",--}}
        {{--        dataType: 'json',--}}
        {{--        success: function (response) {--}}
        {{--            console.log(response);--}}
        {{--            $(`${modal}`).modal('show');--}}
        {{--        },--}}
        {{--        error: function (response) {--}}
        {{--            showSuccessAlert(response, false);--}}
        {{--        },--}}
        {{--    });--}}

        {{--});--}}

        function fillEditData(response) {
            $('#update_ad_title').val(response.title);
            $('#update_ad_location').val(response.location);
            $('#update_ad_country').val(response.country).trigger('change', [response.district]);
            $('#update_ad_sector').val(response.sector).trigger('change');
            $('#update_ad_department').val(response.department).trigger('change');
            $('#update_ad_way_of_working').val(response.way_of_working).trigger('change');
            $('#update_ad_period').val(response.period).trigger('change');
            // $('#update_ad_description').val(response.description);
            tinyMCE.get('update_ad_description').setContent(response.description);
            $('#update_ad_working_type').val(response.working_type).trigger('change');
            $('#update_ad_position_level').val(response.position_level).trigger('change');
            $('#update_ad_education_level').val(response.education_level).trigger('change');
            $('#update_ad_experienced').val(response.experienced).trigger('change');
            $('#update_ad_disability').val(response.disability).trigger('change');
            $('#update_ad_driving_license').val(response.driving_license).trigger('change');
        }

        $('#employer-user-update-advertisement').on('submit', function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var form = $(this).serialize();
            $('#errorsUpdateEditAdvertisement').html('');
            $(this).children().find('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                dataType: 'json',
                success: function (response) {
                    $('#errorsUpdateEditAdvertisement').html('');
                    clearForm($('#employer-user-new-advertisement'));
                    showSuccessAlertWithReload(response.message, true);
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertView(response.responseJSON.errors);
                    $('#errorsUpdateEditAdvertisement').html(viewError);
                },
            });
        });


        $('#update_ad_country').on('change', function (e, district) {
            var url = "{{$district_list_url}}";
            var country = $(this).val();
            $.ajax({
                url: url,
                type: "POST",
                data: {
                    country: country,
                },
                dataType: 'json',
                success: function (response) {
                    $('#update_ad_district').html('<option disabled selected>Seçiniz</option>');
                    var districtList = response.data.districts;
                    var optionView = ``;
                    $.each(districtList, function (key, val) {
                        optionView += `<option value="${val}">${val}</option>`;
                    });
                    $('#update_ad_district').append(optionView);
                    $('#update_ad_district').val(district).trigger('change');
                },
                error: function (response) {
                    showSuccessAlert(response, false);
                },
            });
        });
    </script>
@endsection