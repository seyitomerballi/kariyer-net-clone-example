@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ $title }}</div>
                    <div class="card-body">
                        <div id="errors"></div>
                        <form id="{{$form['name']}}" action="{{$actionUrl}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end"> Adı </label>
                                <div class="col-md-6">
                                    <input id="name" type="text"
                                           class="form-control"
                                           name="name"
                                           value="{{ old('name') }}"
                                           autocomplete="name" autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="surname" class="col-md-4 col-form-label text-md-end"> Soyadı </label>
                                <div class="col-md-6">
                                    <input id="surname"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="surname" value="{{ old('surname') }}"
                                           autocomplete="surname">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="phone" class="col-md-4 col-form-label text-md-end"> Telefon </label>
                                <div class="col-md-6">
                                    <input id="phone"
                                           type="text"
                                           class="form-control @error('name') is-invalid @enderror"
                                           name="phone" value="{{ old('phone') }}"
                                           autocomplete="surname">
                                </div>
                            </div>
                            @if($url === 'employer_user')
                                <div class="row mb-3">
                                    <label for="company_name" class="col-md-4 col-form-label text-md-end"> Şirket Adı
                                    </label>
                                    <div class="col-md-6">
                                        <input id="company_name"
                                               type="text"
                                               class="form-control @error('name') is-invalid @enderror"
                                               name="company_name" value="{{ old('company_name') }}"
                                               autocomplete="company_name">
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="country" class="col-md-4 col-form-label text-md-end"> İl </label>
                                    <div class="col-md-6">
                                        <select id="country" name="country" class="form-select" aria-label="İl">
                                            <option value="0" disabled selected>--Seçiniz--</option>
                                            @foreach($country_list as $country)
                                                <option value="{{$country['name']}}">{{$country['name']}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label for="district" class="col-md-4 col-form-label text-md-end"> İlçe </label>
                                    <div class="col-md-6">
                                        <select id="district" name="district" class="form-select" aria-label="İlçe">
                                            <option value="0" disabled selected>--Seçiniz--</option>
                                        </select>
                                    </div>
                                </div>
                            @endif
                            <div class="row mb-3">
                                <label for="email" class="col-md-4 col-form-label text-md-end"> E-Mail </label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password" class="col-md-4 col-form-label text-md-end">Şifre</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror"
                                           name="password" autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Şifre
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
                                        Kayıt Ol
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script type="text/javascript">

        let formName = "#{{$form['name']}}";
        $(`${formName}`).on('submit', function (e) {
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
                    window.location = response.redirect;
                },
                error: function (response) {
                    $(`${formName}`).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertView(response.responseJSON.errors);
                    $('#errors').html(viewError);
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
                    $.each(districtList,function (key,val){
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