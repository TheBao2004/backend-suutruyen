
$(document).ready(function () {

    new DataTable('#table_seven', {
        pageLength: 7,
        lengthMenu: [7, 5, 10, 15, 20],
        order: [[0, 'desc']],
        language: {
            "emptyTable": "Không có dữ liệu trong bảng",
            "lengthMenu": "Hiển thị _MENU_ mục",
            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
            "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
            "infoFiltered": "(được lọc từ tổng số _MAX_ mục)",
            "search": "Tìm kiếm:",
            // "paginate": {
            //     "first": "Đầu",
            //     "last": "Cuối",
            //     "next": "Tiếp",
            //     "previous": "Trước"
            // },
            "columnDefs": [
                { "searchable": true, "targets": [0, 1, 2, 3] }, // Tìm kiếm trong cột 1 và cột 3
                { "searchable": false, "targets": [4] } // Không tìm kiếm trong cột 2
            ],
            "pagingType": "simple_numbers",
        }
    });


    new DataTable('#table_five', {
        pageLength: 5,
        lengthMenu: [5, 10, 15, 20],
        order: [[0, 'desc']],
        language: {
            "emptyTable": "Không có dữ liệu trong bảng",
            "lengthMenu": "Hiển thị _MENU_ mục",
            "zeroRecords": "Không tìm thấy dữ liệu phù hợp",
            "info": "Hiển thị _START_ đến _END_ của _TOTAL_ mục",
            "infoEmpty": "Hiển thị 0 đến 0 của 0 mục",
            "infoFiltered": "(được lọc từ tổng số _MAX_ mục)",
            "search": "Tìm kiếm:",
            // "paginate": {
            //     "first": "Đầu",
            //     "last": "Cuối",
            //     "next": "Tiếp",
            //     "previous": "Trước"
            // },
            "columnDefs": [
                { "searchable": true, "targets": [0, 1, 2, 3] }, // Tìm kiếm trong cột 1 và cột 3
                { "searchable": false, "targets": [4] } // Không tìm kiếm trong cột 2
            ],
            "pagingType": "simple_numbers",
        }
    });












});
