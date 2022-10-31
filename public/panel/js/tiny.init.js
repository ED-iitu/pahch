$(function() {
    tinymce.init({
        selector: '.tiny',
        body_id: 'tiny',
        plugins: 'image code,link',
        language_url : '/js/ru.js',
        language: 'ru',
        images_upload_url: '/admin/upload?_token='+$('meta[name="csrf-token"]').attr('content'),
        images_upload_credentials: true,
        convert_urls: false,
        toolbar: 'undo redo | link image | code | link',
        image_title: true,
        automatic_uploads: true,
        file_picker_types: 'image',
        file_picker_callback: function(cb, value, meta) {
            var input = document.createElement('input');
            input.setAttribute('type', 'file');
            input.setAttribute('accept', 'image/*');
            input.onchange = function() {
                var file = this.files[0];
                var reader = new FileReader();
                reader.onload = function () {
                    var id = 'blobid' + (new Date()).getTime();
                    var blobCache =  tinymce.activeEditor.editorUpload.blobCache;
                    var base64 = reader.result.split(',')[1];
                    var blobInfo = blobCache.create(id, file, base64);
                    blobCache.add(blobInfo);
                    cb(blobInfo.blobUri(), { title: file.name });
                };
                reader.readAsDataURL(file);
            };
            input.click();
        }
    });
    // hz che ne pashet
    // tinymce.util.XHR.on('beforeSend', function(e) {
    //     e.xhr.setRequestHeader('X-CSRF-TOKEN', $('meta[name="csrf-token"]').attr('content'));
    // });
    $(".tiny").closest("form").on("submit",function () {
        tinyMCE.triggerSave();
        $(this).submit();
    })
});
