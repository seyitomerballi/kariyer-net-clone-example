<div id="errorsContactInformation" class="mt-1"></div>
<form id="cv-contact-information"
      action-data="{{route('cv.updateContactInformation')}}">
    <div class="card p-3">
        <div class="row">
            <div class="col-2 imgUp">
                <div class="imagePreview" style="background-size: 100%;background-size: contain;
background-repeat: no-repeat;background: url({{@Storage::url($userContactInformation->image_path)}}">
                </div>
                <label class="btn btn-primary-ex" style="width:100px">
                    Yükle<input type="file" class="uploadFile img" value=""
                                style="width: 0px;height: 0px;
                    overflow: hidden;">
                </label>
            </div>
            <div class="col-8">
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_ci_name" class="form-label">İsim</label>
                        <input type="text" class="form-control" id="cv_ci_name" name="cv_ci_name"
                               value="{{$userContactInformation ? $userContactInformation->name : $currentUser->name}}">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_ci_surname" class="form-label">Soyisim</label>
                        <input type="text" class="form-control" id="cv_ci_surname" name="cv_ci_surname"
                               value="{{$userContactInformation ? $userContactInformation->surname : $currentUser->surname}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_ci_degree" class="form-label">Ünvan</label>
                        <input type="text" class="form-control" id="cv_ci_degree" name="cv_ci_degree"
                               value="{{@$userContactInformation->degree}}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_ci_email" class="form-label">Email</label>
                        <input type="email" class="form-control" id="cv_ci_email" name="cv_ci_email"
                               value="{{$userContactInformation ? $userContactInformation->email : $currentUser->email}}">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_ci_birthday" class="form-label">Doğum Tarihi</label>
                        <input type="date" class="form-control" id="cv_ci_birthday" name="cv_ci_birthday"
                               value="{{\Carbon\Carbon::parse(@$userContactInformation->date_of_birth)->format('Y-m-d')
                               }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_ci_phone_number" class="form-label">Telefon No</label>
                        <input type="phone" class="form-control" id="cv_ci_phone_number"
                               name="cv_ci_phone_number"
                               value="{{$userContactInformation ? $userContactInformation->phone_number :
                               $currentUser->phone_number}}">
                    </div>
                    <div class="col-6 mb-3">
                        <label for="cv_ci_phone_number_alternative" class="form-label">Alternatif Telefon
                            No</label>
                        <input type="phone" class="form-control" id="cv_ci_phone_number_alternative"
                               name="cv_ci_phone_number_alternative"
                               value="{{@$userContactInformation->phone_number_alternative}}">
                    </div>
                </div>
                <div class="row">
                    {{--                    <div class="col-6 mb-3">--}}
                    {{--                        <label for="cv_ci_country" class="form-label">Ülke</label>--}}
                    {{--                        <select type="phone" class="select2 form-control" id="cv_ci_country"--}}
                    {{--                                name="cv_ci_country">--}}
                    {{--                            @foreach($country_master_list as $country_master)--}}
                    {{--                                <option value="{{$country_master}}"--}}
                    {{--                                        {{@$userContactInformation->country == $country_master ? 'selected' : ''}}>{{$country_master}}</option>--}}
                    {{--                            @endforeach--}}
                    {{--                        </select>--}}
                    {{--                    </div>--}}
                    <div class="col-6 mb-3">
                        <label for="cv_ci_city" class="form-label">Şehir</label>
                        <select class="select2 form-select" id="cv_ci_city"
                                name="cv_ci_city">
                            @foreach($country_list as $country)
                                <option value="{{$country['name']}}" {{@$userContactInformation->city ==
                                $country['name'] ? 'selected' : ''}}>{{$country['name']}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6 mb-3">
                        <label for="cv_ci_web_page" class="form-label">Web Sayfam</label>
                        <input type="text" class="form-control" id="cv_ci_web_page"
                               name="cv_ci_web_page"
                               value="{{@$userContactInformation->web_page}}">
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
@section('cv-contact-information-scripts')
    <script>
        $(document).on('submit', '#cv-contact-information', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var url = $(this).attr('action-data');
            var formData = new FormData();
            formData.append('_token', $('input[name="_token"]').val());
            formData.append('cv_ci_name', $('input[name="cv_ci_name"]').val());
            formData.append('cv_ci_surname', $('input[name="cv_ci_surname"]').val());
            formData.append('cv_ci_degree', $('input[name="cv_ci_degree"]').val());
            formData.append('cv_ci_email', $('input[name="cv_ci_email"]').val());
            formData.append('cv_ci_birthday', $('input[name="cv_ci_birthday"]').val());
            formData.append('cv_ci_phone_number', $('input[name="cv_ci_phone_number"]').val());
            formData.append('cv_ci_phone_number_alternative', $('input[name="cv_ci_phone_number_alternative"]').val());
            // formData.append('cv_ci_country',$('select[name="cv_ci_country"]').val());
            formData.append('cv_ci_city', $('select[name="cv_ci_city"]').val());
            formData.append('cv_ci_web_page', $('input[name="cv_ci_web_page"]').val());
            formData.append('cv_ci_image', $('input[type="file"]')[0].files[0]);
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                contentType: false,
                enctype: 'multipart/form-data',
                processData: false,
                success: function (response) {
                    showSuccessAlertWithReload(response.message);
                    $('#cv_ci_city').trigger('change');
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertViewContactInformation(response.responseJSON.errors);
                    $('#errorsContactInformation').html(viewError);
                },
            });
        });

        function addErrorAlertViewContactInformation(errors) {
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