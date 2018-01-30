$(function() {

    $test = false;

        $('.btn-mesarticles').click(function(e) {


            // /////////////////////////////////////// //
            // //////// INITIALISATIONS ////////////// //
            // /////////////////////////////////////// //

            $test = !$test;


            // //////////////////////////////////// //
            // //////// GESTION AJAX ////////////// //
            // //////////////////////////////////// //

            if($test) {

                    // PARTIE AJAX

                $(".zone-articles").load("../php/mesArticles.php", { // accolades !

                });

                $(".zone-articles").html("<img id='chargement' src='https://tuauraslesyeuxcarres.files.wordpress.com/2015/01/arcencielsupersonique.gif'>");



                    // PARTIE BUTTON

                $('.btn-mesarticles').text('All Articles');

            } else {
                $(".zone-articles").load("../php/page.php", { // accolades !

                });

               // $(".zone-articles").html("<img src='https://tuauraslesyeuxcarres.files.wordpress.com/2015/01/arcencielsupersonique.gif'>");


                    // PARTIE BUTTON

                $('.btn-mesarticles').text('Mes Articles');
            }



        })

});
