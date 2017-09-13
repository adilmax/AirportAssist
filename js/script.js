(function ($) {
    "use strict"; // Start of use strict


    /* ---------------------------------------------
     Scripts initialization
     --------------------------------------------- */


    $(document).ready(function () {

        $(window).trigger("resize");

    });

    $(window).resize(function () {
        
        js_height_init();

    });


    /* --------------------------------------------
     Platform detect
     --------------------------------------------- */
    var mobileTest;
    if (/Android|webOS|iPhone|iPad|iPod|BlackBerry/i.test(navigator.userAgent)) {
        mobileTest = true;
        $("html").addClass("mobile");
    }
    else {
        mobileTest = false;
        $("html").addClass("no-mobile");
    }

    var mozillaTest;
    if (/mozilla/.test(navigator.userAgent)) {
        mozillaTest = true;
    }
    else {
        mozillaTest = false;
    }
    var safariTest;
    if (/safari/.test(navigator.userAgent)) {
        safariTest = true;
    }
    else {
        safariTest = false;
    }

    // Detect touch devices    
    if (!("ontouchstart" in document.documentElement)) {
        document.documentElement.className += " no-touch";
    }


    /* ---------------------------------------------
     Sections helpers
     --------------------------------------------- */

    // Sections backgrounds

    var pageSection = $(".home-section, .intro-section, .page-section, .small-section, .split-section");
    pageSection.each(function (indx) {

        if ($(this).attr("data-background")) {
            $(this).css("background-image", "url(" + $(this).data("background") + ")");
        }
    });

    // Function for block height 100%
    function height_line(height_object, height_donor) {
        height_object.height(height_donor.height());
        height_object.css({
            "line-height": height_donor.height() + "px"
        });
    }

    // Function equal height
    !function (a) {
        a.fn.equalHeights = function () {
            var b = 0, c = a(this);
            return c.each(function () {
                var c = a(this).innerHeight();
                c > b && (b = c)
            }), c.css("height", b)
        }, a("[data-equal]").each(function () {
            var b = a(this), c = b.data("equal");
            b.find(c).equalHeights()
        })
    }(jQuery);






})(jQuery); // End of use strict


/* ---------------------------------------------
 Height 100%
 --------------------------------------------- */
function js_height_init() {
    (function ($) {
        $(".js-height-full").height($(window).height());
        $(".js-height-parent").each(function () {
            $(this).height($(this).parent().first().height());
        });
    })(jQuery);
}


