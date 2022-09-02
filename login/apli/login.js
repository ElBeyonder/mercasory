$(document).ready(function () {




    function login(e) {
        e.preventDefault();

        let form_data = new FormData(this);


        $.ajax({
            url:'login/infra/login.php',
            method:'post',
            dataType:'json',
            cache:false,
            contentType:false,
            processData:false,
            data:form_data
        })
            .done(r=>{
                switch (r) {
                    case '':
                        M.toast({html:'Login correcto! '});
                        console.info('Respuesta: ',r);
                        break;
                    case 'e':
                        M.toast({html:'Login Incorrecto! '});
                        console.info('Error: ',r);
                        break;
                    default:
                        M.toast({html:'Login Completado con posibles errores! '});
                        console.info('repsuesta: ',r);
                }
            })
            .fail(r=>{
                M.toast({html:'Error! '});
                console.info('Error: ',r);
            })
            .always(r=>{
                let link_general = $('#link_general').val();
                window.location.href = ''+link_general+'/admin/mod-usuario/usuarios/';
                M.toast({html:'!!!'});
            })
    }






    $(document).on('submit', '#form_login', login)

});


