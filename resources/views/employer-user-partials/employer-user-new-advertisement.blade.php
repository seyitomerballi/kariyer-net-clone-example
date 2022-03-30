<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-advertisement-tab" data-bs-toggle="tab"
                data-bs-target="#nav-advertisement" type="button" role="tab"
                aria-controls="nav-advertisement" aria-selected="true">İlan
        </button>
        <button class="nav-link" id="nav-ad-description-tab" data-bs-toggle="tab"
                data-bs-target="#nav-ad-description" type="button" role="tab"
                aria-controls="nav-ad-description" aria-selected="false">İlan Açıklaması
        </button>
        <button class="nav-link" id="nav-candidate-criteria-tab" data-bs-toggle="tab"
                data-bs-target="#nav-candidate-criteria" type="button" role="tab"
                aria-controls="nav-candidate-criteria" aria-selected="false">Aday Kriterleri
        </button>
    </div>
</nav>
<form class="p-2" id="employer-user-new-advertisement" action="{{$updateAdvertisement}}">
    @csrf
    <div class="tab-content" id="nav-tabContent">
        <div id="errorsUpdateAdvertisement" class="mt-1"></div>
        <div class="tab-pane fade show active" id="nav-advertisement" role="tabpanel"
             aria-labelledby="nav-advertisement-tab">
            <div class="row">
                <div class="col-6 my-1">
                    <label for="new_ad_title" class="form-label">
                        Başlık </label>
                    <input id="new_ad_title" type="text"
                           class="form-control"
                           name="new_ad_title"
                           value=""
                           autocomplete="new_ad_title" autofocus>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_employer_user" class="form-label">
                        Şirket Adı </label>
                    <input id="new_ad_employer_user"
                           class="form-control"
                           value="{{$currentUser->company_name}}" disabled>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_location" class="form-label">
                        Konum </label>
                    <input id="new_ad_location"
                           type="text"
                           class="form-control"
                           name="new_ad_location" value=""
                           autocomplete="surname">
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_country" class="form-label text-md-end">
                        İl </label>
                    <select id="new_ad_country" name="new_ad_country" class="select2 form-select form-select-sm w-auto"
                            aria-label="İl">
                        @foreach($country_list as $country)
                            <option value="{{$country['name']}}">{{$country['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_district" class="form-label text-md-end">
                        İlçe </label>
                    <select id="new_ad_district" name="new_ad_district"
                            class="select2 form-select form-select-sm w-auto"
                            aria-label="İlçe">
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_sector" class="form-label text-md-end">
                        Sektör </label>
                    <select id="new_ad_sector" name="new_ad_sector[]" class="select2 form-select form-select-sm w-auto"
                            multiple
                            aria-label="Sektör">
                        @foreach($sector_list as $key => $sector)
                            <option value="{{$sector->id}}">{{$sector->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_department" class="form-label text-md-end">
                        Departman </label>
                    <select id="new_ad_department" name="new_ad_department[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Departman">
                        @foreach($department_list as $key => $department)
                            <option value="{{$department->id}}">{{$department->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_way_of_working" class="form-label text-md-end">
                        Çalışma Şekli </label>
                    <select id="new_ad_way_of_working" name="new_ad_way_of_working[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Çalışma Şekli">
                        @foreach($way_of_working_list as $key => $way_of_working)
                            <option value="{{$way_of_working->id}}">{{$way_of_working->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_period" class="form-label text-md-end"> İlan Süresi
                    </label>
                    <input id="new_ad_period"
                           type="number"
                           min="1"
                           max="30"
                           class="form-control"
                           name="new_ad_period" value="30"
                           autocomplete="new_ad_period">
                </div>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-ad-description" role="tabpanel" aria-labelledby="nav-ad-description-tab">
            <div class="row">
                <textarea class="texteditor" id="new_ad_description" name="new_ad_description"></textarea>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-candidate-criteria" role="tabpanel"
             aria-labelledby="nav-candidate-criteria-tab">
            <div class="row">
                <div class="col-6 my-1">
                    <label for="new_ad_working_type" class="form-label text-md-end">
                        Çalışma Tipi </label>
                    <select id="new_ad_working_type" name="new_ad_working_type[]"
                            class="select2 form-select form-select-sm w-auto" multiple
                            aria-label="Engelli">
                        @foreach($working_type_list as $key => $working_type)
                            <option value="{{$working_type->id}}">{{$working_type->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_position_level" class="form-label text-md-end">
                        Pozisyon Seviyesi </label>
                    <select id="new_ad_position_level" name="new_ad_position_level[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Pozisyon Seviyesi">
                        @foreach($position_level_list as $key => $position_level)
                            <option value="{{$position_level->id}}">{{$position_level->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_education_level" class="form-label text-md-end">
                        Eğitim Seviyesi </label>
                    <select id="new_ad_education_level" name="new_ad_education_level[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Eğitim Seviyesi">
                        @foreach($education_level_list as $key => $education_level)
                            <option value="{{$education_level->id}}">{{$education_level->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_experienced" class="form-label text-md-end">
                        Deneyim </label>
                    <select id="new_ad_experienced" name="new_ad_experienced[]" class="select2 form-select
                    form-select-sm w-auto" multiple aria-label="Deneyim">
                        @foreach($experienced_list as $key => $experienced)
                            <option value="{{$experienced->id}}">{{$experienced->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_disability" class="form-label text-md-end">
                        Engelli </label>
                    <select id="new_ad_disability" name="new_ad_disability[]" class="select2 form-select
                    form-select-sm w-auto"
                            aria-label="Engelli" multiple>
                        @foreach($disability_list as $key => $disability)
                            <option value="{{$disability->id}}">{{$disability->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="new_ad_driving_license" class="form-label text-md-end">
                        Ehliyet </label>
                    <select id="new_ad_driving_license" name="new_ad_driving_license[]" class="select2 form-select
                    form-select-sm w-auto"
                            aria-label="Ehliyet" multiple>
                        @foreach($driving_licence_list as $key => $driving_licence)
                            <option value="{{$driving_licence->id}}">{{$driving_licence->title}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
        <hr class="mt-1">
        <div class="my-2 offset-11">
            <button type="submit" class="btn btn-primary">
                İlanı Yayınla
            </button>
        </div>
    </div>
</form>
@section('new-advertisement-scripts')
    <script>
        $(document).ready(function () {
            $('#new_ad_country').trigger('change');
            clearForm($('#employer-user-new-advertisement'));
        });
        $('#employer-user-new-advertisement').on('submit', function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var form = $(this).serialize();
            $('#errorsUpdateAdvertisement').html('');
            $(this).children().find('.is-invalid').removeClass('is-invalid');
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                dataType: 'json',
                success: function (response) {
                    $('#errorsUpdateAdvertisement').html('');
                    clearForm($('#employer-user-new-advertisement'));
                    showSuccessAlertWithReload(response.message,true);
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertView(response.responseJSON.errors);
                    $('#errorsUpdateAdvertisement').html(viewError);
                },
            });
        });
        $('#new_ad_country').on('change', function () {
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
                    $('#new_ad_district').html('<option disabled selected>Seçiniz</option>');
                    var districtList = response.data.districts;
                    var optionView = ``;
                    $.each(districtList, function (key, val) {
                        optionView += `<option value="${val}">${val}</option>`;
                    });
                    $('#new_ad_district').append(optionView);
                },
                error: function (response) {
                    showSuccessAlert(response, false);
                },
            });
        });
    </script>
@endsection