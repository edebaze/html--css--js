$(function() {


    $('.btn-voir').click(function() {


        // TRAITEMENT DES DONNEES


        // LE SPAN

        // On va chercher notre <span>
        $span = $(this).parent().parent().children('.Contenu').children('span');

        // On Affiche/Efface $span
        $span.toggle('slow', "swing");



        /*      ***************       */



        // ZONE-COMMENT

        // On va chercher notre div zone-comment
        $zoneComment = $(this).parent().parent().children('.zone-comment');

        // On Affiche/Cache notre $zoneComment
        $zoneComment.toggle('slow');



        /*      ***************       */




        // On récupère l'id de notre article
        articleId = $(this).parent().parent().children('.Titre').children('.articleId').children('span').text();



        // /////////////////////////////////////// //
        //     GESTION AJAX SOUS-ZONE-COMMENT      //
        // /////////////////////////////////////// //

        $(".sous-zone-comment").load("../php/afficheComment.php", { // accolades !
            articleId : articleId
        });

    })


});




/*

        // GESTION DU +

    $('.btn-voir').click(function() {
        // On récupère la div article
        $article = $(this).parent().parent();

        // On modifie son CSS
        $article.css("height", "auto");

        // On modifie notre button
        $(this).replaceWith(
            '<button class="btn-cacher btn-5" id="cacher">-</button>'
        );

        console.log("SALUT LES GENS")

    })



            // GESTION DU -

    $('#cacher').click(function() {
        // On récupère la div article
        $article = $(this).parent().parent();

        // On modifie son CSS
        $article.css("height", "250px");

        // On modifie notre button
        $(this).replaceWith(
            '<button class="btn-voir btn-5">+</button>'
        );

        console.log("SALUT")

    })


    */