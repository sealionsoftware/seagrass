(function($) {

    let navigationFixedClass = 'pinned';

    $( document ).ready( function() {

        if ($('.header').length){

            function adjustHeader() {

                let $navMenu = $('.wide-menu');
                let $header = $('.header');
                let $logoBound = $('.logo-bound');
                let $logo = $('.custom-logo');
                let $graphic = $('.graphic');
                let scrollPos = $(window).scrollTop();
                let navTop = $navMenu.position().top;

                // If the scroll is more than the custom header, set the fixed class.
                if (scrollPos >= navTop) {
                    $header.addClass(navigationFixedClass);
                    $header.css({ top: -navTop });
                    let newHeight = $logoBound.height() - navTop;
                    $logo.height(newHeight);
                    $graphic.height(newHeight);
                } else {
                    $header.removeClass(navigationFixedClass);
                    let newHeight = $logoBound.height() - scrollPos;
                    $logo.height(newHeight);
                    $graphic.height(newHeight);
                }
            }

            adjustHeader();

            $( window ).on( 'scroll', function() {
                adjustHeader();
            });

            $( window ).resize( function() {
                setTimeout( adjustHeader, 400 );
            });
        }

        $("a[href='#contact-overlay']").click(function(e) {
            e.preventDefault();
            this.blur();
            $(this).modal({
                showClose: false,
                fadeDuration: 200
            });
        });

        $(".wide-menu .icon").click(function(e) {
            e.preventDefault();
            this.blur();
            $(".mobile-menu").toggleClass('open');
        });

    });

})($);