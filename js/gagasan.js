jQuery(document).ready(function($) { 

var $body, $window, $sidebar, adminbarOffset, top = false,
        bottom = false, windowWidth, windowHeight, lastWindowPos = 0,
        topOffset = 0, bodyHeight, sidebarHeight, resizeTimer;
    /**
    * Detect touch device
    */
    if( is_touch_device() == false ){
        $('body').addClass( 'not-touch-device' );
    }

    /**
    * Hover state for menu
    */
    $('#site-navigation .menu-item-has-children, .paging-navigation .nav-next a, .paging-navigation .nav-previous a').hover(
        function(){
            $(this).addClass( 'hovered' );
        },
        function(){
            $(this).removeClass( 'hovered' );
        }
    );

    /**
    * Civil Footnotes Support
    * Slide the window instead of jumping it
    */
    $('#main').on( 'click', 'a[rel="footnote"], a.backlink', function(e){
        e.preventDefault();
        var target_id = $(this).attr('href');
        var respond_offset = $(target_id).offset();

        $('html, body').animate({
            scrollTop : respond_offset.top - 90
        });
    });

    /** 
    * Display Tertiary when scrolling
    */
    $(window).scroll(function(){
        var sidebarHeight = $('.tertiary--container').height(),
            containerHeight = $('#tertiary').height() + 170,
            scrollTop = $(window).scrollTop(),
            clientHeight = scrollTop + $(window).height(),
            threshold = 50;
        if(scrollTop >= 50){
            $('.tertiary--container').addClass('fixed').removeClass('hidden');
        }else if(containerHeight - scrollTop <= sidebarHeight){
            $('.tertiary--container').removeClass('fixed').addClass('bottom').addClass('hidden');
        }
    });
    
    /** 
    * Let's scrooooooool
    */
    $('#scrollup').click(function(){
        $("html, body").animate({ scrollTop: 0 }, 1600);
    });


});

/**
* Smooth Scroll to top
*/
function scrollTop() {
    $("html, body").animate({ scrollTop: 0 }, 300);
    return false;
};

/**
* Detect touch device
*/
function is_touch_device() {
    return 'ontouchstart' in window // works on most browsers 
        || 'onmsgesturechange' in window; // works on ie10
};