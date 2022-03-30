<nav>
    <div class="nav nav-tabs" id="nav-tab" role="tablist">
        <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab"
                data-bs-target="#nav-home" type="button" role="tab"
                aria-controls="nav-home" aria-selected="true">Kullanıcı
            Bilgileri
        </button>
        <button class="nav-link" id="nav-profile-tab" data-bs-toggle="tab"
                data-bs-target="#nav-profile" type="button" role="tab"
                aria-controls="nav-profile" aria-selected="false">Şifre
        </button>
    </div>
</nav>
<div class="tab-content" id="nav-tabContent">
    <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
        <div id="errorsUpdateInformation" class="mt-1"></div>
        <form class="p-2" id="employer-user-information" action="{{$updateUserInformationUrl}}">
            @csrf
            <div class="row">
                <div class="col-6 my-1">
                    <label for="name" class="form-label">
                        Adı </label>
                    <input id="name" type="text"
                           class="form-control"
                           name="name"
                           value="{{ $currentUser->name }}"
                           autocomplete="name" autofocus>
                </div>
                <div class="col-6 my-1">
                    <label for="surname" class="form-label">
                        Soyadı </label>
                    <input id="surname"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="surname" value="{{ $currentUser->surname }}"
                           autocomplete="surname">
                </div>
                <div class="col-6 my-1">
                    <label for="phone" class="form-label">
                        Telefon </label>
                    <input id="phone"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="phone" value="{{ $currentUser->phone_number }}"
                           autocomplete="surname">
                </div>
                <div class="col-6 my-1">
                    <label for="email" class="form-label text-md-end">
                        E-Mail </label>
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $currentUser->email }}"
                           autocomplete="email">
                </div>
                <div class="col-6 my-1">
                    <label for="company_name" class="form-label text-md-end"> Şirket Adı
                    </label>
                    <input id="company_name"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="company_name" value="{{$currentUser->company_name}}"
                           autocomplete="company_name">
                </div>
                <div class="col-6 my-1">
                    <label for="country" class="form-label text-md-end"> İl </label>
                    <select id="country" name="country" class="form-select" aria-label="İl">
                        <option value="0" disabled selected>--Seçiniz--</option>
                        @foreach($country_list as $country)
                            <option value="{{$country['name']}}" {{$currentUser->country === $country['name'] ? 'selected' : ''}}>{{$country['name']}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="district" class="form-label text-md-end"> İlçe </label>
                    <select id="district" name="district" class="form-select" aria-label="İlçe">
                        <option value="0" disabled selected>--Seçiniz--</option>
                        @foreach($district_list as $district)
                            <option value="{{$district}}" {{$currentUser->district === $district ? 'selected' :
                            ''}}>{{$district}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="sector" class="form-label text-md-end"> Sektör </label>
                    <select id="sector" name="sector" class="select2 form-select form-select-sm"
                            aria-label="Sektör">
                        @foreach($sector_list as $key => $sector)
                            <option value="{{$sector->id}}">{{$sector->title}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-6 my-1">
                    <label for="foundation_year" class="form-label text-md-end"> Kuruluş Yılı </label>
                    <input id="foundation_year"
                           type="date"
                           class="form-control @error('name') is-invalid @enderror"
                           name="foundation_year" value="{{$currentUser->foundation_year ?? ''}}"
                           autocomplete="foundation_year">
                </div>
                <div class="col-6 my-1">
                    <label for="address" class="form-label text-md-end"> Adres </label>
                    <textarea id="address"
                              class="form-control @error('name') is-invalid @enderror"
                              name="address" autocomplete="foundation_year">{{$currentUser->address ?? ''}}</textarea>
                </div>
                <div class="col-6 my-1">
                    <label for="description" class="form-label text-md-end"> Açıklama </label>
                    <textarea id="description"
                              class="form-control @error('name') is-invalid @enderror"
                              name="description" autocomplete="description">{{$currentUser->address ?? ''}}</textarea>
                </div>
            </div>
            <hr class="mt-1">
            <div class="my-2 offset-11">
                <button type="submit" class="btn btn-primary">
                    Kaydet
                </button>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div id="errorsUpdatePassword" class="mt-1"></div>
        <form class="p-2" id="employer-user-password" action="{{$updateUserPasswordUrl}}">
            @csrf
            <div class="row mb-3">
                <label for="currentPassword"
                       class="col-md-4 col-form-label text-md-end">Mevcut Şifre</label>
                <div class="col-md-6">
                    <input id="currentPassword" type="password"
                           class="form-control @error('currentPassword') is-invalid @enderror"
                           name="currentPassword" autocomplete="current-password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password"
                       class="col-md-4 col-form-label text-md-end">Yeni Şifre</label>
                <div class="col-md-6">
                    <input id="password" type="password"
                           class="form-control @error('password') is-invalid @enderror"
                           name="password" autocomplete="new-password">
                </div>
            </div>
            <div class="row mb-3">
                <label for="password_confirmation"
                       class="col-md-4 col-form-label text-md-end">Yeni Şifre
                    Onaylama</label>
                <div class="col-md-6">
                    <input id="password_confirmation" type="password"
                           class="form-control" name="password_confirmation"
                           autocomplete="new-password">
                </div>
            </div>

            <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        Kaydet
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@section('user-settings-scripts')
    <script>
        $(document).ready(function () {
            var sector = "{{$currentUser->sector}}";
            $('#country').trigger('change');
            if (sector !== '')
            $('#sector').val(sector).trigger('change');
        });
        $('#employer-user-information').on('submit', function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var form = $(this).serialize();
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                dataType: 'json',
                success: function (response) {
                    showSuccessAlert(response.message);
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertView(response.responseJSON.errors);
                    $('#errorsUpdateInformation').html(viewError);
                },
            });
        });
        $('#employer-user-password').on('submit', function (e) {
            e.preventDefault();
            var url = $(this).attr('action');
            var form = $(this).serialize();
            $.ajax({
                url: url,
                type: "POST",
                data: form,
                dataType: 'json',
                success: function (response) {
                    showSuccessAlert(response.message);
                    $('#employer-user-password').children().find('.is-invalid').removeClass('is-invalid');
                    $('#currentPassword').val('');
                    $('#password').val('');
                    $('#password_confirmation').val('');
                    $('#errorsUpdatePassword').html('');
                },
                error: function (response) {
                    $('#employer-user-password').children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertView(response.responseJSON.errors);
                    $('#errorsUpdatePassword').html(viewError);
                },
            });
        });

        function addErrorAlertView(errors) {
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

        @if($url === 'employer_user')
        $('#country').on('change', function () {
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
                    $('#district').html('');
                    var districtList = response.data.districts;
                    var optionView = ``;
                    $.each(districtList, function (key, val) {
                        optionView += `<option value="${val}">${val}</option>`;
                    });
                    $('#district').append(optionView);
                },
                error: function (response) {
                    alert(response.message);
                },
            });
        });
        @endif
    </script>
@endsection