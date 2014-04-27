<!-- ***********************Footer Page Starts************************* -->
<div class="footer">
    <div class="container_24">
        <div class="grid_24">
            <?php
            /* A sidebar in the footer? Yep. You can can customize
             * your footer with four columns of widgets.
             */
            get_sidebar('footer');
            ?>
        </div>
    </div>
</div>
<!-- ***********************Footer Page Ends************************* -->


<!-- ***********************Copyright starts************************* -->
<div class="copyright_wrapper">
    <div class="container_24">
        <div class="grid_24">
            <div class="grid_12 alpha">
                <div class="copyright_text">
                    <?php if (inkthemes_get_option('inkthemes_footertext') != '') { ?>
                        <p class="font_champagne"><?php echo inkthemes_get_option('inkthemes_footertext'); ?></p>
                    <?php } else { ?>
                        <p class="font_champagne"><?php echo date('Y'); ?> &copy; InkThemes. All rights reserved.</p>
                    <?php } ?>
                </div>
            </div>
            <div class="grid_12 omega">
                <div class="footer_social_icons">
                    <ul class="social_logos">			
                        <?php if (inkthemes_get_option('inkthemes_facebook') != '') { ?>
                            <li class="fb"><a href="<?php echo inkthemes_get_option('inkthemes_facebook'); ?>" alt="Facebook icon" target="_blank"></a></li>   
                        <?php } ?>  
                        <?php if (inkthemes_get_option('inkthemes_twitter') != '') { ?>
                            <li class="tw"><a href="<?php echo inkthemes_get_option('inkthemes_twitter'); ?>" alt="Twitter icon" target="_blank"></a></li>
                        <?php } ?>  
                        <?php if (inkthemes_get_option('inkthemes_google') != '') { ?>
                            <li class="gp"><a href="<?php echo inkthemes_get_option('inkthemes_google'); ?>" alt="Google Plus icon" target="_blank"></a></li>
                        <?php } ?>  
                        <?php if (inkthemes_get_option('inkthemes_rss') != '') { ?>
                            <li class="rss"><a href="<?php echo inkthemes_get_option('inkthemes_rss'); ?>" alt="RSS" target="_blank"></a></li>
                        <?php } ?>  
                        <?php if (inkthemes_get_option('inkthemes_pinterest') != '') { ?>
                            <li class="pn"><a href="<?php echo inkthemes_get_option('inkthemes_pinterest'); ?>" alt="Pinterest" target="_blank"></a></li>
                        <?php } ?> 
                        <?php if (inkthemes_get_option('inkthemes_youtube') != '') { ?>
                            <li class="yt"><a href="<?php echo inkthemes_get_option('inkthemes_youtube'); ?>" alt="YouTube icon" target="_blank"></a></li> 
                            <?php } ?> 
						<?php if (inkthemes_get_option('inkthemes_vimeo') != '') { ?>
                                <li class="vm"><a href="<?php echo inkthemes_get_option('inkthemes_vimeo'); ?>" alt="Vimeo" title="Vimeo" target="_blank"></a></li>
                            <?php } ?> 

<?php if (inkthemes_get_option('inkthemes_linkedin') != '') { ?>
                                <li class="ln"><a href="<?php echo inkthemes_get_option('inkthemes_linkedin'); ?>" alt="Linkedin" title="Linkedin" target="_blank"></a></li>
                            <?php } ?> 

                    </ul> 
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ***********************Copyright Ends************************* -->
<?php wp_footer(); ?>
</body>
</html>