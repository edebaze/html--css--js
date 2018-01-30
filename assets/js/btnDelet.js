$(function() {

    console.log('LOG BTN DELET');

        $('.btn-delete').click(function () {

            console.log('CLICK BTN DELET');

            // TRAITEMENT AJAX

            $('body').load('../php/admin/traitement/deleteAccount', {
                test : true
            })



            // REDIRECTION

            location.href = '../../index.php';
        })




        $('.btn-blog').click(function() {
            location.href = './admin.php#menuPrincipal  ';
        })

})