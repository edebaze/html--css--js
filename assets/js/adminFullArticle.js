$(function() {


        $('.article-miniature').click(function() {
            // On recupère le titre de l'article
            var titre = $(this).children('.Titre').text();


            // PARTIE AJAX
            $('#mesArticles').load('../php/afficheFullArticle.php', {
                    titre : titre,
                })
        })
    }

)