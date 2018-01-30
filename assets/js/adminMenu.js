$(function() {

    // On séléctionne nos buttons menu
    var menu = $('.slidebar ul li a')

    // ON CLICK
    menu.click(function() {

        console.log ('SAAAAAAALUUUUUUT')

        // On récupère le nom de notre onglet
        var onglet = $(this).attr('href').replace('#', '');
        var url = "../php/admin/" + onglet + '.php';



        // //////////////////////////////////// //
        // //////// GESTION AJAX ////////////// //
        // //////////////////////////////////// //


            // PARTIE AJAX

            $("#menuPrincipal").load(url, { // accolades !
                    onglet : onglet,
            });

            // $(".zone-articles").html("<img id='chargement' src='https://tuauraslesyeuxcarres.files.wordpress.com/2015/01/arcencielsupersonique.gif'>");


    })



});