$(function() {

        $('#retour-button').click(function() {
            $('.zone-articles').load('../php/admin/mesArticles.php', {
                test : true
            })
        })

});