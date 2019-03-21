(function($) {

    let navigationFixedClass = 'pinned';

    function adjustHeader() {

        let $navMenu = $('.menu-navigation-container');
        let $header = $('.header');
        let $logoBound = $('.logo-bound');
        let $logo = $('.custom-logo');
        let scrollPos = $(window).scrollTop();
        let navtop = $navMenu.position().top;

        // If the scroll is more than the custom header, set the fixed class.
        if (scrollPos >= (navtop)) {
            $header.addClass(navigationFixedClass);
            $header.css({ top: -navtop });
        } else {
            $header.removeClass(navigationFixedClass);
            $logo.height($logoBound.height() - scrollPos);
        }
    }

    $( document ).ready( function() {
        adjustHeader();
        $("a[href='#contact-overlay']").click(function(event) {
            event.preventDefault();
            this.blur();
            $(this).modal({
                showClose: false,
                fadeDuration: 200
            });
        });
    });


    $( window ).on( 'scroll', function() {
        adjustHeader();
        //adjustHeaderHeight();
    });

    $( window ).resize( function() {
        setTimeout( adjustHeader, 400 );
    });

})($);