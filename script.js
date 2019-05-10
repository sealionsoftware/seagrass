
function adjustHeader() {

    let $logoBound = $('.logo-bound');
    let $logo = $('.custom-logo');
    let scrollPos = $(window).scrollTop();
    let newHeight  = $logoBound.height() - scrollPos;

    $logo.height(newHeight);

}

// MS browsers observed not to scale svg smoothly due to async rendering
// https://developer.microsoft.com/en-us/microsoft-edge/platform/issues/15416990/
function canResizeSVGSmoothly(){
    return !(/msie|trident|edge/g.test(navigator.userAgent.toLowerCase()));
}

(function($) {

    $( document ).ready( function() {

        let header = $('.header');

        if (canResizeSVGSmoothly() && header.length){

            header.css({
                    top: -$('.wide-menu').position().top
                });

            adjustHeader();

            $( window ).on( 'scroll', function() {
                adjustHeader();
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