$(document).ready(function () {
    
})

function list(route, table, type) {
    var url = Routing.generate(route, {
        'type': type
    })
    var col = []
    $.ajax({
        type: $(this).attr('method'),
        url: url,
        data: $(this).serialize(),
        success: function (data) {
            if (jQuery.isEmptyObject(data.data[0])) {
                $(table).DataTable();
            } else {
                $(table).dataTable().fnDestroy();
                $.each(data.data[0], function (key, value) {
                    col.push({
                        "data": key
                    })
                });

                $(table).DataTable({
                    "ajax": url,
                    "sAjaxDataProp": "data",
                    "searching": true,
                    "order": [
                        [0, "desc"]
                    ],
                    "columns": col,
                    "responsive": true,
                    "autoWidth": false,
                    'columnDefs': [{
                        'targets': [col.length - 1],
                        'orderable': false,
                    }]
                });

            }
        },
        error: function (response) {
            console.log(response)
        }
    });
}

function del(route, btn, dataTable) {
    $(document).on("click", btn, async function (e) {
        swal({
                title: "Azonao antoka ve fa ho fafaina?",
                text: "Tsy azo averina io hetsika io!",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            })
            .then((willDelete) => {
                if (willDelete) {
                    var url = Routing.generate(route, {
                        'id': $(this).attr('id')
                    });

                    axios.delete(url)
                        .then(response => {
                            $(dataTable).DataTable().ajax.reload();
                            swal("Voafafa soa aman-tsara", {
                                icon: "success",
                            });
                        })
                        .catch(response => {})
                } else {

                }
            });
    });
}