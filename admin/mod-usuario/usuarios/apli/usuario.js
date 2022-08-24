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
                    beforeSend:function () {

                    }
                })
                    .done((r)=>{
                        switch (r) {
                            case '':
                                $.toast({
                                    title: 'Editar',
                                    subtitle: 'Justo ahora',
                                    content: 'Usuario editado.',
                                    type: 'success',
                                    delay: 3000
                                });
                                break;
                            case 'e':
                                $.toast({
                                    title: 'Error',
                                    subtitle: 'Justo ahora',
                                    content: 'Hubo un error al intentar editar el usuario.',
                                    type: 'success',
                                    delay: 3000
                                });
                                break;
                            default:
                                console.info(r);
                        }
                    })
                    .fail((f)=> {
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
    function password_toggle() {

        let input_id = $(this).attr('data-id-input');
        let input = $('#'+input_id+'').attr('type');

        if (input === 'password'){
            $('#'+input_id+'').attr('type','text');
            $(this).html('<i class="fad fa-eye-slash"></i>');
        }else if (input === 'text'){
            $('#'+input_id+'').attr('type','password');
            $(this).html('<i class="fad fa-eye"></i>');
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
            },
            beforeSend:()=>{

            }
        })
            .done(function (r) {

                let link_general= $('#link_general').val();

                let imagen = link_general+'admin/modulo-usuario/usuario/dom/img/'+r[0].imagen;

                $('#id_edit').val(r[0].id);
                $('#data_imagen').val(r[0].imagen);
                $('#primer_nombre').val(r[0].primer_nombre);
                $('#segundo_nombre').val(r[0].segundo_nombre);
                $('#apellidos').val(r[0].apellidos);
                $('#usuario').val(r[0].usuario);
                $('#correo').val(r[0].correo);
                $('#celular').val(r[0].celular);
                $('#acceso').val(r[0].acceso);
                $('#tipo').val(r[0].tipo);
                $('#direccion').val(r[0].direccion);

                if (r[0].imagen === ''){
                    $('#content-img').html('' +
                        '<input type="file" class="dropify" name="imagen_perfil"' +
                        '  data-max-file-size="3M">'+
                        '');
                }else{
                    $('#content-img').html('' +
                        '<input type="file" class="dropify" name="imagen_perfil"' +
                        '  data-default-file="'+imagen+'"' +
                        '  data-max-file-size="3M">'+
                        '');
                }


            })

            .fail(function (f) {

                console.info(f);
            })

            .always(function (a) {
                init();
            })
    }
    function eliminar() {

        let id = $(this).val();
        let data_imagen = $(this).attr('data-imagen');

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
                        data_imagen:data_imagen
                    },
                    beforeSend:()=> {

                    }
                })
                    .done(function (r) {
                        switch (r) {
                            case'':
                                $.toast({
                                    title: 'Eliminar',
                                    subtitle: 'Justo ahora',
                                    content: 'El usuario se elimino correctamente.',
                                    type: 'success',
                                    delay: 3000
                                });
                                break;
                            case'e':
                                $.toast({
                                    title: 'Error',
                                    subtitle: 'Justo ahora',
                                    content: 'Hubo un error al intentar eliminar el usuario.',
                                    type: 'warning',
                                    delay: 3000
                                });
                                console.info('Error: ',r);
                                break;
                            default:
                                $.toast({
                                    title: 'Proceso',
                                    subtitle: 'Justo ahora',
                                    content: 'El proceso termino, con posibles errores.',
                                    type: 'info',
                                    delay: 3000
                                });
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

    $(document).on('submit', '#form_crear', agregar);
    $(document).on('submit', '#form_edit_item',editar);
    $(document).on('click', '.leer-item', leer);
    $(document).on('click', '.eliminar', eliminar);
    $(document).on('click', '.password-toggle', password_toggle);
    $(document).on('submit', '#form_edit_password', change_password);
    $(document).on('click', '.change-password', function () {
        let id_change = $(this).val();
        $('#id_edit_password').val(id_change);
    })

});






