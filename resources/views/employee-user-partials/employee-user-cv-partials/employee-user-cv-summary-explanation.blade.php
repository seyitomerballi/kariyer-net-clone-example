<div id="errorsSummaryExplanation" class="mt-1"></div>
<form id="cv-summary-explanation"
      action-data="{{route('cv.updateSummaryExplanation')}}">
    <div class="card mt-3 p-2">
    <textarea class="texteditor" name="cv_se_description"
              id="cv_se_description">{{@$userSummaryExplanation->desc}}</textarea>
        <div class="row mt-2 mb-0 p-3">
            <button type="submit" class="btn btn-primary rounded">
                Kaydet
            </button>
        </div>
    </div>
</form>


@section('cv-summary-explanation-scripts')

    <script>
        $(document).ready(function (){
            var desc = "{{@$userSummaryExplanation->desc}}";
            $('#cv_se_description').val(desc);
        });
        $(document).on('submit', '#cv-summary-explanation', function (e) {
            e.preventDefault();
            e.stopImmediatePropagation();
            var url = $(this).attr('action-data');
            var formData = $(this).serialize();
            $.ajax({
                url: url,
                type: 'POST',
                data: formData,
                success: function (response) {
                    showSuccessAlertWithReload(response.message);
                },
                error: function (response) {
                    $(this).children().find('.is-invalid').removeClass('is-invalid');
                    if (response.responseJSON.errors)
                        var viewError = addErrorAlertViewSummaryExplanation(response.responseJSON.errors);
                    $('#errorsSummaryExplanation').html(viewError);
                },
            });
        });

        function addErrorAlertViewSummaryExplanation(errors) {
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