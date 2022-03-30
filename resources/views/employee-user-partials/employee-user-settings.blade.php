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
        <form class="p-2" id="employee-user-information" action="{{$updateUserInformationUrl}}">
            @csrf
            <div class="row mb-3">
                <label for="name" class="col-md-4 col-form-label text-md-end">
                    Adı </label>
                <div class="col-md-6">
                    <input id="name" type="text"
                           class="form-control"
                           name="name"
                           value="{{ $currentUser->name }}"
                           autocomplete="name" autofocus>
                </div>
            </div>
            <div class="row mb-3">
                <label for="surname" class="col-md-4 col-form-label text-md-end">
                    Soyadı </label>
                <div class="col-md-6">
                    <input id="surname"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="surname" value="{{ $currentUser->surname }}"
                           autocomplete="surname">
                </div>
            </div>
            <div class="row mb-3">
                <label for="phone" class="col-md-4 col-form-label text-md-end">
                    Telefon </label>
                <div class="col-md-6">
                    <input id="phone"
                           type="text"
                           class="form-control @error('name') is-invalid @enderror"
                           name="phone" value="{{ $currentUser->phone_number }}"
                           autocomplete="surname">
                </div>
            </div>
            <div class="row mb-3">
                <label for="email" class="col-md-4 col-form-label text-md-end">
                    E-Mail </label>
                <div class="col-md-6">
                    <input id="email" type="email"
                           class="form-control @error('email') is-invalid @enderror"
                           name="email" value="{{ $currentUser->email }}"
                           autocomplete="email">
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
    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
        <div id="errorsUpdatePassword" class="mt-1"></div>
        <form class="p-2" id="employee-user-password" action="{{$updateUserPasswordUrl}}">
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
@section('settings-scripts')
    <script>
        $('#employee-user-information').on('submit', function (e) {
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
                    $('#name').val(response.user.name);
                    $('#surname').val(response.user.surname);
                    $('#phone').val(response.user.phone_number);
                    $('#email').val(response.user.email);
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertView(response.responseJSON.errors);
                    $('#errorsUpdateInformation').html(viewError);
                },
            });
        });
        $('#employee-user-password').on('submit', function (e) {
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
                    $('#employee-user-password').children().find('.is-invalid').removeClass('is-invalid');
                    $('#currentPassword').val('');
                    $('#password').val('');
                    $('#password_confirmation').val('');
                    $('#errorsUpdatePassword').html('');
                },
                error: function (response) {
                    $('#employee-user-password').children().find('.is-invalid').removeClass('is-invalid');
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
    </script>
@endsection