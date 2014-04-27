//Menu Init
jQuery.noConflict();
ddsmoothmenu.init({
    mainmenuid: "menu", //menu DIV id
    orientation: 'h', //Horizontal or vertical menu: Set to "h" or "v"
    classname: 'ddsmoothmenu', //class added to menu's outer DIV
    //customtheme: ["#1c5a80", "#18374a"],
    contentsource: "markup" //"markup" or ["container_id", "path_to_menu_file"]
});


/**
 * slider initilize
 */
jQuery(function() {
    jQuery('.flexslider').flexslider({
        slideshowSpeed: parseInt(jQuery("#txt_name").val())
    });
});


/**
 * hexagonal gallery
 */


(function($) {
    jQuery('#tiles').imagesLoaded(function() {
        // Prepare layout options.
        var options = {
            autoResize: true, // This will auto-update the layout when the browser window is resized.
            container: jQuery('#main'), // Optional, used for some extra CSS styling
            offset: 2, // Optional, the distance between grid items
            itemWidth: 210, // Optional, the width of a grid item
            fillEmptySpace: true // Optional, fill the bottom of each column with widths of flexible height
        };

        // Get a reference to your grid items.
        var handler = jQuery('#tiles li'),
                filters = jQuery('#filters li');

        // Call the layout function.
        handler.wookmark(options);

        /**
         * When a filter is clicked, toggle it's active state and refresh.
         */
        var onClickFilter = function(event) {
            var item = jQuery(event.currentTarget),
                    activeFilters = [];

            if (!item.hasClass('active')) {
                filters.removeClass('active');
            }
            item.toggleClass('active');

            // Filter by the currently selected filter
            if (item.hasClass('active')) {
                activeFilters.push(item.data('filter'));
            }

            handler.wookmarkInstance.filter(activeFilters);
        }

        // Capture filter click events.
        filters.click(onClickFilter);
    });
})(jQuery);

function showGalleryIcon(ref)
{
    var icon1 = ref.getElementsByClassName('galleryImageLink1')[0];
    var icon2 = ref.getElementsByClassName('galleryImageLink2')[0];
    setTimeout(function() {
        icon1.setAttribute('style', 'display:block');
        icon2.setAttribute('style', 'display:block');
    }, 200);
}

function hideGalleryIcon(ref)
{
    var icon1 = ref.getElementsByClassName('galleryImageLink1')[0];
    var icon2 = ref.getElementsByClassName('galleryImageLink2')[0];
    setTimeout(function() {
        icon1.setAttribute('style', 'display:none');
        icon2.setAttribute('style', 'display:none');
    },200);

}

/* **** slider ** */

jQuery(document).ready(function() {
    var url=''+window.location;
    var t=url.substring(url.lastIndexOf('#'),url.length);
    jQuery('.subMenu').smint({
        'scrollSpeed': 700
    });
    jQuery(t).trigger('click');
});