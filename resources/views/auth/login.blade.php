@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{$title}}</div>

                    <div class="card-body">
                        <form id="{{$form['name']}}" method="POST" action="{{$actionUrl}}">
                            @csrf

                            <div class="row mb-3">
                                <label for="email"
                                       class="col-md-4 col-form-label text-md-end">Email</label>
                                <div class="col-md-6">
                                    <input id="email" type="email"
                                           class="form-control @error('email') is-invalid @enderror" name="email"
                                           value="{{ old('email') }}" required autocomplete="email" autofocus>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                       class="col-md-4 col-form-label text-md-end">Şifre</label>
                                <div class="col-md-6">
                                    <input id="password" type="password"
                                           class="form-control @error('password') is-invalid @enderror" name="password"
                                           required autocomplete="current-password">
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember"
                                               id="remember" {{ old('remember') ? 'checked' : '' }}>
                                        <label class="form-check-label" for="remember">
                                            Beni Hatırla
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="row mb-0">
                                <div class="col-md-8 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Giriş Yap
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
    <script>
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
    </script>
@endsection
