$(document).ready(function () {


   treeSelectClasss = document.querySelectorAll('.treeSelect');

   treeSelectClasss.forEach((item, key) => {

        let id = 'treeSelect_' + key;

        item.id = id;
        item.classList.add(id);

        $(`#treeSelect_${key}`).treeSelection({
            multiple: 10,
        });

   });

});
