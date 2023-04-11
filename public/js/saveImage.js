$(function () {

    var uploadedDocumentMap = {}
    const dropZoneConf = {
        paramName: "images", // The name that will be used to transfer the file
        //autoProcessQueue: false,
        maxFilesize: 5, // MB
        clickable: true,
        addRemoveLinks: true,
        acceptedFiles: 'image/*',
        dictFallbackMessage: " المتصفح الخاص بكم لا يدعم خاصيه تعدد الصوره والسحب والافلات ",
        dictInvalidFileType: "لايمكنك رفع هذا النوع من الملفات ",
        dictCancelUpload: "الغاء الرفع ",
        dictCancelUploadConfirmation: " هل انت متاكد من الغاء رفع الملفات ؟ ",
        dictRemoveFile: "حذف الصوره",
        dictMaxFilesExceeded: "لايمكنك رفع عدد اكثر من هضا ",
        headers: {
            'X-CSRF-TOKEN': $(".csrf_value").val()
        },

        url: $(".save_images_url").val(), // Set the url

        success:
            function (file, response) {
                $('form').append('<input type="hidden" name="images[]" value="' + response.name + '">')
                uploadedDocumentMap[file.name] = response.name
            }
        ,
        removedfile: function (file) {

            console.log(file.xhr.response);

            file.previewElement.remove()

            $.ajax({
                url: $(".delete_image_url").val()+"/"+file.xhr.response
            });

        }

    }


    $(".saveAlbumImages").dropzone(dropZoneConf);
});

