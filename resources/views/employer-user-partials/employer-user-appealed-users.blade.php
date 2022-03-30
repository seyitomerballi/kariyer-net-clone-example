@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">w
                    <div class="card-body">
                        <table class="table table-striped table-condensed dataTable"
                               data-action="{{$dataTableRoute}}"
                               style="width:100%">
                            <thead>
                            <tr></tr>
                            </thead>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    @yield('settings-scripts')
    @yield('cv-scripts')
    @yield('table-emp-advertisements-scripts')
@endsection