<!-- Styles -->

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css"/>
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.min.css"/>
<!-- Or for RTL support -->
<link rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.2.0/dist/select2-bootstrap-5-theme.rtl.min.css"/>
<link rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.7.14/css/bootstrap-datetimepicker.min.css">
<!-- Fonts -->
<link rel="dns-prefetch" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">

<style>
    #searchArea input, #searchArea select, #searchArea button {
        box-shadow: none !important;
    }

    a {
        text-decoration: none;
        color: inherit;
    }

    a:hover {
        color: deeppink;
    }

    .select2-container *:focus {
        outline: none;
    }

    .select2-container--bootstrap-5.select2-container--focus .select2-selection, .select2-container--bootstrap-5
    .select2-container--open .select2-selection {
        box-shadow: none !important;
    }

    .select2-container .select2-choice, .select2-result-label {
        font-size: 1em;
        height: 20px;
        overflow: auto;
    }

    .select2-container--bootstrap-5 .select2-dropdown .select2-search .select2-search__field {
        font-size: 0.6rem;
    }

    .select2-container--bootstrap-5 .select2-selection--single .select2-selection__rendered {
        font-size: 0.9rem;
    }

    .nav-pills .nav-link.active, .nav-pills .show > .nav-link {
        background-color: #0dd0fd;
    }
    .nav-link {
        display: block;
        padding: 0.5rem 1rem;
        color: #9f00f8;
        text-decoration: none;
        transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out;
    }
    .nav-tabs .nav-link.active, .nav-tabs .nav-item.show .nav-link {
        color: #8a4c75;
        background-color: inherit;
        border-color: #dee2e6 #dee2e6 #f8fafc;
    }
    label{
        color: #9f00f8;
    }
    .form-control, .form-select, .form-check, .form-label {
         background-color: inherit;
    }

    .select2-container--bootstrap-5 .select2-dropdown .select2-results__options .select2-results__option {
        padding: .375rem .75rem;
        font-size: 0.9rem;
        font-weight: 400;
        line-height: 1.5;
    }

    .select2 ~ .select2-container--bootstrap-5 .select2-selection--multiple .select2-selection__rendered
    .select2-selection__choice {
        font-size: 0.700rem;
    }

    .select2-container--bootstrap-5 .select2-dropdown .select2-results__options .select2-results__option {
        padding: .375rem .75rem;
        font-size: 0.8rem;
        font-weight: 400;
        line-height: 1.5;
    }

    .select2-container--bootstrap-5 .select2-dropdown .select2-results__options:not(.select2-results__options--nested) {
        max-height: 10rem;
        overflow-y: auto;
    }

    .select2-arrow, .select2-chosen {
        padding-top: 6px;
    }

    #dropdownEmployer:hover .dropdown-menu {
        display: block;
        margin-top: 0;
    / / remove the gap so it doesn 't close
    }

    .imagePreview {
        width: 100px;
        height: 150px;
        background-position: center center;
        background:url(http://cliquecities.com/assets/no-image-e3699ae23f866f6cbdf8ba2443ee5c4e.jpg);
        background-color:#fff;
        background-repeat: no-repeat;
        background-size: contain;
        background-repeat: no-repeat;
        display: inline-block;
        box-shadow:0px -3px 6px 2px rgba(0,0,0,0.2);
    }
    .btn-primary-ex
    {
        display:block;
        border-radius:0px;
        box-shadow:0px 4px 6px 2px rgba(0,0,0,0.2);
        margin-top:-5px;
    }
    .imgUp
    {
        margin-bottom:15px;
    }

    @yield('styles')
</style>