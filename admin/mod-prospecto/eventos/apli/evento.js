$(document).ready(function () {

    let url = 'infra/evento.php';


    lista(1);
    function lista(page) {

        let search = $('#search').val();
        let limite = $('#limite').val();
        let orden = $('#orden').val();
        let tipo = $('#tipo_lista').val();

        $.ajax({
            url:url,
            method:'post',
            data:{
                opcion: 5,
                page:page,
                limit:limite,
                order:orden,
                search:search,
                tipo:tipo,

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
    $(document).on('keyup', '#search', function () {
        lista(1);
    })
    $(document).on('change', '#limite, #orden, #tipo_lista', function () {
        lista(1);
    })

    function agregar(e) {

        e.preventDefault();

        let formData = new FormData(this);
        formData.append('opcion',1);

        Swal.fire({
            title: '¿Esta Segur@ de agregar este item?',
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
                                M.toast({html: 'Item agregado!'});
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
                                console.info('Respuesta: ',r);
                                break;
                            case 'e':
                                console.info('Error: ',r);
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
        })
            .done(function (r) {
                $('#id_evento_edit').val(r[0].id);
                $('#nombre_edit').val(r[0].nombre);
            })

            .fail(function (f) {

                console.info(f);
            })

            .always(function (a) {
                M.updateTextFields();
            })
    }
    function eliminar() {

        let id = $(this).val();

        Swal.fire({
            title: '¿Esta Segur@ de eliminar este item?',
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
                    beforeSend:()=> {

                    }
                })
                    .done(function (r) {
                        switch (r) {
                            case'':
                                M.toast({html: 'Item eliminado con exito!!!'});
                                break;
                            case'e':
                                M.toast({html: 'Error al intentar eliminar el item!!'});
                                console.info('Error: ',r);
                                break;
                            default:
                                M.toast({html: 'Proceso terminado con posibles errores!!!'});
                                console.info('Resultado: ',r);
                        }
                    })
                    .fail(function (f) {
                        M.toast({html: 'Error del servidor, Contacte con soporte tecnico!!'});
                        console.info('Error: ',f);
                    })
                    .always(function (a) {
                        lista(1);

                    })
            }
        });
    }

    $(document).on('submit', '#form_crear', agregar);
    $(document).on('submit', '#form_editar',editar);
    $(document).on('click', '.leer-item', leer);
    $(document).on('click', '.eliminar', eliminar);

});






