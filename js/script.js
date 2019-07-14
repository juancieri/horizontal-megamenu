/* SMOOTH SCROLL */
$(function() {
  $('a.scroll[href*=#]:not([href=#])').click(function() {
    if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
      if (target.length) {
        $('html,body').animate({
          scrollTop: target.offset().top
        }, 1000);
        return false;
      }
    }
  });
});

/* HEADER CLASS ON SCROLL */
function initScrollFunction() {
    
    $(window).scroll(function() {
        var scroll = $(window).scrollTop();

        if (scroll >= 230) {
            $("header").addClass("smaller");
        } else {
            $("header").removeClass("smaller").removeClass('fade').removeClass('nav-up').removeClass('nav-down');
        }
        
        $('#menu').collapse('hide');
       

    });
    
    var didScroll;
    var lastScrollTop = 0;
    var delta = 5;
    var navbarHeight = $('header').outerHeight();

    $(window).scroll(function(event){
        didScroll = true;
    });

    setInterval(function() {
        if (didScroll) {
            hasScrolled();
            didScroll = false;
        }
    }, 250);
    
    function hasScrolled() {
        var st = $(this).scrollTop();

        if(Math.abs(lastScrollTop - st) <= delta)
            return;

        if (st > lastScrollTop && st > navbarHeight){
            $('header').removeClass('nav-down').addClass('nav-up');
        } else {
            if(st + $(window).height() < $(document).height()) {
                $('header').removeClass('nav-up').addClass('nav-down');
            }
        }

        lastScrollTop = st;
    }
    
}
initScrollFunction();

/* TEXT EDITOR RESPONSIVE */
function initEditorResponsive() {
    $('.post-content img').addClass('img-responsive');
    $('.post-content table').addClass('table').addClass('table-striped').addClass('table-hover').wrap("<div class='table-responsive'></div>");
    $('.post-content iframe').removeAttr('style').removeAttr('width').removeAttr('height').addClass('embed-responsive-item').wrap("<div class='embed-responsive embed-responsive-16by9'></div>");
}

/* MAIN CAROUSEL */
function initMainCarousel() {
    $('#mainCarousel').owlCarousel({
        merge:false,
        loop:true,
        margin:0,
        lazyLoad:false,
        center:false,
        nav: true,
        navText: [
           "<i class='fa fa-angle-left fa-2x' aria-hidden='true'></i>",
            "<i class='fa fa-angle-right fa-2x' aria-hidden='true'></i>"
        ],
        autoplay: true,
        autoplayTimeout: 100,
        autoplayHoverPause: true,
        dots: false,
        dotsEach: false,
        items: 1,
    });
}


/* TOOLTIPS */
$(function () {
  $('[data-toggle="tooltip"]').tooltip()
});

/* BACK TO TOP */
$(document).ready(function(){
      $('body').append('<div id="toTop" class="to-top-btn"><i class="fa fa-angle-up"></i></div>');
        $(window).scroll(function () {
            if ($(this).scrollTop() > 500) {
                $('#toTop').fadeIn();
            } else {
                $('#toTop').fadeOut();
            }
        });
    $('#toTop').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 600);
        return false;
    });
});

/* WHATSAPP CHAT */
function initWhatsappChat() {
    'use strict';
    
    var mobileDetect = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent);
    if (mobileDetect) {
        $('#float-cta .whatsapp-msg-container').css('display','none');
        $('#float-cta > a').on('click', function(){
            window.location = 'https://api.whatsapp.com/send?phone=5491135105198';
        });
    } else {
        $('#float-cta > a').click(function(){
            $(this).toggleClass('open');
            $('#float-cta .whatsapp-msg-container').toggleClass('open');
            $('#float-cta').toggleClass('open');
        });
        
        $('.whatsapp-msg-close').click(function(){
            $('#float-cta > a').toggleClass('open');
            $('#float-cta .whatsapp-msg-container').toggleClass('open');
            $('#float-cta').toggleClass('open');
        });
        
        $('.btn-whatsapp-send').on('click', function(event){
            event.stopPropagation();
        });
        $('.btn-whatsapp-send').click(function() {
            var baseUrl = 'https://web.whatsapp.com/send?phone=5491135105198&text=';
            var textEncode = encodeURIComponent($('#float-cta .whatsapp-msg-body textarea').val());
            window.open(baseUrl + textEncode, '_blank');
        });
    }
    
}