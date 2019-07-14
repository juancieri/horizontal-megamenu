/* MEGA MENU */
$(function () {
    $('.has-megamenu a').on("click", function (e) {
        e.preventDefault();
        $(this).parent().toggleClass('open');
    });
    $('.megamenu-aside ul li a').click(function(){
        $('.megamenu-nav').removeClass('open');
        var dataShow = $(this).data('show');
        $(dataShow).toggleClass('open');
    });
    $('.header-toggle button').click(function(){
        $(this).toggleClass('open');
        $('.header-logo + nav').toggleClass('open');
        if ( !$('.header menu > nav').hasClass('open') ) {
            $('.has-megamenu').removeClass('open');
            $('.megamenu-nav').removeClass('open');
        }
    });
});