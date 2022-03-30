<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>İş Bul</title>
    @include('layouts.header.header_script')
    @include('layouts.header.header_style')
</head>
<body>
<nav class="navbar navbar-expand-md navbar-light navbar-dark navbar-laravel text-dark border-bottom
    border-2 border-primary"
     style="background-color:#cfe2ff">
    <div class="container">
        <a class="navbar-brand text-dark" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>
        <nav id="navbarSupportedContent" class="navbar-collapse collapse d-flex justify-content-between">
            <!-- Left Side Of Navbar -->
            <div class="ms-auto me-auto col-6">
                <form action="{{route('all_advertisement')}}">
                    <div class="w-auto" id="searchArea">
                        <div class="input-group bg-white" style="max-width: 700px">

                            <select id="searchCountries" name="c" class="form-select select2 w-25">
                                <option value="0" disabled selected>İl</option>
                            </select>
                            <input type="text" class="form-control bg-white w-50" name="search"
                                   placeholder="Pozisyon,Firma Adı,Sektör, Şehir"
                                   aria-label="Recipient's username" aria-describedby="button-addon2">

                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Ara</button>

                        </div>
                </form>
            </div>
    </div>
    <div>
        @if(Auth::guard('employee_user')->check())
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="menuEmployee"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::guard('employee_user')->user()->name}} {{Auth::guard('employee_user')
                                    ->user()->surname}}
                </button>
                <ul class="dropdown-menu dropdown-menu-start"
                    aria-labelledby="menuEmployee">
                    <li><a class="dropdown-item" href="{{route('employee_index')}}">Profil</a>
                    </li>
                    <li>
                        <form class="m-0 p-0" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Çıkış</button>
                        </form>
                    </li>
                </ul>
            </div>

        @elseif(Auth::guard('employer_user')->check())
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="menuEmployer"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    {{Auth::guard('employer_user')->user()->name}} {{Auth::guard('employer_user')
                                    ->user()->surname}}
                </button>
                <ul class="dropdown-menu dropdown-menu-start"
                    aria-labelledby="menuEmployer">
                    <li><a class="dropdown-item" href="{{route('employer_index')}}">Profil</a>
                    </li>
                    <li>
                        <form class="m-0 p-0" method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="dropdown-item" type="submit">Çıkış</button>
                        </form>
                    </li>
                </ul>
            </div>
        @else
            <a class="btn btn-primary" href="{{route('employee_user.register_form')}}" role="button">Üye
                Ol</a>
            <a class="btn btn-dark" href="{{route('employee_user.login_form')}}" role="button">Üye
                Girişi</a>
            <div class="btn-group">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownEmployer"
                        data-bs-toggle="dropdown" aria-expanded="false">
                    İş Veren
                </button>
                <ul class="dropdown-menu dropdown-menu-start"
                    aria-labelledby="dropdownEmployer">
                    <li><a class="dropdown-item" href="{{route('employer_user.login_form')}}">Giriş
                            Yap</a>
                    </li>
                    <li><a class="dropdown-item" href="{{route('employer_user.register_form')}}">Üye
                            Ol</a>
                    </li>
                </ul>
            </div>
        @endif
    </div>
</nav>

</div>
</nav>
<main class="py-5">
    @yield('content')
</main>
</div>
<script src="{{ asset('js/app.js') }}"></script>
@include('layouts.footer.footer_script')
<script>

    $('.select2').select2({
        theme: 'bootstrap-5',
        width: 'resolve',
    });

    $(document).ready(function () {
        var url = "{{route('country.getList')}}";
        $.ajax({
            url: url,
            type: "GET",
            dataType: 'json',
            success: function (response) {
                var countries = response.data.countries;
                var optionView = ``;
                $.each(countries, function (key, val) {
                    optionView += `<option value="${val.name}">${val.name}</option>`;
                });
                $('#searchCountries').append(optionView).trigger('change');
            },
            error: function (response) {
                alert(response.message);
            },
        });
    });
</script>
</body>
</html>