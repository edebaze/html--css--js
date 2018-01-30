$(function() {

    console.log('LOAD CONTACT ADMIN JS');

    $('#submit-contact-admin').click(function(e) {

        console.log('CLICK FORM');

        e.preventDefault();

        // RECUPERATION DES INFORMATIONS
        var content = $('#content').val();
        var titre = $('#titre').val();

        // TRAITEMENT AJAX
        $('.zone-reception').load('../php/admin/traitement/trContactAdmin.php', {
            titre : titre,
            content : content,
        })

        // On clean notre formulaire
        $('#content').val("");
        $('#titre').val("");

    })

})