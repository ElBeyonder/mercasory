$(document).ready(function () {


    /* auto init materializecss */
    M.AutoInit();


    $(document).on('click', '#salir', salir);
});

    function salir() {

        $.ajax({
            url:'../../config/salir.php',
            method:'post',
        })
            .done(r=>{
                let link_general = $('#link_general').val();
                window.location.href = link_general;
                M.toast({html:'!!!'});
            })
            .fail(r=>{
                M.toast({html:'!!!'});
            })
            .always(r=>{

            })
    }