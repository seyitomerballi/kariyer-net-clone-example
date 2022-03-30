@extends('layouts.auth')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex align-items-start">
                            <div class="nav flex-column nav-pills me-3" id="v-pills-tab" role="tablist"
                                 aria-orientation="vertical">
                                <button class="nav-link active" id="v-pills-settings-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-settings" type="button" role="tab"
                                        aria-controls="v-pills-settings" aria-selected="true">Ayarlar
                                </button>
                                <button class="nav-link" id="v-pills-advertisements-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-advertisements" type="button" role="tab"
                                        aria-controls="v-pills-advertisements" aria-selected="false">Verdiğiniz İlanlar
                                </button>
                                <button class="nav-link" id="v-pills-new-advertisement-tab" data-bs-toggle="pill"
                                        data-bs-target="#v-pills-new-advertisement" type="button" role="tab"
                                        aria-controls="v-pills-new-advertisement" aria-selected="false">İş İlanı Oluştur
                                </button>
                            </div>
                            <div class="vr col-1"></div>
                            <div class="tab-content col-10" id="v-pills-tabContent">
                                <div class="tab-pane fade show active" id="v-pills-settings" role="tabpanel"
                                     aria-labelledby="v-pills-settings-tab">
                                    <div class="mx-2">
                                        @include('employer-user-partials.employer-user-settings')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-advertisements" role="tabpanel"
                                     aria-labelledby="v-pills-advertisements-tab">
                                    <div class="mx-2">
                                        @include('employer-user-partials.employer-user-advertisements')
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="v-pills-new-advertisement" role="tabpanel"
                                     aria-labelledby="v-pills-new-advertisement-tab">
                                    <div class="mx-2">
                                        @include('employer-user-partials.employer-user-new-advertisement')
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        function clearForm(form) {
            $.each(form.find('input'), function (key, val) {
                if ($(val).attr('id') === 'new_ad_employer_user'){
                    return;
                }
                if ($(val).attr('type') === "number") {
                    $(val).val(30);
                } else {
                    $(val).val('');
                }
            });
            $.each(form.find('select'), function (key, val) {
                if ($(val).attr('multiple')) {
                    $(val).val(null).trigger('change');
                }
                if ($(val).find('option') > 0) {
                    $(val).val('').trigger('change');
                }
            });
            $.each(form.find('textarea'), function (key, val) {
                $(val).text('');
            });
        }
    </script>
    @yield('user-settings-scripts')
    @yield('new-advertisement-scripts')
    @yield('table-advertisements-scripts')
@endsection