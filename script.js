function debounce(func, wait, immediate) {
    let timeout;
    return function() {
        let context = this, args = arguments;
        let later = function() {
            timeout = null;
            if (!immediate) func.apply(context, args);
        };
        let callNow = immediate && !timeout;
        clearTimeout(timeout);
        timeout = setTimeout(later, wait);
        if (callNow) func.apply(context, args);
    };
}

function adjustHeader() {

    let navigationFixedClass = 'pinned';

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

// MS browsers observed not to scale svg smoothly due to async rendering
// https://developer.microsoft.com/en-us/microsoft-edge/platform/issues/15416990/
function canResizeSVGSmoothly(){
    return !(/msie|trident|edge/g.test(navigator.userAgent.toLowerCase()));
}

(function($) {

    $( document ).ready( function() {

        if (canResizeSVGSmoothly() && $('.header').length){

            adjustHeader();

            $( window ).on( 'scroll', function() {
                debounce(adjustHeader, 200, true)();
            });
        }

        $("a[href='#overlay']").click(function(e) {
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