<!-- ***********************Footer Page Starts************************* -->
<div class="grid_6 alpha">
    <div class="footer_columns first">
        <?php if (is_active_sidebar('first-footer-widget-area')) : ?>
            <?php dynamic_sidebar('first-footer-widget-area'); ?>
        <?php else : ?>
            <h1>About Business</h1>
            <p>Often we have seen the hard part in creating your website is building your own slider. We wanted to make it simple and easy to use. So rather than having the hassles to create custom posts and then setting it as the Slider Template and then configuring some other options before the Slider appears on the Website.</p>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6">
    <div class="footer_columns second">
        <?php if (is_active_sidebar('second-footer-widget-area')) : ?>
            <?php dynamic_sidebar('second-footer-widget-area'); ?>
        <?php else : ?> 
            <h1>Recent News</h1>
            <ul>
                <li><a href="#">Photography Tips</a></li>
                <li><a href="#">How to design Logo</a></li>
                <li><a href="#">Install WordPress Theme</a></li>
                <li><a href="#">Unique Themes</a></li>
                <li><a href="#">Web Links</a></li>
            </ul>
        <?php endif; ?> 
    </div>
</div>
<div class="grid_6">
    <div class="footer_columns third">
        <?php if (is_active_sidebar('third-footer-widget-area')) : ?>
            <?php dynamic_sidebar('third-footer-widget-area'); ?>
        <?php else : ?>
            <h1>Contact Address</h1>
            <p>Often we have seen the hard part in creating your website is building your own slider. We wanted to make it simple and easy to use. </p>
            <div class='search-box'>
                <?php get_search_form(); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
<div class="grid_6 omega">
    <div class="footer_columns last">
        <?php if (is_active_sidebar('fourth-footer-widget-area')) : ?>
            <?php dynamic_sidebar('fourth-footer-widget-area'); ?>
        <?php else : ?>
            <div><h1>Gallery Widget</h1></div>
            <div class="gallery_widgets">
                <ul>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets1.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets1.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets2.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets2.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets3.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets3.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets4.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets4.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets5.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets5.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets6.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets6.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets7.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets7.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets8.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets8.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets9.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets9.jpg"/></a></li>
                    <li><a data-lightbox="footer-gallery" href="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets10.jpg"><img src="<?php bloginfo('stylesheet_directory'); ?>/images/gallery_widgets10.jpg"/></a></li>
                </ul>
            </div>
        <?php endif; ?>
    </div>
</div>
<!-- ***********************Footer Page Ends************************* -->

