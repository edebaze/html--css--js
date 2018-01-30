$(function() {

    console.log('ADMIN BUTTON MY GUEULE');

    // On récupère notre nombre d'articles
    var nombrearticles = $('.article-miniature').length

    // On initialise les pages
    var page = 1;
    var pageMax = Math.ceil(nombrearticles / 6);
    var limite;
    var debut;

                // FUCKING NEXT BUTTON !!

        $('.next-button').click(function() {

            console.log('NEXT !!');

            if(page + 1 <= pageMax ) {
                page += 1;
                limite = page * 6;
                debut = limite - 5;
            }


            // PARTIE AJAX
            $('#zone-articles').load('../php/admin/mesArticles.php', {
                limite : limite,
                debut : debut,
            })

        })





                // FUCKING PREV BUTTON !!

        $('.prev-button').click(function() {

            console.log('PREV !!');

            if(page - 1 > 0 ) {
                page -= 1;
                limite = page * 6;
                debut = limite - 5;
            }


            // PARTIE AJAX
            $('#zone-articles').load('../php/admin/mesArticles.php', {
                limite : limite,
                debut : debut,
            })

        })





})







