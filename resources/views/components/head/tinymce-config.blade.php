<script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
<script>
  tinymce.init({
    selector: 'textarea#myeditorinstance', // Replace this CSS selector to match the placeholder element for TinyMCE
    plugins: 'code table lists',
    toolbar: 'undo redo | blocks | bold italic | alignleft aligncenter alignright | indent outdent | bullist numlist | code | table',
    content_style: `
            body {
                background-color: #2d3035;
                color: #ffff;
                font-family: Arial, sans-serif; /* Optional: Font family */
                font-size: 14px; /* Optional: Font size */
            }
        `
  });
</script>
