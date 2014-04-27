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
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
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

                    <div class="social_icons">
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
                                <li class="rss"><a href="<?php echo inkthemes_get_option('inkthemes_rss'); ?>" alt="RSS" title="RSS" target="_blank"></a></li>
                            <?php } ?>  
                            <?php if (inkthemes_get_option('inkthemes_pinterest') != '') { ?>
                                <li class="pn"><a href="<?php echo inkthemes_get_option('inkthemes_pinterest'); ?>" alt="Pinterest" title="Pinterest" target="_blank"></a></li>
                            <?php } ?> 
							
								<?php if (inkthemes_get_option('inkthemes_youtube') != '') { ?>
                                <li class="yt" ><a href="<?php echo inkthemes_get_option('inkthemes_youtube'); ?>" alt="YouTube icon" title="YouTube" target="_blank"></a></li> 
								<?php } ?>  

	<?php if (inkthemes_get_option('inkthemes_youtube') != '') { ?>
                                <li class="yt" ><a href="<?php echo inkthemes_get_option('inkthemes_youtube'); ?>" alt="YouTube icon" title="YouTube" target="_blank"></a></li> 
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

        <div class="clear"></div>
        <!-- Header condition2 starts here -->	

        <div class="header_wrapper">
            <div class="container_24">
                <div class="grid_24">
                    <div class="grid_6 alpha">
                        <div id="logo">
                            <a href="<?php echo home_url(); ?>"><img src="<?php if (inkthemes_get_option('inkthemes_logo') != '') { ?><?php echo inkthemes_get_option('inkthemes_logo'); ?><?php } else { ?><?php echo get_template_directory_uri(); ?>/images/logo.png<?php } ?>" alt="<?php bloginfo('name'); ?>" /></a></div>
                    </div>
                    <div class="grid_18 omega">
                        <div id="MainNav">                                  
                            <?php if (inkthemes_get_option('inkthemes_nav') != '') { ?><a href="#" class="mobile_nav closed"><?php echo stripslashes(inkthemes_get_option('inkthemes_nav')); ?><span></span></a>
<?php } else { ?> <a href="#" class="mobile_nav closed">Pages Navigation Menu<span></span></a>
<?php } ?>
<?php inkthemes_nav(); ?>
                        </div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>

