$(function() {

    var articleId = '';

            // GESTION DE '.btn-commenter'

    // Lorsque l'on clique sur le bouton '.btn-commenter'
    $('.btn-commenter').click(function() {
        // On recupère la div article
        $article = $(this).parent().parent();

        // On récupère l'enfant
        $span = $article.children('.Titre').children('a').children('span');

        // On récupère articleId
        articleId = $span[0].textContent;


        /*

        // On selectionne notre input dans le formulaire
        $input = $('.form-comment').children('.article-id');

        // On lui envoie notre articleId
        $input.val(articleId);

        */


    });


/*

*/

    // On empeche le form de s'envoyer
    $('#submit-comment').click(function(e) {

        e.preventDefault();
        console.log(articleId);

        // //////////////////////////////////// //
        // //////// GESTION AJAX ////////////// //
        // //////////////////////////////////// //


            // PARTIE AJAX

            $(".return").load("./comment.php", { // accolades !
                articleId : articleId,
                commentaire : $('#commentaire').val()
            });

            //$(".return").html("<img id='chargement' src='https://tuauraslesyeuxcarres.files.wordpress.com/2015/01/arcencielsupersonique.gif'>");


            // Je ferme le pop-up
            $('.wrapper-two').toggleClass('show');

            // J'affiche un message de succès
            $('body').append('<div class="alert alert-success message-success"> <h2>Felicitation !</h2> <p>Votre commentaire a été envoyé</p> </div>');

            // J'affiche / cache mon message
            $('.message-success').show('slow').delay(2000).hide('slow');



    })

})