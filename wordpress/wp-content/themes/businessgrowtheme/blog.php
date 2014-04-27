<?php
/*
  Template Name: Blog Page
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
            <div class="grid_16 alpha">
                <?php
                $limit = get_option('posts_per_page');
                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
                query_posts('showposts=' . $limit . '&paged=' . $paged);
                $wp_query->is_archive = true;
                $wp_query->is_home = false;
                ?>
                <!--Start Post-->
                <?php get_template_part('loop', 'blog'); ?>   
                <div class="clear"></div>
                <?php inkthemes_pagination(); ?> 
            </div>
            <!-- sidebar -->
            <div class="grid_8 omega">
                <!--Start Sidebar-->
                <?php get_sidebar(); ?>
                <!--End Sidebar-->
            </div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<?php get_footer(); ?>