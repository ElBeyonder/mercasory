$(document).ready(function () {

    var url = 'infra/usuario.php';


    lista(1);
    function lista(page) {

        let search = $('#buscar').val();

        $.ajax({
            url:url,
            method:'post',
            data:{
                opcion: 5,
                page:page,
                search:search,
            }
        })
            .done(function (r) {
                $('#content_lista').html(r);
            })
            .fail(function (f) {
                console.info(f);
            })
    }
    $(document).on('click', '.page-pase', function () {
        let page = $(this).attr('data-page');
        lista(page);
    });
    $(document).on('keyup change', '#buscar', function () {
        lista(1);
    })
    $(document).on('change', '#limite, #orden, #tipo_lista', function () {
        lista(1);
    })

    function agregar(e) {

        e.preventDefault();

        let formData = new FormData(this);
        formData.append('opcion',1);

        let password = $('#password').val();
        let confirm_password = $('#confirm_password').val();

        if (password !== confirm_password){

        }else{
            Swal.fire({
                title: '¿Esta Segur@ de agregar este usuario?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'SI',
                cancelButtonText: 'NO',
                focusConfirm:true,
            }).then((result) => {
                if (result.isConfirmed) {

                    $.ajax({
                        url:url,
                        method:'post',
                        dataType:'json',
                        data:formData,
                        cache:false,
                        processData:false,
                        contentType:false,
                        beforeSend:function () {

                        }
                    })
                        .done(function (r) {
                            switch (r) {
                                case '':

                                    $('#form_crear')[0].reset();
                                    break;
                                case 'e':

                                    console.info(r);
                                    break;
                                default:
                                    $.toast({
                                        title: 'Proceso',
                                        subtitle: 'Justo ahora',
                                        content: 'Proceso terminado con posibles errores.',
                                        type: 'warning',
                                        delay: 3000
                                    });
                                    console.info(r);
                            }
                        })
                        .fail(function (f) {
                            console.info(f);
                        })
                        .always(function (a) {
                            lista(1);
                        })
                }
            });
        }
    }
    function editar(e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append('opcion',4);

        Swal.fire({
            title: '¿Esta Segur@ de editar este usuario?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI',
            cancelButtonText: 'NO',
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:formData,
                    cache:false,
                    processData:false,
                    contentType:false,
                })
                    .done((r)=>{
                        switch (r) {
                            case '':
                                M.toast({html:'Item Editado!!!'});
                                break;
                            case 'e':
                                M.toast({html:'Error!!!'});
                                break;
                            default:
                                M.toast({html:'Proceso terminado con posibles errores!!!'});
                                console.info(r);
                        }
                    })
                    .fail((f)=> {
                        M.toast({html:'Error servidor, revise la consola!!!'});
                        console.info(f);
                    })
                    .always((a)=> {
                        lista(1);
                    })
            }
        });
    }
    function change_password(e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append('opcion',6);

        let password = $('#password2').val();
        let confirm_password = $('#confirm_password_2').val();

        if (password !== confirm_password){

        }else if (password === confirm_password){
            swal({
                title: "¿Esta Segur@ de cambiar la contraseña del usuario?",
                icon: "warning",
                buttons: {
                    cancel: 'NO',
                    confirm:'SI',
                },
            })
                .then((value) => {
                    if (value) {

                        $.ajax({
                            url:url,
                            method:'post',
                            dataType:'json',
                            data:formData,
                            cache:false,
                            processData:false,
                            contentType:false,
                            beforeSend:function () {

                            }
                        })
                            .done(function (r) {
                                switch (r) {
                                    case 1:
                                        console.info('error: ',r);
                                        break;
                                    case 2:
                                        console.info('error: ',r);
                                        break;
                                    case 3:
                                        console.info('error: ',r);
                                        break;
                                    case 4:
                                        break;
                                    case 0:
                                        $('#form_edit_password')[0].reset();
                                        break;
                                    default:
                                        console.info(r);
                                }
                            })
                            .fail(function (f) {
                                console.info(f);
                            })
                            .always(function (a) {
                                lista(1);
                            })
                    }
                });
        }
    }
    function leer() {

        let id = $(this).val();
        $.ajax({
            url:url,
            method:'post',
            dataType:'json',
            data:{
                opcion:3,
                id:id
            }
        })
            .done(function (r) {

                let link_general= $('#link_general').val();

                $('#id_usuario_editar').val(r[0].id);
                $('#nombre_completo_editar').val(r[0].nombre_completo);
                $('#correo_editar').val(r[0].correo);
                $('#usuario_editar').val(r[0].usuario);

            })

            .fail(function (f) {
                console.info('Error:',f);
            })

            .always(function (a) {
                M.updateTextFields();
            })
    }
    function eliminar() {

        let id = $(this).val();

        Swal.fire({
            title: '¿Esta Segur@ de eliminar este usuario?',
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI',
            cancelButtonText: 'NO',
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url:url,
                    method:'post',
                    dataType:'json',
                    data:{
                        opcion:2,
                        id:id,
                    },
                })
                    .done(function (r) {
                        switch (r) {
                            case'':
                                M.toast({html:'Item Eliminado!!!'});
                                break;
                            case'e':
                                M.toast({html:'Error!!!'});
                                console.info('Error: ',r);
                                break;
                            default:
                                M.toast({html:'Proceso terminado con posibles errores!!!'});
                                console.info('Resultado: ',r);
                        }
                    })
                    .fail(function (f) {
                        $.toast({
                            title: 'Proceso',
                            subtitle: 'Justo ahora',
                            content: 'El proceso termino, con posibles errores.',
                            type: 'info',
                            delay: 3000
                        });
                        console.info('Error: ',f);
                    })
                    .always(function (a) {
                        lista(1);

                    })
            }
        });
    }
    function exportar_excel() {

        let search = $('#buscar').val();

        Swal.fire({
            title: '¿Esta segur@?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'SI',
            cancelButtonText: 'NO',
        }).then((result) => {
            if (result.isConfirmed) {

                $.ajax({
                    url:url,
                    method:'post',
                    xhrFields: {
                        responseType:'blob'
                    },
                    data:{
                        opcion: 7,
                        search:search,
                    },
                })
                    .done((r)=> {


                        let a = document.createElement('a');
                        let url = window.URL.createObjectURL(r);
                        a.href = url;
                        a.download = 'LISTA USUARIOS.xls';
                        document.body.append(a);
                        a.click();
                        a.remove();
                        window.URL.revokeObjectURL(url);

                    })
                    .fail((f)=> {
                        toast_succes('Hubo un error al intentar exportar su archivo excel');
                        console.info(f);
                    })
                    .always(()=> {
                    })



            }
        });
    }

    $(document).on('submit', '#form_crear', agregar);
    $(document).on('submit', '#form_editar',editar);
    $(document).on('click', '.leer-item', leer);
    $(document).on('click', '.eliminar', eliminar);
    $(document).on('click', '#exportar_excel', exportar_excel);
    $(document).on('submit', '#form_edit_password', change_password);

});






