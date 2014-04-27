<?php
/**
  Template Name: Fullwidth Template
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query. 
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 */
?>
<?php get_header(); ?>

<!-- blog title -->
<div class="homepage_nav_title section" id="contact">
    <div class="container_24">
        <div class="index_titles blog single"><?php if (function_exists('inkthemes_breadcrumbs')) inkthemes_breadcrumbs(); ?></div>
    </div>
</div>
<div class="clear"></div>
<!-- blog title ends -->

<div class="blog_pages_wrapper default_bg">
    <div class="container_24">
        <div class="grid_24">


            <!--page start-->
            <div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="post_heading_wrapper page_heading">
                    <h1 class="post_title"><?php the_title(); ?></h1>
                </div>
                <div class="post_content">
                    <?php if (have_posts()) : the_post(); ?>
                        <?php the_content(); ?>	
                    <?php endif; ?>
                </div>
                <div class="clear"></div>
            </div>
            <!--End Page-->
            <div class="clear"></div>

            <!--Sidebar-->


        </div>
    </div>
</div>

<div class="clear"></div>
<?php get_footer(); ?>