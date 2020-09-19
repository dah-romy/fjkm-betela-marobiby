$(document).ready(function () {
})

function list(route, table, type, id) {
    var url = Routing.generate(route, {
        'type': type,
        'id': id
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

function btnAdd(btnAdd, idModal, route, id) {
    $(document).on("click", btnAdd, function (e) {
        e.preventDefault()
        var sampana = $(this).attr('id')
        showModal(idModal, route, id, sampana);
    })
}

function showModal(idModal, route, id, sampana) {
    $(idModal).one('shown.bs.modal', async function (e) {
        e.preventDefault()

        var url = Routing.generate(route, {
            'id': id,
            'sampana': sampana
        })

        var modal = $(this);
        axios.get(url)
            .then(response => {
                modal.find('.modal-content').html(response.data);
                $('input:text:visible:first').focus();
            })
    });
}

function add(route, form, modal, dataTable, id) {
    $(document).on('submit', form,async function (e) {

        e.preventDefault();
        var sampana = $(this).attr('class');

        var url = Routing.generate(route, {
            'id' : id,
            'sampana': sampana
        })

        var data =  $(this).serialize()
        $form = $(e.target);
        modal = $(modal);
        var $submitButton = $form.find(':submit');
        $submitButton.html('<i class="fas fa-spinner fa-pulse"></i>');
        $submitButton.prop('disabled', true);

        $.ajax({
            type: $(this).attr('method'),
            url: url,
            data: data,
            success: function (data) {
                $submitButton.html('<i class="fas fa-check"></i>');
                $submitButton.prop('disabled', true);
                if (sampana) {
                    toastr.success('Voahitsy soa aman-tsara');
                }else{
                    toastr.success('Tafidira soa aman-tsara');
                }
                modal.modal('toggle');
                modal.find('.modal-content').html('');
                $(dataTable).DataTable().ajax.reload();
            },
            error: function (response) {
                $submitButton.html('Ajouter');
                $submitButton.prop('disabled', false);
                $.each(response, function (key, value) {
                    $(".message").html(value.message);
                });
                $("#error_message").removeClass();
                $("#error_message").addClass("form-group row");
            }
        });
    });
}