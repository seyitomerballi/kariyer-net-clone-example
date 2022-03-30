<!-- Scripts -->
<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
    tinymce.init({
        selector: 'textarea.texteditor', // Replace this CSS selector to match the placeholder element for TinyMCE
        plugins: 'table',
        toolbar: 'undo redo | formatselect | bold italic | alignleft aligncenter alignright | indent outdent | ' +
            'bullist' + ' numlist | code | table',
        statusbar: false,
        menubar:false,
        setup: function (editor) {
            editor.on('change', function () {
                editor.save();
            });
        }
    });
</script>
{{--<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>--}}