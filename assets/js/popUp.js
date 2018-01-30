$(document).ready(function () {
    $('.pop-up-button').click(function () {
        $('.wrapper').toggleClass('show');
        $('.wrapper-two').removeClass('show');
    });

    $('.pop-up-button-sign-in').click(function () {
        $('.wrapper-two').toggleClass('show');
        $('.wrapper').removeClass('show');
    });
});