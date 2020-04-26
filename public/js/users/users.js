$(document).ready(function () {

    // $("#users_modal").modal({ dismissible: true })

    let users = [], url = '', method = ''

    var TableDatatablesManaged = function () {

        var initTable = function () {
            load();

        }

        return {

            //main function to initiate the module
            init: function () {
                if (!jQuery().dataTable) {
                    return;
                }
                initTable();
            }

        };

    }();

    function load() {
        var user = JSON.parse(localStorage.getItem('user'))
        console.log(user.token)
        $.ajax({
            url: "api/users",
            type: "GET",
            headers: {
                "Authorization": `Bearer ${user.token}`
            },


        })

            .done(function (response) {
                console.log(response)
                if (response.users != 0) {
                    // console.log(response.users[0]);
                    users = response.users;
                    console.log(response)
                    renderDatatable(response);
                } else {
                    swal({
                        title: "¡¡ Aviso !!",
                        icon: "info",
                        text: "Aun no hay informacion alamacenada",
                    });
                }
            })
            .fail(function (error) {
                console.log(error);
            });
    }


    jQuery(document).ready(function () {
        TableDatatablesManaged.init();

    });


    function renderDatatable(response) {
        console.log()
        var isDataTable = $.fn.DataTable.isDataTable('table');
        if (isDataTable) {
            $('#users_table').dataTable().fnClearTable();
            $('#users_table').dataTable().fnDestroy();

            console.log('entro a esta condicion 1')
        }
        else {

            console.log('entro a esta condicion 2')
        }


        if (response.users != 0) {
            let my_columns = []
            $.each(response.users[0], function (key, value) {
                var my_item = {};
                let acciones = '';
                // my_item.class = "filter_C";
                my_item.data = key;

                if (key == 'created_at') {

                    my_item.title = 'Editar';
                    // let editar = response.permisos.filter(d => d.slug == "medicoTipoPatrons.edit");
                    if (true) {

                        my_item.render = function (data, type, row) {
                            return `<div align="center">
                                <a href="#users_modal" data-method="put" data-id="${row.id}" class="editar btn modal-trigger btn-success" data-method="put" id="editar">
                                    Editar
                                </a>
                            </div>`
                        }
                    }
                    my_columns.push(my_item);

                }

                if (key == 'updated_at') {

                    my_item.title = 'Eliminar';
                    // let eliminar = response.permisos.filter(d => d.slug == "medicoTipoPatrons.destroy");
                    if (true) {

                        my_item.render = function (data, type, row) {
                            return `<div align="center">
                                <a href="#!" data-method="delete"data-id="${row.id}" class="eliminar btn modal-trigger btn-danger" data-method="put" id="delete">
                                    Eliminar
                                </a>
                            </div>`

                        }
                    }
                    my_columns.push(my_item);

                }


                else if (key == "name") {
                    my_item.title = "Nombre";

                    my_item.render = function (data, type, row) {
                        return `  <div align='center'> 
                                ${row.name}
                            </div>`
                    }


                    my_columns.push(my_item)

                }
                else if (key == "role") {
                    my_item.title = "Rol del Usuario";

                    my_item.render = function (data, type, row) {
                        return `  <div align='center'> 
                                ${row.role}
                            </div>`
                    }


                    my_columns.push(my_item)

                }
                else if (key == "email") {
                    my_item.title = "Correo Electronico";

                    my_item.render = function (data, type, row) {
                        return `  <div align='center'> 
                                ${row.email}
                            </div>`
                    }


                    my_columns.push(my_item)

                }
               

            })

            var table = $('#users_table').DataTable({
                "destroy": true,
                "scrollY": 700,
                "scrollX": true,
                "bAutoWidth": false,
                data: response.users,
                "columns": my_columns,
                "order": [],
                "language": {
                    "emptyTable": "No hay datos disponibles en la tabla.",
                    "info": "Mostrado del _START_ al _END_ de _TOTAL_ ",
                    "infoEmpty": "Mostrando 0 registros de un total de 0.",
                    "infoFiltered": "(filtrados de un total de _MAX_ registros)",
                    "infoPostFix": "Entradas",
                    "lengthMenu": "Mostrar _MENU_ registros",
                    'classMenu': "browser-default",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "BUSQUEDA:",
                    "searchPlaceholder": "Ingrese informacion para filtrar",
                    "zeroRecords": "No se han encontrado coincidencias.",
                    "paginate": {
                        "first": "Primera",
                        "last": "Última",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    },
                    "aria": {
                        "sortAscending": "Ordenación ascendente",
                        "sortDescending": "Ordenación descendente"
                    },
                },

                "lengthMenu": [[10, 20, 25, 50, -1], [10, 20, 25, 50, "Todos"]],
            });;
            $("select[name=clients_table_length]").addClass('browser-default');


        }
    }

    $('#crear').on('click', function (params) {
        method = $(this).attr('data-method');
        console.log(method)
        $("#users_modal").modal('show')
        $("#title_modal").text('Crear Usuario')
        url = '/api/users'

    })



    $('body').on('click', '.editar', function () {
        $("#title_modal").text('Actualizar Usuario')
        var id = $(this).attr('data-id');
        method = $(this).attr('data-method');
        url = '/api/users/' + id

        $("#users_modal").modal('show')

        const client = users.filter(u => u.id == id);
        if (client.length != 0) {
            fillData(client)

        } else {
            toastr.warning('no se ha cargado la informacion correctamente')
        }


    })

    function fillData(client) {
        $("#name").val(client[0].name)
        $("#password").val(client[0].password)
        $("#email").val(client[0].email)
        $("#role").val(client[0].role)

    }



    $('body').on('click', '.eliminar', function (params) {


        var id = $(this).attr('data-id')
        method = $(this).attr('data-method');
        url = 'api/users/' + id
        var user = JSON.parse(localStorage.getItem('user'))
        swal({
            title: "Estas seguro de querer ELIMINAR este registros?",
            text: "Despues de eliminado no hay nada que hacer",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: url,
                        method: method,
                        headers: {
                            "Authorization": `Bearer ${user.token}`
                        }

                    }).done(function (response) {
                        var title = ''
                        if (method === "delete") {
                            title = 'Cliente eliminado con Exito'
                        }
                        alertSuccess(title)

                        load()
                    }).fail(function (jqXHR) {
                        console.log(jqXHR)
                        alertError()
                    })
                } else {
                    swal("Esta bien el registro se conserva!");
                }
            });

    })














    $("#save").on('click', function () {
        save(url, method)
    })

    $("#cancel").on('click', function (params) {
        $('input').val("");
        $("input").prop('disabled', false)
        clear()
        $("#save").show();
        $("#users_modal").removeData()
        $("#users_modal").modal('close')
    })



    function save(url, method) {
        var user = JSON.parse(localStorage.getItem('user'))
        $.ajax({
            url: url,
            method: method,
            headers: {
                "Authorization": `Bearer ${user.token}`
            },
            data: {
                name: $("#name").val(),
                password: $("#password").val(),
                email: $("#email").val(),
                role: $("#role").val(),

            }

        }).done(function () {
            var title = ''
            if (method === 'post') {
                title = 'Cliente registrado con Exito'
            } else if (method === 'put') {
                title = 'Cliente Actualizado con Exito'
            }

            alertSuccess(title)
            clear()
            $('input').val('')
            method = ''
            url = ''
            $("#users_modal").modal('hide')
            load();


        })
            .fail(function (jqXHR, estado, error) {
                console.log(jqXHR)
                validate(jqXHR)
                alertError()
            })
    }

    function alertSuccess(title) {
        swal({
            title: title,
            icon: 'success',
            timer: 1000,
            buttons: false
        });
    }

    function alertError() {
        swal({
            title: 'Error',
            text: 'Se ha producido un error, recarga la pagina y vuelve a intentar',
            icon: 'error'
        })
    }




    function validate(jqXHR) {
        $("#error_name").text(jqXHR.responseJSON.errors.name).css({ 'color': 'red', 'aling': 'center' });
        $("#error_password").text(jqXHR.responseJSON.errors.password).css({ 'color': 'red', 'aling': 'center' });
        $("#error_email").text(jqXHR.responseJSON.errors.email).css({ 'color': 'red', 'aling': 'center' });
        $("#error_role").text(jqXHR.responseJSON.errors.role).css({ 'color': 'red', 'aling': 'center' });

    }
    function clear() {
        $("#error_name").text("");
        $("#error_password").text("");
        $("#error_email").text("");
        $("#error_role").text("");

    }
})
