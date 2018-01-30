$(function() {

    console.log('LOAD ADMIN BUTTON CONTACT.JS');

    // On récupère notre nombre de commentaires
    var nbrComment = $('.comment-content').length

    // On initialise les pages
    var page = 1;
    var pageMax = Math.ceil(nbrComment / 6);
    var limite;
    var debut;






    // FUCKING NEXT BUTTON !!




    $('.next-button-comment').click(function() {

        // On récupère nos variables
        var actif = $('.actif-comment');     //.addClass('prev-comment').removeClass('actif-comment');
        var prev = $('.prev-comment');
        var next = $('.next-comment');

        // Variables Tempon
        var prevT = prev;
        var nextT = next;

        console.log('NEXT CONTACT !!');

        // On gère .next-article

        if(page + 1 <= pageMax ) {
            page += 1;
            limite = page * 3;
            debut = limite - 2;

            if(limite > nbrComment) {
                limite = nbrComment
            }

            // On récupère la last next
            var lastNext = next.last()



            // METTRE LA CLASS .NEXT-COMMENT A NOS NEXT DIV
            for(var i=debut; i<=limite; i++) {
                // On ajoute la classe .next-comment à nos prochaines div comment
                lastNext = lastNext.next().next().addClass('next-comment');
            }


            // ON  " - .NEXT-COMMENT "  ET  " + .ACTIF-COMMENT "
            next.addClass('actif-comment').removeClass('next-comment');

            // On efface nos anciens prev-comment
            prev.removeClass('prev-comment');

            // On ajoute la classe .prev-comment à nos anciens actif-comment
            actif.addClass('prev-comment').removeClass('actif-comment')
        }


    })









    // FUCKING PREV BUTTON !!



    $('.prev-button-comment').click(function() {

        // On récupère nos variables
        var actif = $('.actif-comment');     //.addClass('prev-comment').removeClass('actif-comment');
        var prev = $('.prev-comment');
        var next = $('.next-comment');

        // Variables Tempon
        var prevT = prev;
        var nextT = next;

        console.log('PREV CONTACT !!');


        // On gère .prev-article

        if(page - 1 >= 1 ) {

            // On efface nos anciens prev-comment
            prev.removeClass('prev-comment');

            page -= 1;
            limite = page * 6;
            debut = limite - 5;

            if(debut < 1) {
                debut = 1
            }


            // On récupère le first prev
            var firstPrev = prev.first()

            // METTRE LA CLASS .NEXT-COMMENT A NOS NEXT DIV
            for(var i=debut; i>1; i--) {
                // On ajoute la classe .next-comment à nos prochaines div comment
                firstPrev = firstPrev.prev().prev().addClass('prev-comment');
            }




            // On ajoute la class .actif-comment à nos anciens .prev-comment
            prev.addClass('actif-comment').removeClass('prev-comment');

            // On efface nos anciens next-comment
            next.removeClass('next-comment');

            // On ajoute la classe .next-comment à nos anciens actif-comment
            actif.addClass('next-comment').removeClass('actif-comment');

        }


    })





})
