let i = 0;

function adjustHeader(scaleGraphic) {

    let navigationFixedClass = 'pinned';

    let $navMenu = $('.wide-menu');
    let $header = $('.header');
    let $logoBound = $('.logo-bound');
    let $logo = $('.custom-logo');
    let $graphic = $('.graphic');
    let scrollPos = $(window).scrollTop();
    let navTop = $navMenu.position().top;
    let newHeight  = $logoBound.height() - scrollPos;

    if (scaleGraphic) $graphic.height(newHeight);
    $logo.height(newHeight);

    // If the scroll is more than the custom header, set the fixed class.
    if (scrollPos > navTop) {
        $header.addClass(navigationFixedClass);
    } else {
        $header.removeClass(navigationFixedClass);
    }
}

// MS browsers observed not to scale svg smoothly due to async rendering
// https://developer.microsoft.com/en-us/microsoft-edge/platform/issues/15416990/
function canResizeSVGSmoothly(){
    return !(/msie|trident|edge/g.test(navigator.userAgent.toLowerCase()));
}

(function($) {

    $( document ).ready( function() {

        let header = $('.header');
        let scaleGraphic = $(document).height() > 700;

        if (canResizeSVGSmoothly() && header.length){

            header.css({
                    top: -$('.wide-menu').position().top
                });

            adjustHeader(scaleGraphic);

            $( window ).on( 'scroll', function() {
                adjustHeader(scaleGraphic);
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