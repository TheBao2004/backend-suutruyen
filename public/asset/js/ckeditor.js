


$(document).ready(function () {

    ckeditorClasss = document.querySelectorAll('.ckeditor');

    if(ckeditorClasss !== null){

        ckeditorClasss.forEach((item, key) => {

            let id = 'ckeditor_' + key;

            item.id = id;

            $(`#ckeditor_${key}`).ckeditor();

        });

    }



});
