<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
    <head>
        <meta charset="<?php bloginfo('charset'); ?>" />
        <title>
            <?php wp_title('&#124;', true, 'right'); ?><?php bloginfo('name'); ?>
        </title>
        <?php if (is_front_page()) { ?>
            <?php if (inkthemes_get_option('inkthemes_keyword') != '') { ?>
                <meta name="keywords" content="<?php echo inkthemes_get_option('inkthemes_keyword'); ?>" />
                <?php
            } else {
                
            }
            ?>
            <?php if (inkthemes_get_option('inkthemes_description') != '') { ?>
                <meta name="description" content="<?php echo inkthemes_get_option('inkthemes_description'); ?>" />
                <?php
            } else {
                
            }
            ?>
            <?php if (inkthemes_get_option('inkthemes_author') != '') { ?>
                <meta name="author" content="<?php echo inkthemes_get_option('inkthemes_author'); ?>" />
                <?php
            } else {
                
            }
            ?>
        <?php } ?>
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
        <link rel="profile" href="http://gmpg.org/xfn/11" />
        <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
        <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
        <noscript>
        <link rel="stylesheet" type="text/css" href="<?php bloginfo('template_url'); ?>/css/styleNoJS.css" />
        </noscript>	
    <!-- <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8/jquery.min.js"></script> -->

                <!--[if lte IE 8]><style>.main{display:none;} .support-note .note-ie{display:block;}</style><![endif]-->
        <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

        <?php wp_head(); ?>

    </head>
    <body <?php body_class(); ?> style="<?php if (inkthemes_get_option('inkthemes_bodybg') != '') { ?>background: fixed url(<?php echo inkthemes_get_option('inkthemes_bodybg'); ?>);<?php } else {
            ?>  <?php } ?>" >
        <!-- ******************top Social icon wrapper********* -->
        <div class="social_wrapper">
            <div class="container_24">
                <div class="grid_24">

                    <div id="call_us">
                        <div><img src="<?php bloginfo('stylesheet_directory'); ?>/images/phone_icon.png"></div><div>
                            <?php if (inkthemes_get_option('inkthemes_contact_number') != '') { ?>
                                <p>Call us on&nbsp;&nbsp;<?php echo inkthemes_get_option('inkthemes_contact_number'); ?></p>
                            <?php } else { ?>
                                <p>Call us on 2514578498</p>
                            <?php } ?>

                        </div>
                    </div>

                    <div class="social_icons home">
                        <ul class="social_logos">			
                            <?php if (inkthemes_get_option('inkthemes_facebook') != '') { ?>
                                <li class="fb"><a href="<?php echo inkthemes_get_option('inkthemes_facebook'); ?>" alt="Facebook icon" title="Facebook" target="_blank"></a></li>   
                            <?php } ?>  
                            <?php if (inkthemes_get_option('inkthemes_twitter') != '') { ?>
                                <li class="tw"><a href="<?php echo inkthemes_get_option('inkthemes_twitter'); ?>" alt="Twitter icon" title="Twitter" target="_blank"></a></li>
                            <?php } ?>  
                            <?php if (inkthemes_get_option('inkthemes_google') != '') { ?>
                                <li class="gp"><a href="<?php echo inkthemes_get_option('inkthemes_google'); ?>" alt="Google Plus icon" title="Google Plus" target="_blank"></a></li>
                            <?php } ?>  
                            <?php if (inkthemes_get_option('inkthemes_rss') != '') { ?>
                                <li class="rss"><a href="<?php echo inkthemes_get_option('inkthemes_rss'); ?>" alt="Rss" title="Rss" target="_blank"></a></li>
                            <?php } ?>  
                            <?php if (inkthemes_get_option('inkthemes_pinterest') != '') { ?>
                                <li class="pn"><a href="<?php echo inkthemes_get_option('inkthemes_pinterest'); ?>" alt="Pinterest" title="Pinterest" target="_blank"></a></li>
                            <?php } ?> 
                            <?php if (inkthemes_get_option('inkthemes_youtube') != '') { ?>
                                <li class="yt"><a href="<?php echo inkthemes_get_option('inkthemes_youtube'); ?>" alt="YouTube icon" title="YouTube" target="_blank"></a></li> 
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
                <div class="clear"></div>
            </div>
        </div>
        <!-- *********************Header Logo and menu Wrapper************************************** -->


        <!-- Header condition1 starts here -->

        <div class="header_wrapper subMenu" style=" z-index: 1000; ">
            <div class="container_24">
                <div class="grid_24">
                    <div class="grid_6 alpha">
                        <div id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php if (inkthemes_get_option('inkthemes_logo') != '') { ?><?php echo inkthemes_get_option('inkthemes_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
                    </div>
                    <div class="grid_18 omega">
                        <div class="home_navigation">
                            <div id="MainNav">                                  
                                <?php if (inkthemes_get_option('inkthemes_nav') != '') { ?><a href="#" class="mobile_nav closed"><?php echo stripslashes(inkthemes_get_option('inkthemes_nav')); ?><span></span></a>
                                <?php } else { ?> <a href="#" class="mobile_nav closed">Pages Navigation Menu<span></span></a>
                                <?php } ?>


                                <div id="menu">


                                    <ul class="ddsmoothmenu scrollmenuddsmooth">
                                        <li class="page_item"><a class='scrollSmint' id='home' href="#top">Home</a></li>
										
<?php
                $showhide_sections = inkthemes_get_option('inkthemes_services_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_our_services_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="services" href="#"><?php echo inkthemes_get_option('inkthemes_our_services_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="services" href="#">Services</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

												
<?php
                $showhide_sections = inkthemes_get_option('inkthemes_blog_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_recent_blog_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="blogs" href="#"><?php echo inkthemes_get_option('inkthemes_recent_blog_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="blogs" href="#">Recent Blogs</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

<?php
                $showhide_sections = inkthemes_get_option('inkthemes_gallery_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
												<?php if (inkthemes_get_option('inkthemes_gallery_portfolio_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="gallery" href="#"><?php echo inkthemes_get_option('inkthemes_gallery_portfolio_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="gallery" href="#">Gallery</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

<?php
                $showhide_sections = inkthemes_get_option('inkthemes_contact_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_our_contact_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="contact" href="#"><?php echo inkthemes_get_option('inkthemes_our_contact_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="contact" href="#">Contact</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

                                        <?php if (inkthemes_get_option('inkthemes_opt_menu_heading') != '') { ?>
                                            <li class="page_item"><a href="<?php echo inkthemes_get_option('inkthemes_opt_menu_link'); ?>"><?php echo inkthemes_get_option('inkthemes_opt_menu_heading'); ?></a></li>
                                        <?php } else { ?>
                                        <?php } 
										
										?>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- blank space placeholder -->
		<div class="header_wrapper subMenu" style="position: static !important; visibility: hidden">
            <div class="container_24">
                <div class="grid_24">
                    <div class="grid_6 alpha">
                        <div id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php if (inkthemes_get_option('inkthemes_logo') != '') { ?><?php echo inkthemes_get_option('inkthemes_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
                    </div>
                    <div class="grid_18 omega">
                        <div class="home_navigation">
                            <div id="MainNav">                                  
                                <?php if (inkthemes_get_option('inkthemes_nav') != '') { ?><a href="#" class="mobile_nav closed"><?php echo stripslashes(inkthemes_get_option('inkthemes_nav')); ?><span></span></a>
                                <?php } else { ?> <a href="#" class="mobile_nav closed">Pages Navigation Menu<span></span></a>
                                <?php } ?>


                                <div id="menu">


                                    <ul class="ddsmoothmenu scrollmenuddsmooth">
                                        <li class="page_item"><a class='scrollSmint' id='home' href="#top">Home</a></li>
										
<?php
                $showhide_sections = inkthemes_get_option('inkthemes_services_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_our_services_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="services" href="#"><?php echo inkthemes_get_option('inkthemes_our_services_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="services" href="#">Services</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

												
<?php
                $showhide_sections = inkthemes_get_option('inkthemes_blog_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_recent_blog_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="blogs" href="#"><?php echo inkthemes_get_option('inkthemes_recent_blog_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="blogs" href="#">Recent Blogs</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

<?php
                $showhide_sections = inkthemes_get_option('inkthemes_gallery_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
												<?php if (inkthemes_get_option('inkthemes_gallery_portfolio_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="gallery" href="#"><?php echo inkthemes_get_option('inkthemes_gallery_portfolio_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="gallery" href="#">Gallery</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

<?php
                $showhide_sections = inkthemes_get_option('inkthemes_contact_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_our_contact_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="contact" href="#"><?php echo inkthemes_get_option('inkthemes_our_contact_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="contact" href="#">Contact</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

                                        <?php if (inkthemes_get_option('inkthemes_opt_menu_heading') != '') { ?>
                                            <li class="page_item"><a href="<?php echo inkthemes_get_option('inkthemes_opt_menu_link'); ?>"><?php echo inkthemes_get_option('inkthemes_opt_menu_heading'); ?></a></li>
                                        <?php } else { ?>
                                        <?php } 
										
										?>
                                    </ul>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- blank space placeholder ends -->
    </div>
    <div class="clear"></div>
    <!-- Header condition2 starts here -->	
    <input type="hidden" id="txt_name" value="<?php if (inkthemes_get_option('inkthemes_slider_speed') != '') { ?><?php echo stripslashes(inkthemes_get_option('inkthemes_slider_speed')); ?><?php } else { ?>3000<?php } ?>"/>

    <!-- **********************header ends************************* -->
    <!-- **********************slider************************* -->
    <div class="flexslider">
        <ul class="slides">

            <!-- slider 1 --------------------------------------------------------------->				
            <li>
                <div class="slider_img_container">

                    <?php if (inkthemes_get_option('inkthemes_slideimage1') != '') { ?>
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage1'); ?>" alt="Slide Image 1"/>
                    <?php } else { ?>
                        <img src="<?php echo get_template_directory_uri(); ?>/images/1.jpg" alt="slides img1">
                    <?php } ?>

                    <div class="slider_text_container"><div class="container_24"><div class="grid_24">
                                <?php if (inkthemes_get_option('inkthemes_sliderheading1') != '') { ?>
                                    <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink1'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading1'); ?></a></h2>
                                <?php } else { ?>
                                    <h2><a>A bene placito.</a></h2>
                                <?php } ?>
                                <?php if (inkthemes_get_option('inkthemes_sliderdes1') != '') { ?>
                                    <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes1'); ?></a></p>
                                <?php } else { ?>

                                    <p><a>You have just dined, and however scrupulously the slaughterhouse is concealed in the graceful distance of miles, there is complicity.</a></p>

                                <?php } ?>
                            </div></div></div>
                </div>
            </li>
            <!-- slider 2 --------------------------------------------------------------->					


            <?php if (inkthemes_get_option('inkthemes_slideimage2') != '') { ?>
                <li><div class="slider_img_container">
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage2'); ?>" alt="Slide Image 2"/>



                        <?php if (inkthemes_get_option('inkthemes_sliderheading2') != '') { ?>
                            <div class="slider_text_container"><div class="container_24"><div class="grid_24">		
                                        <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink2'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading2'); ?></a></h2>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_sliderdes2') != '') { ?>
                                        <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes2'); ?></a></p>

                                    </div></div></div>
                        <?php } else { ?>

                        <?php } ?>
                    </div>
                </li>
            <?php } else { ?>

            <?php } ?>

            <!-- slider 3 --------------------------------------------------------------->					

            <?php if (inkthemes_get_option('inkthemes_slideimage3') != '') { ?>
                <li><div class="slider_img_container">
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage3'); ?>" alt="Slide Image 3"/>


                        <?php if (inkthemes_get_option('inkthemes_sliderheading3') != '') { ?>
                            <div class="slider_text_container"><div class="container_24"><div class="grid_24">		
                                        <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink3'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading3'); ?></a></h2>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_sliderdes3') != '') { ?>
                                        <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes3'); ?></a></p>

                                    </div></div></div>
                        <?php } else { ?> 

                        <?php } ?>
                    </div></li>
            <?php } else { ?>

            <?php } ?>

            <!-- slider 4 --------------------------------------------------------------->	

            <?php if (inkthemes_get_option('inkthemes_slideimage4') != '') { ?>
                <li><div class="slider_img_container">
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage4'); ?>" alt="Slide Image 4"/>

                        <?php if (inkthemes_get_option('inkthemes_sliderheading4') != '') { ?>
                            <div class="slider_text_container"><div class="container_24"><div class="grid_24">
                                        <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink4'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading4'); ?></a></h2>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_sliderdes4') != '') { ?>
                                        <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes4'); ?></a></p>

                                    </div></div></div>
                        <?php } else { ?> 

                        <?php } ?>
                    </div></li>
            <?php } else { ?>

            <?php } ?>



            <!-- slider 5 --------------------------------------------------------------->		


            <?php if (inkthemes_get_option('inkthemes_slideimage5') != '') { ?>
                <li><div class="slider_img_container">
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage5'); ?>" alt="Slide Image 5"/>


                        <?php if (inkthemes_get_option('inkthemes_sliderheading5') != '') { ?>
                            <div class="slider_text_container"><div class="container_24"><div class="grid_24">
                                        <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink5'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading5'); ?></a></h2>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_sliderdes5') != '') { ?>
                                        <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes5'); ?></a></p>

                                    </div></div></div>

                        <?php } else { ?>

                        <?php } ?>
                    </div></li>
            <?php } else { ?>

            <?php } ?>



            <!-- slider 6 --------------------------------------------------------------->	



            <?php if (inkthemes_get_option('inkthemes_slideimage6') != '') { ?>
                <li><div class="slider_img_container">
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage6'); ?>" alt="Slide Image 6"/>


                        <?php if (inkthemes_get_option('inkthemes_sliderheading6') != '') { ?>
                            <div class="slider_text_container"><div class="container_24"><div class="grid_24">
                                        <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink6'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading6'); ?></a></h2>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_sliderdes6') != '') { ?>
                                        <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes6'); ?></a></p>
                                    </div></div></div>
                        <?php } else { ?>

                        <?php } ?>
                    </div></li>
            <?php } else { ?>

            <?php } ?>


            <!-- slider 7 --------------------------------------------------------------->				



            <?php if (inkthemes_get_option('inkthemes_slideimage7') != '') { ?>
                <li><div class="slider_img_container">
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage7'); ?>" alt="Slide Image 7"/>


                        <?php if (inkthemes_get_option('inkthemes_sliderheading7') != '') { ?>
                            <div class="slider_text_container"><div class="container_24"><div class="grid_24">
                                        <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink7'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading7'); ?></a></h2>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_sliderdes7') != '') { ?>
                                        <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes7'); ?></a></p>
                                    </div></div></div>
                        <?php } else { ?>

                        <?php } ?>
                    </div></li>
            <?php } else { ?>

            <?php } ?>



            <!-- slider 8 --------------------------------------------------------------->




            <?php if (inkthemes_get_option('inkthemes_slideimage8') != '') { ?>
                <li><div class="slider_img_container">
                        <img  src="<?php echo inkthemes_get_option('inkthemes_slideimage8'); ?>" alt="Slide Image 8"/>


                        <?php if (inkthemes_get_option('inkthemes_sliderheading8') != '') { ?>
                            <div class="slider_text_container"><div class="container_24"><div class="grid_24">
                                        <h2><a href="<?php echo inkthemes_get_option('inkthemes_Sliderlink8'); ?>"><?php echo inkthemes_get_option('inkthemes_sliderheading8'); ?></a></h2>
                                    <?php } else { ?>

                                    <?php } ?>
                                    <?php if (inkthemes_get_option('inkthemes_sliderdes8') != '') { ?>
                                        <p><a><?php echo inkthemes_get_option('inkthemes_sliderdes8'); ?></a></p>
                                    </div></div></div>
                        <?php } else { ?>

                        <?php } ?>
                    </div></li>
            <?php } else { ?>

            <?php } ?>




            <!-- slider 8 ends --------------------------------------------------------------->

        </ul>
    </div>
    <div class="clear"></div>
    <!-- ***********************Featured Text Area Block************************* -->
	<?php
                $showhide_sections = inkthemes_get_option('inkthemes_featured_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
    <!-- ***********************Featured Text Area Block************************* -->
    <?php if (inkthemes_get_option('inkthemes_bodybg') != '') { ?>
        <div class="featured_text_area default_bg" style="background: url(<?php echo stripslashes(inkthemes_get_option('inkthemes_bodybg')); ?>);">
        <?php } else { ?>
            <div class="featured_text_area default_bg">
            <?php } ?>
            <div class="container_24">
                <?php if (inkthemes_get_option('inkthemes_page_main_heading') != '') { ?>
                    <h1 id="fta_top"><?php echo stripslashes(inkthemes_get_option('inkthemes_page_main_heading')); ?></h1>
                <?php } else { ?>
                    <h2 id="fta_top">Premium WordPress Themes with Single Click Installation</h2>
                <?php } ?>
                <?php if (inkthemes_get_option('inkthemes_page_sub_heading') != '') { ?>
                    <p id="fta_bottom"><?php echo stripslashes(inkthemes_get_option('inkthemes_page_sub_heading')); ?></p>
                <?php } else { ?>
                    <p id="fta_bottom">Just a Click and your website is ready for use. Your Site is faster to built, easy to use & Search Engine Optimized.</p>
                <?php } ?>
            </div>
        </div>
		<?php } else { } ?>
		 <!-- ***********************Featured Text Area Block Ends************************* -->
        <div class="clear"></div>
        <!-- ***********************Our Services block************************* -->
		<?php
                $showhide_sections = inkthemes_get_option('inkthemes_services_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
        <!-- ***********************Our Services block************************* -->
        <div class="homepage_nav_title services" id="services">
            <?php if (inkthemes_get_option('inkthemes_our_services_heading') != '') { ?>
                <h1 class="index_titles"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_heading')); ?></h1>
            <?php } else { ?>
                <h1 class="index_titles">Our Services</h1>
            <?php } ?>

        </div>
        <div class="clear"></div>
        <!-- **content starts here** -->
        <?php if (inkthemes_get_option('inkthemes_bodybg') != '') { ?>
            <div class="services_block default_bg" style="background: url(<?php echo stripslashes(inkthemes_get_option('inkthemes_bodybg')); ?>);">
            <?php } else { ?>
                <div class="services_block default_bg">
                <?php } ?>	

                <div class="container_24">
                    <div class="grid_24">
                        <!-- box -->

                        <div class="services_box_container">
                            <ul class="ch-grid">
                                <!-- box1 -->
                                <li id="services_box_container1">

                                    <?php if (inkthemes_get_option('inkthemes_our_services_image1') != '') { ?>
                                        <div class="ch-item ch-img-1" style="background: url(<?php echo inkthemes_get_option('inkthemes_our_services_image1'); ?>);">	
                                        <?php } else { ?>
                                            <div class="ch-item ch-img-1" style="background: url(<?php echo get_template_directory_uri(); ?>/images/circle_img1.jpg);">
                                            <?php } ?>
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-1">
                                                        <?php if (inkthemes_get_option('inkthemes_our_services_image1') != '') { ?>
                                                            <img src="<?php echo inkthemes_get_option('inkthemes_our_services_image1'); ?>" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/circle_img1.jpg" />
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="rect_box">
                                            <?php if (inkthemes_get_option('inkthemes_our_services_title1') != '') { ?>
                                                <p class="services_box_rect_head"><a <?php if (inkthemes_get_option('inkthemes_services_title_link1') != '') { ?>href="<?php echo stripslashes(inkthemes_get_option('inkthemes_services_title_link1')); ?><?php } else { ?><?php } ?>" target="_blank"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_title1')); ?></a></p>
                                            <?php } else { ?>
                                                <p class="services_box_rect_head"><a href="http://inkthemes.com">Single Click Installation</a></p>
                                            <?php } ?>
                                            <?php if (inkthemes_get_option('inkthemes_our_services_desc1') != '') { ?>
                                                <p class="services_box_rect_para"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_desc1')); ?></p>
                                            <?php } else { ?>

                                                <p class="services_box_rect_para">Just a Click and your website is ready for use. Your Site is faster to built, easy to use & Search Engine Optimized.</p>
                                            <?php } ?>
                                        </div>
                                </li>
                                <!-- box2 -->
                                <li id="services_box_container2">

                                    <?php if (inkthemes_get_option('inkthemes_our_services_image2') != '') { ?>
                                        <div class="ch-item ch-img-2" style="background: url(<?php echo inkthemes_get_option('inkthemes_our_services_image2'); ?>);">
                                        <?php } else { ?>							
                                            <div class="ch-item ch-img-2" style="background: url(<?php echo get_template_directory_uri(); ?>/images/circle_img2.jpg);">	
                                            <?php } ?>
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-2">
                                                        <?php if (inkthemes_get_option('inkthemes_our_services_image2') != '') { ?>
                                                            <img src="<?php echo inkthemes_get_option('inkthemes_our_services_image2'); ?>" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/circle_img2.jpg" />
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="rect_box">
                                            <?php if (inkthemes_get_option('inkthemes_our_services_title2') != '') { ?>
                                                <p class="services_box_rect_head"><a <?php if (inkthemes_get_option('inkthemes_services_title_link2') != '') { ?>href="<?php echo stripslashes(inkthemes_get_option('inkthemes_services_title_link2')); ?><?php } else { ?><?php } ?>" target="_blank"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_title2')); ?></a></p>
                                            <?php } else { ?>
                                                <p class="services_box_rect_head"><a href="http://inkthemes.com">Single Click Installation</a></p>
                                            <?php } ?>
                                            <?php if (inkthemes_get_option('inkthemes_our_services_desc2') != '') { ?>
                                                <p class="services_box_rect_para"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_desc2')); ?></p>
                                            <?php } else { ?>

                                                <p class="services_box_rect_para">Just a Click and your website is ready for use. Your Site is faster to built, easy to use & Search Engine Optimized.</p>
                                            <?php } ?>
                                        </div>
                                </li>
                                <!-- box3 -->
                                <li id="services_box_container3">

                                    <?php if (inkthemes_get_option('inkthemes_our_services_image3') != '') { ?>
                                        <div class="ch-item ch-img-2" style="background: url(<?php echo inkthemes_get_option('inkthemes_our_services_image3'); ?>);">
                                        <?php } else { ?>							
                                            <div class="ch-item ch-img-3" style="background: url(<?php echo get_template_directory_uri(); ?>/images/circle_img3.jpg);">	
                                            <?php } ?>
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-3">
                                                        <?php if (inkthemes_get_option('inkthemes_our_services_image3') != '') { ?>
                                                            <img src="<?php echo inkthemes_get_option('inkthemes_our_services_image3'); ?>" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/circle_img3.jpg" />
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="rect_box">
                                            <?php if (inkthemes_get_option('inkthemes_our_services_title3') != '') { ?>
                                                <p class="services_box_rect_head"><a <?php if (inkthemes_get_option('inkthemes_services_title_link3') != '') { ?>href="<?php echo stripslashes(inkthemes_get_option('inkthemes_services_title_link3')); ?><?php } else { ?><?php } ?>" target="_blank"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_title3')); ?></a></p>
                                            <?php } else { ?>
                                                <p class="services_box_rect_head"><a href="http://inkthemes.com">Single Click Installation</a></p>
                                            <?php } ?>
                                            <?php if (inkthemes_get_option('inkthemes_our_services_desc3') != '') { ?>
                                                <p class="services_box_rect_para"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_desc3')); ?></p>
                                            <?php } else { ?>

                                                <p class="services_box_rect_para">Just a Click and your website is ready for use. Your Site is faster to built, easy to use & Search Engine Optimized.</p>
                                            <?php } ?>
                                        </div>
                                </li>
                                <!-- box4 -->
                                <li id="services_box_container4">


                                    <?php if (inkthemes_get_option('inkthemes_our_services_image4') != '') { ?>
                                        <div class="ch-item ch-img-4" style="background: url(<?php echo inkthemes_get_option('inkthemes_our_services_image4'); ?>);">
                                        <?php } else { ?>							
                                            <div class="ch-item ch-img-4" style="background: url(<?php echo get_template_directory_uri(); ?>/images/circle_img4.jpg);">	
                                            <?php } ?>
                                            <div class="ch-info-wrap">
                                                <div class="ch-info">
                                                    <div class="ch-info-front ch-img-4">
                                                        <?php if (inkthemes_get_option('inkthemes_our_services_image4') != '') { ?>
                                                            <img src="<?php echo inkthemes_get_option('inkthemes_our_services_image4'); ?>" />
                                                        <?php } else { ?>
                                                            <img src="<?php echo get_template_directory_uri(); ?>/images/circle_img4.jpg" />
                                                        <?php } ?>
                                                    </div>

                                                </div>
                                            </div>

                                        </div>
                                        <div class="rect_box">
                                            <?php if (inkthemes_get_option('inkthemes_our_services_title4') != '') { ?>
                                                <p class="services_box_rect_head"><a <?php if (inkthemes_get_option('inkthemes_services_title_link4') != '') { ?>href="<?php echo stripslashes(inkthemes_get_option('inkthemes_services_title_link4')); ?><?php } else { ?><?php } ?>" target="_blank"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_title4')); ?></a></p>
                                            <?php } else { ?>
                                                <p class="services_box_rect_head"><a href="http://inkthemes.com">Single Click Installation</a></p>
                                            <?php } ?>
                                            <?php if (inkthemes_get_option('inkthemes_our_services_desc4') != '') { ?>
                                                <p class="services_box_rect_para"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_services_desc4')); ?></p>
                                            <?php } else { ?>

                                                <p class="services_box_rect_para">Just a Click and your website is ready for use. Your Site is faster to built, easy to use & Search Engine Optimized.</p>
                                            <?php } ?>
                                        </div>
                                </li>
                            </ul>
                        </div>
                        <!-- box4 ends -->
                    </div>

                    <div class="clear"></div>
                </div>
            </div>
			<?php } else { } // section on off ands?>
            <!-- ***********************Services section ends************************* -->
            <!-- ***********************Recent Blogs************************* -->
			<?php
                $showhide_sections = inkthemes_get_option('inkthemes_blog_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
            <!-- ***********************Recent Blogs************************* -->
            <div class="homepage_nav_title blogs" id="blogs">
                <?php if (inkthemes_get_option('inkthemes_recent_blog_heading') != '') { ?>
                    <h1 class="index_titles"><?php echo stripslashes(inkthemes_get_option('inkthemes_recent_blog_heading')); ?></h1>
                <?php } else { ?>
                    <h1 class="index_titles">Recent Blogs</h1>
                <?php } ?>
                <div class="clear"></div>
            </div>

            <!-- ***Recent blog container starts** -->
            <?php if (inkthemes_get_option('inkthemes_bodybg') != '') { ?>
                <div class="featured_blog_content default_bg" style="background: url(<?php echo stripslashes(inkthemes_get_option('inkthemes_bodybg')); ?>);">
                <?php } else { ?>
                    <div class="featured_blog_content default_bg">
                    <?php } ?>	

                    <div class="container_24"><div class="grid_24">
                            <!-- Start the Loop. -->
							<?php query_posts($query_string . '&orderby=date&order=DESC'); ?>
                            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>  
                                    <?php
                                    static $count = 0;
                                    if ($count == "6") {
                                        break;
                                    } else {
                                        ?>

                                        <!--post start-->

                                        <?php
                                       
                                            if (strpos($post->post_content, '[gallery') !== false) {
                                                continue;
                                            } else {
                                                ?>
                                                <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                                                    <div class="post_heading_wrapper">
                                                        <div class="postimage_container">
                                                            <span class="thumb">

                                                               <?php if ( get_the_post_thumbnail($post_id) != '' ) {

  echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
   the_post_thumbnail();
  echo '</a>';

} else {

 echo '<a href="'; the_permalink(); echo '" class="thumbnail-wrapper">';
 echo '<img src="';
 echo catch_that_image();
 echo '" alt="" />';
 echo '</a>';

} ?>
                                                                <span>
                                                                    <?php
                                                                    // Get the Name of First Category
//Fetching all the categories for the post and displaying first pocket
                                                                    the_category(', ');
                                                                    ?>
                                                                </span>
                                                            </span>
                                                            <div class="clear"></div>
                                                        </div>
                                                        <ul class="post_meta">
                                                            <li class="day"><?php echo get_the_time('d') ?></li>
                                                            <li class="month"><?php echo get_the_time('M') ?></li>
                                                            <li class="year"><?php echo get_the_time('Y') ?></li>
                                                            <li class="posted_by"><span>by&nbsp;</span><?php the_author_posts_link(); ?></li>
                                                            <li class="post_comment"><?php comments_popup_link('No Comments.', '1 Comment.', '% Comments.'); ?></li>
                                                        </ul>
                                                        <h1 class="post_title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h1>
                                                    </div>
                                                    <div class="post_content">
                                                        <?php the_excerpt(); ?>

                                                        <a class="read-more" href="<?php the_permalink() ?>"><?php echo READ_MORE; ?></a>
                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                                <!--End Post-->
                                            <?php
                                            
                                        }
                                        ?>
                                        <?php
                                        $count++;
                                    }
                                    ?>
                                    <?php
                                endwhile;
                            else:
                                ?>

                                <div class="blogs_page_container">
                                    <p>
                                <?php echo SORRY_NO_POST_MATCHED_YOUR_CRITERIA; ?>
                                    </p>
                                </div>
<?php endif; ?>
                            <!--End Loop-->
                            <!--All Post Link Start-->
<?php if (inkthemes_get_option('inkthemes_all_post_link') != '') { ?>
<div class="all_post_link">
	<a href="<?php echo stripslashes(inkthemes_get_option('inkthemes_all_post_link')); ?>">
	<?php if (inkthemes_get_option('inkthemes_all_post_link_text') != '') { ?>
		<span data-title="<?php echo stripslashes(inkthemes_get_option('inkthemes_all_post_link_text')); ?>"><?php echo stripslashes(inkthemes_get_option('inkthemes_all_post_link_text')); ?></span>
		<?php } else { ?>
		<span data-title="All Posts">All Posts</span>
		<?php } ?>
	</a>
</div>
<?php } else { } ?>
							
                            <!--All Post Link End-->
							
                        </div></div>
                </div>
				<?php } else { } // section on off ands?>
                <div class="clear"></div>
				
                <!-- ***Recent blog container* ends** -->
                <!-- ***********************Gallery Page************************* -->
				<?php
                $showhide_sections = inkthemes_get_option('inkthemes_gallery_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                <!-- ***********************Gallery Page************************* -->
                <div class="homepage_nav_title gallery" id="gallery">
                    <?php if (inkthemes_get_option('inkthemes_gallery_portfolio_heading') != '') { ?>
                        <h1 class="index_titles"><?php echo stripslashes(inkthemes_get_option('inkthemes_gallery_portfolio_heading')); ?></h1>
                    <?php } else { ?>
                        <h1 class="index_titles">Gallery Page</h1>
<?php } ?>
                </div>
                <div class="clear"></div>
                <!-- **Gallery content** -->
                    <?php if (inkthemes_get_option('inkthemes_bodybg') != '') { ?>
                    <div class="gallery_wrapper default_bg" style="background: url(<?php echo stripslashes(inkthemes_get_option('inkthemes_bodybg')); ?>);">
                        <?php } else { ?>
                        <div class="gallery_wrapper default_bg">
<?php } ?>

                        <div class="container_24">
                            <div class="grid_24">
                                <div id="container">
                                    <div class="gallery_tabs">

                                        <ul id="filters">
                                            <li data-filter="all"><a>All</a></li>
                                            <?php
                                            $taxonomy = 'filter';
                                            $queried_term = get_query_var($taxonomy);
                                            $terms = get_terms($taxonomy, 'slug=' . $queried_term);
                                            if ($terms) {
                                                foreach ($terms as $term) {
                                                    ?>
                                                    <li data-filter="<?php echo $term->name; ?>"><a><?php echo $term->name; ?></a></li>

                                                    <?php
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                    <br/>

                                    <div id="main" role="main">

                                        <ul id="tiles" class="gallery clearfix">
                                            <!--
                                              These are our grid items. Notice how each one has classes assigned that
                                              are used for filtering. The classes match the "data-filter" properties above.
                                            -->

                                            <!-- Gallery image1 --> 
                                            <?php
                                            $args = array('post_type' => 'gallery_post', 'posts_per_page' => 1000);
                                            query_posts($args);

// the Loop
                                            while (have_posts()) : the_post();
                                                //Do your stuff  
                                                //You can access your feature image like this:
                                                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                                                $gterm = wp_get_post_terms($post->ID, 'filter');
                                                if ($gterm != null) {
                                                    foreach ($gterm as $term) {
                                                        // Print the name method from $term which is an OBJECT
                                                        $gtag = $term->name;
                                                        // Get rid of the other data stored in the object, since it's not needed
                                                    }
                                                }
                                                ?>

                                                <li data-filter-class='["<?php echo $gtag; ?>", "all"]'>
                                                    <div class="lab_item">
                                                        <div class="hexagon hexagon2">
                                                            <div class="hexagon-in1">
                                                                <div class="hexagon-in2" onmouseout="hideGalleryIcon(this)" onmouseover="showGalleryIcon(this);" style="background-image: url(<?php if ( get_the_post_thumbnail($post_id) != '' ) {
																 echo $feat_image;
																 }else {
																echo catch_that_image(); } ?>);"> <a style='display:none;' data-lightbox="roadtrip" class="galleryImageLink1" href='<?php if ( get_the_post_thumbnail($post_id) != '' ) {
																 echo $feat_image;
																 }else {
																echo catch_that_image(); } ?>'><img src='<?php bloginfo('stylesheet_directory'); ?>/images/image-zoom-icon.png' /></a><a style='display:none;' class="galleryImageLink2" href='<?php the_permalink() ?>'><img src='<?php bloginfo('stylesheet_directory'); ?>/images/image-link-icon.png'/></a></div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </li>
                                                <?php
                                            endwhile;
                                            ?>

                                            <!-- End of Hex Gallery image--> 


                                            <!-- End of grid blocks -->
                                        </ul>

                                    </div>
                                </div>




                            </div>
                        </div>
                    </div>
					<?php } else { } // section on off ands?>
                    <div class="clear"></div>
                    <!-- *******************************Gallery Ends here***************** -->

                    <!-- ***********************Contact Page************************* -->
					<?php
                $showhide_sections = inkthemes_get_option('inkthemes_contact_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                    <!-- ***********************Contact Page************************* -->
                    <div class="homepage_nav_title contact" id="contact">
                        <?php if (inkthemes_get_option('inkthemes_our_contact_heading') != '') { ?>
                            <h1 class="index_titles"><?php echo stripslashes(inkthemes_get_option('inkthemes_our_contact_heading')); ?></h1>
                        <?php } else { ?>
                            <h1 class="index_titles">Contact</h1>
<?php } ?>
                    </div>



                    <div class="clear"></div>
                    <!-- ***contact content*** -->
                        <?php if (inkthemes_get_option('inkthemes_bodybg') != '') { ?>
                        <div class="contact_wrapper default_bg" style="background: url(<?php echo stripslashes(inkthemes_get_option('inkthemes_bodybg')); ?>);">
                            <?php } else { ?>
                            <div class="contact_wrapper default_bg">
<?php } ?>
                            <div class="container_24">
                                <div class="grid_24">
                                    <div class="contact_container">
                                        <div class="grid_12 alpha">
                                            <div class="contact_input">
                                                <?php if (inkthemes_get_option('inkthemes_our_contact_input_iframe_heading') != '') { ?>
                                                    <h1><?php echo stripslashes(inkthemes_get_option('inkthemes_our_contact_input_iframe_heading')); ?></h1>
                                                <?php } else { ?>
                                                    <h1>Create your own form at <a href="http://formget.com/app" target="_blank">formget.com/app</a></h1>
                                                <?php } ?>
                                                <?php if (inkthemes_get_option('inkthemes_contact_iframe_code') != '') { ?>
                                                    <?php echo stripslashes(inkthemes_get_option('inkthemes_contact_iframe_code')); ?>
                                                <?php } else { ?>
    <?php get_template_part('contact'); ?>
<?php } ?>
                                            </div>
                                        </div>
                                        <div class="grid_12" omega>
                                            <div class="add_n_map">
                                                <div class="anchor_bordera"><a class="anchor_a"></a>
                                                    <?php if (inkthemes_get_option('inkthemes_our_contact_sub_heading') != '') { ?>
                                                        <h1><?php echo stripslashes(inkthemes_get_option('inkthemes_our_contact_sub_heading')); ?></h1>
                                                    <?php } else { ?>
                                                        <h1>Address &amp; Contact</h1>
                                                    <?php } ?>
                                                </div>
                                                <div><div class="contact-image-bookmark-icon"></div>
                                                    <?php if (inkthemes_get_option('inkthemes_contact_address') != '') { ?>
                                                        <p><?php echo stripslashes(inkthemes_get_option('inkthemes_contact_address')); ?></p>
                                                    <?php } else { ?>
                                                        <p>Address -  E- 3, Arera Colony, 10 No. Market Bhopal , MP</p>
                                                    <?php } ?>
                                                </div>
                                                <div><div class="contact-image-tele-icon"></div>
                                                    <?php if (inkthemes_get_option('inkthemes_contact_phone_no') != '') { ?>
                                                        <p><?php echo stripslashes(inkthemes_get_option('inkthemes_contact_phone_no')); ?></p>
                                                    <?php } else { ?>
                                                        <p>Phone - 1245 213 689</p>
                                                    <?php } ?>
                                                </div>
                                                <div><div class="contact-image-mail-icon"></div>
                                                    <?php if (inkthemes_get_option('inkthemes_ontact_email') != '') { ?>
                                                        <p><?php echo stripslashes(inkthemes_get_option('inkthemes_ontact_email')); ?></p>
                                                    <?php } else { ?>
                                                        <p>Email - info@inkthemes.com</p>
                                                    <?php } ?>
                                                </div>
                                                <div><div class="contact-image-globe-icon"></div>
                                                    <?php if (inkthemes_get_option('inkthemes_contact_website') != '') { ?>
                                                        <p><?php echo stripslashes(inkthemes_get_option('inkthemes_contact_website')); ?></p>
                                                    <?php } else { ?>
                                                        <p>Website - www.inkthemes.com</p>
                                                    <?php } ?>
                                                </div>
                                                <div class="anchor_border"><a class="anchor_b"></a>
                                                    <?php if (inkthemes_get_option('inkthemes_contact_location_map_heading') != '') { ?>
                                                        <h1 id="loc_nmap"><?php echo stripslashes(inkthemes_get_option('inkthemes_contact_location_map_heading')); ?></h1>
                                                    <?php } else { ?>
                                                        <h1 id="loc_nmap">Location Map</h1>
<?php } ?>
                                                </div>
                                                <div class="map">
                                                    <div class="map_inner">
                                                        <?php if (inkthemes_get_option('inkthemes_contact_map') != '') { ?>
                                                            <?php echo stripslashes(inkthemes_get_option('inkthemes_contact_map')); ?>
                                                        <?php } else { ?>
                                                            <iframe width="425" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=golf+club+near+West+Valley+Freeway,+San+Jose,+CA,+United+States&amp;aq=1&amp;oq=goSilicon+Valley+Boulevard,+San+Jose,+CA,+United+States&amp;sll=37.293271,-121.833927&amp;sspn=0.184362,0.41851&amp;ie=UTF8&amp;hq=golf+club&amp;hnear=W+Valley+Fwy,+San+Jose,+Santa+Clara,+California,+United+States&amp;t=m&amp;fll=37.254551,-121.968627&amp;fspn=0.025995,0.059953&amp;st=103241701817924407489&amp;rq=1&amp;ev=zo&amp;split=1&amp;ll=37.293174,-121.833916&amp;spn=0.023057,0.052314&amp;output=embed"></iframe><br /><small><a href="https://maps.google.co.in/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=golf+club+near+West+Valley+Freeway,+San+Jose,+CA,+United+States&amp;aq=1&amp;oq=goSilicon+Valley+Boulevard,+San+Jose,+CA,+United+States&amp;sll=37.293271,-121.833927&amp;sspn=0.184362,0.41851&amp;ie=UTF8&amp;hq=golf+club&amp;hnear=W+Valley+Fwy,+San+Jose,+Santa+Clara,+California,+United+States&amp;t=m&amp;fll=37.254551,-121.968627&amp;fspn=0.025995,0.059953&amp;st=103241701817924407489&amp;rq=1&amp;ev=zo&amp;split=1&amp;ll=37.293174,-121.833916&amp;spn=0.023057,0.052314" style="color:#0000FF;text-align:left">View Larger Map</a></small>
<?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<?php } else { } // section on off ands?>
                        <div class="clear"></div>


                        <!-- ***********************Contact Page Ends************************* -->
<?php get_footer(); ?> 