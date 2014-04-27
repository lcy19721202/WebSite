<?php
/* ----------------------------------------------------------------------------------- */
/* Post Thumbnail Support
  /*----------------------------------------------------------------------------------- */
add_theme_support('post-thumbnails');
if (function_exists('add_image_size'))
    add_theme_support('post-thumbnails');
if (function_exists('add_image_size')) {
    add_image_size('post_thumbnail', 600, 250, true);
    add_image_size('post_thumbnail_1', 70, 70, true);
}
/* ----------------------------------------------------------------------------------- */
/* Auto Feed Links Support
  /*----------------------------------------------------------------------------------- */
if (function_exists('add_theme_support')) {
    add_theme_support('automatic-feed-links');
}
/* ----------------------------------------------------------------------------------- */
/* Custom Menus Function
  /*----------------------------------------------------------------------------------- */

// Add CLASS attributes to the first <ul> occurence in wp_page_menu
function inkthemes_add_menuclass($ulclass) {
    return preg_replace('/<ul>/', '<ul class="ddsmoothmenu">', $ulclass, 1);
}

add_filter('wp_page_menu', 'inkthemes_add_menuclass');
add_action('init', 'inkthemes_register_custom_menu');

function inkthemes_register_custom_menu() {
    register_nav_menu('custom_menu', MAIN_MENU);
}

function inkthemes_nav() {
    if (function_exists('wp_nav_menu'))
        wp_nav_menu(array('theme_location' => 'custom_menu', 'container_id' => 'menu', 'menu_class' => 'ddsmoothmenu', 'fallback_cb' => 'inkthemes_nav_fallback'));
    else
        inkthemes_nav_fallback();
}

function inkthemes_nav_fallback() {
    ?>
    <div id="menu">
        <ul class="ddsmoothmenu">
		<?php  $get_status = inkthemes_get_option('re_nm');
	 if ($get_status === 'on') { ?>
           <li class="page_item"><a class='scrollSmint' id='home' href="<?php echo home_url(); ?>/#top">Home</a></li>
										
<?php
                $showhide_sections = inkthemes_get_option('inkthemes_services_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_our_services_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="services" href="<?php echo home_url(); ?>/#services"><?php echo inkthemes_get_option('inkthemes_our_services_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="services" href="<?php echo home_url(); ?>/#services">Services</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

												
<?php
                $showhide_sections = inkthemes_get_option('inkthemes_blog_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_recent_blog_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="blogs" href="<?php echo home_url(); ?>/#blogs"><?php echo inkthemes_get_option('inkthemes_recent_blog_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="blogs" href="<?php echo home_url(); ?>/#blogs">Recent Blogs</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

<?php
                $showhide_sections = inkthemes_get_option('inkthemes_gallery_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
												<?php if (inkthemes_get_option('inkthemes_gallery_portfolio_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="gallery" href="<?php echo home_url(); ?>/#gallery"><?php echo inkthemes_get_option('inkthemes_gallery_portfolio_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="gallery" href="<?php echo home_url(); ?>/#gallery">Gallery</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

<?php
                $showhide_sections = inkthemes_get_option('inkthemes_contact_section_onoff'); // section on or off
                $showhide_sections_on = "Show";
                if ($showhide_sections === $showhide_sections_on) { ?>
                                        <?php if (inkthemes_get_option('inkthemes_our_contact_heading') != '') { ?>
                                            <li class="page_item"><a class='scrollSmint' id="contact" href="<?php echo home_url(); ?>/#contact"><?php echo inkthemes_get_option('inkthemes_our_contact_heading'); ?>
                                                <?php } else { ?><li class="page_item"><a class='scrollSmint' id="contact" href="<?php echo home_url(); ?>/#contact">Contact</a></li><?php } ?></a></li><?php } else { } //show hide menu?>

                                       
                                        <?php  } else {} 
										wp_list_pages('title_li=&show_home=1&sort_column=menu_order');
										?>
        </ul>
    </div>
    <?php
}

function inkthemes_nav_menu_items($items) {
$homelink='';
    if (is_home()) { /*
	 $get_status = inkthemes_get_option('re_nm');
	 if ($get_status === 'off'){
        $homelink = '<li class="current_page_item">' . '<a href="' . home_url('/') . '">' . HOME_TEXT . '</a></li>';
		} */
    } else { /*
        $homelink = '<li>' . '<a href="' . home_url('/') . '">' . HOME_TEXT . '</a></li>'; */
    }
    $items = $homelink . $items;
    return $items;
}

add_filter('wp_list_pages', 'inkthemes_nav_menu_items');
/* ----------------------------------------------------------------------------------- */
/* Breadcrumbs Plugin
  /*----------------------------------------------------------------------------------- */

function inkthemes_breadcrumbs() {
    $delimiter = '»';
    $home = 'Home'; // text for the 'Home' link
    $before = '<span class="current">'; // tag before the current crumb
    $after = '</span>'; // tag after the current crumb
    echo '<div id="crumbs">';
    global $post;
    $homeLink = home_url();
    echo '<a href="' . $homeLink . '">' . $home . '</a> ' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    }
    elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> ' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '»' . $slug['slug'] . '»">' . $post_type->labels->singular_name . '</a> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
        //echo $before . $post_type->labels->singular_name . $after;
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        echo PAGE . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</div>';
}

//* ----------------------------------------------------------------------------------- */
/* Function to call first uploaded image in functions file
  /*----------------------------------------------------------------------------------- */
function inkthemes_main_image() {
    global $post, $posts;
    //This is required to set to Null
    $id = '';
    $the_title = '';
    // Till Here
    $permalink = get_permalink($id);
    $homeLink = get_template_directory_uri();
    $first_img = '';
    $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
    if (isset($matches [1] [0])) {
        $first_img = $matches [1] [0];
    }
    if (empty($first_img)) { //Defines a default image  
    } else {
        print "<a href='$permalink'><img src='$first_img' width='250px' height='160px' class='postimg wp-post-image' alt='$the_title' /></a>";
    }
}

/**
 * This function thumbnail id and
 * returns thumbnail image
 * @param type $iw
 * @param type $ih 
 */
function inkthemes_get_thumbnail($iw, $ih) {
    $permalink = get_permalink($id);
    $thumb = get_post_thumbnail_id();
    $image = inkthemes_thumbnail_resize($thumb, '', $iw, $ih, true, 90);
    if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) {
        print "<a href='$permalink'><img class='postimg' src='$image[url]' width='$image[width]' height='$image[height]' /></a>";
    }
}

/**
 * This function gets image width and height and
 * Prints attached images from the post        
 */
function catch_that_image() {
  global $post, $posts;
  $first_img = '';
  ob_start();
  ob_end_clean();
  $output = preg_match_all('/<img.+src=[\'"]([^\'"]+)[\'"].*>/i', $post->post_content, $matches);
  $first_img = $matches[1][0];

  if(empty($first_img)) {
     $first_img = '';
  }
  return $first_img;
}

/* ----------------------------------------------------------------------------------- */
/* Attachment Page Design
  /*----------------------------------------------------------------------------------- */

//For Attachment Page
/**
 * Prints HTML with meta information for the current post (category, tags and permalink).
 *
 */
function inkthemes_posted_in() {
// Retrieves tag list of current post, separated by commas.
    $tag_list = get_the_tag_list('', ', ');
    if ($tag_list) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' .' . AND_TAGGED . ' %2$s.' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } elseif (is_object_in_taxonomy(get_post_type(), 'category')) {
        $posted_in = THIS_ENTRY_WAS_POSTED_IN . ' %1$s. ' . BOOKMARK_THE . ' <a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    } else {
        $posted_in = BOOKMARK_THE . '<a href="%3$s" title="Permalink to %4$s" rel="bookmark">' . PERMALINK . '</a>.';
    }
// Prints the string, replacing the placeholders.
    printf(
            $posted_in, get_the_category_list(', '), $tag_list, get_permalink(), the_title_attribute('echo=0')
    );
}
?>
<?php
/**
 * Set the content width based on the theme's design and stylesheet.
 *
 * Used to set the width of images and content. Should be equal to the width the theme
 * is designed for, generally via the style.css stylesheet.
 */
if (!isset($content_width))
    $content_width = 590;
?>
<?php

/**
 * Register widgetized areas, including two sidebars and four widget-ready columns in the footer.
 *
 * To override twentyten_widgets_init() in a child theme, remove the action hook and add your own
 * function tied to the init hook.
 *
 * @uses register_sidebar
 */
function inkthemes_widgets_init() {
// Area 1, located at the top of the sidebar.
    register_sidebar(array(
        'name' => PRIMARY_WIDGET,
        'id' => 'primary-widget-area',
        'description' => THE_PRIMARY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));
// Area 2, located below the Primary Widget Area in the sidebar. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_WIDGET,
        'id' => 'secondary-widget-area',
        'description' => THE_SECONDRY_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h3>',
        'after_title' => '</h3>',
    ));

    // Area 3, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FIRST_FOOTER_WIDGET,
        'id' => 'first-footer-widget-area',
        'description' => THE_FIRST_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
    // Area 4, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => SECONDRY_FOOTER_WIDGET,
        'id' => 'second-footer-widget-area',
        'description' => THE_SECONDRY_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
    // Area 5, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => THIRD_FOOTER_WIDGET,
        'id' => 'third-footer-widget-area',
        'description' => THE_THIRD_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
    // Area 6, located in the footer. Empty by default.
    register_sidebar(array(
        'name' => FOURTH_FOOTER_WIDGET,
        'id' => 'fourth-footer-widget-area',
        'description' => THE_FOURTH_FOOTER_WIDGET,
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '<h1>',
        'after_title' => '</h1>',
    ));
}

/** Register sidebars by running inkthemes_widgets_init() on the widgets_init hook. */
add_action('widgets_init', 'inkthemes_widgets_init');
?>
<?php

/**
 * Pagination
 *
 */
function inkthemes_pagination($pages = '', $range = 2) {
    $showitems = ($range * 2) + 1;
    global $paged;
    if (empty($paged))
        $paged = 1;
    if ($pages == '') {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if (!$pages) {
            $pages = 1;
        }
    }
    if (1 != $pages) {
        echo "<ul class='paging'>";
        if ($paged > 2 && $paged > $range + 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link(1) . "'>&laquo;</a></li>";
        if ($paged > 1 && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged - 1) . "'>&lsaquo;</a></li>";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged + $range + 1 || $i <= $paged - $range - 1) || $pages <= $showitems )) {
                echo ($paged == $i) ? "<li><a href='" . get_pagenum_link($i) . "' class='current' >" . $i . "</a></li>" : "<li><a href='" . get_pagenum_link($i) . "' class='inactive' >" . $i . "</a></li>";
            }
        }
        if ($paged < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($paged + 1) . "'>&rsaquo;</a></li>";
        if ($paged < $pages - 1 && $paged + $range - 1 < $pages && $showitems < $pages)
            echo "<li><a href='" . get_pagenum_link($pages) . "'>&raquo;</a></li>";
        echo "</ul>\n";
    }
}
?>
<?php

/////////Theme Options
/* ----------------------------------------------------------------------------------- */
/* Add Favicon
  /*----------------------------------------------------------------------------------- */
function inkthemes_childtheme_favicon() {
    if (inkthemes_get_option('inkthemes_favicon') != '') {
        echo '<link rel="shortcut icon" href="' . inkthemes_get_option('inkthemes_favicon') . '"/>' . "\n";
    } else {
        ?>
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri() ?>/images/favicon.ico" />
        <?php
    }
}

add_action('wp_head', 'inkthemes_childtheme_favicon');
/* ----------------------------------------------------------------------------------- */
/* Show analytics code in footer */
/* ----------------------------------------------------------------------------------- */

function inkthemes_childtheme_analytics() {
    $output = inkthemes_get_option('inkthemes_analytics');
    if ($output <> "")
        echo stripslashes($output);
}

add_action('wp_head', 'inkthemes_childtheme_analytics');
/* ----------------------------------------------------------------------------------- */
/* Custom CSS Styles */
/* ----------------------------------------------------------------------------------- */

function inkthemes_of_head_css() {
    $output = '';
    $custom_css = inkthemes_get_option('inkthemes_customcss');
    if ($custom_css <> '') {
        $output .= $custom_css . "\n";
    }
// Output styles
    if ($output <> '') {
        $output = "<!-- Custom Styling -->\n<style type=\"text/css\">\n" . $output . "</style>\n";
        echo $output;
    }
}

add_action('wp_head', 'inkthemes_of_head_css');
//Load languages file
load_theme_textdomain('businessgrow', get_template_directory() . '/languages');
$locale = get_locale();
$locale_file = TEMPLATEPATH . "/languages/$locale.php";
if (is_readable($locale_file))
    require_once($locale_file);
// This theme styles the visual editor with editor-style.css to match the theme style.
add_editor_style();

// activate support for thumbnails
function get_category_id($cat_name) {
    $term = get_term_by('name', $cat_name, 'category');
    return $term->term_id;
}

//Trm excerpt
function custom_trim_excerpt($length) {
    global $post;
    $explicit_excerpt = $post->post_excerpt;
    if ('' == $explicit_excerpt) {
        $text = get_the_content('');
        $text = apply_filters('the_content', $text);
        $text = str_replace(']]>', ']]>', $text);
    } else {
        $text = apply_filters('the_content', $explicit_excerpt);
    }
    $text = strip_shortcodes($text); // optional
    $text = strip_tags($text);
    $excerpt_length = $length;
    $words = explode(' ', $text, $excerpt_length + 1);
    if (count($words) > $excerpt_length) {
        array_pop($words);
        array_push($words, '...');
        $text = implode(' ', $words);
        $text = apply_filters('the_excerpt', $text);
    }
    return $text;
}

function inkthemes_image_post($post_id) {
    add_post_meta($post_id, 'img_key', 'on');
}

//Trm post title
function the_titlesmall($before = '', $after = '', $echo = true, $length = false) {
    $title = get_the_title();
    if ($length && is_numeric($length)) {
        $title = substr($title, 0, $length);
    }
    if (strlen($title) > 0) {
        $title = apply_filters('the_titlesmall', $before . $title . $after, $before, $after);
        if ($echo)
            echo $title;
        else
            return $title;
    }
}

// Register 'Custom Posts Type'
/* ----------------------------------------------------------------------------------- */
add_action('init', 'inkthemes_create_post_type');

function inkthemes_create_post_type() {
    register_post_type('gallery_post', array(
        'labels' => array(
            'name' => GALLERY_AND_PORTFOLIO,
            'singular_name' => PORTFOLIO
        ),
        'public' => true,
        'taxonomies' => array('filter'),
        'has_archive' => true,
        'rewrite' => array('slug' => 'portfolio'),
        'hierarchical' => false,
        'supports' => array('title', 'editor', 'thumbnail', 'post-formats')
            )
    );
}

// Register 'Custom Posts Type'
/* ----------------------------------------------------------------------------------- */
//hook into the init action and call create_topics_nonhierarchical_taxonomy when it fires

add_action('init', 'create_topics_nonhierarchical_taxonomy', 0);

function create_topics_nonhierarchical_taxonomy() {

// Labels part for the GUI

    $labels = array(
        'name' => _x('Filter Tags', 'taxonomy general name'),
        'singular_name' => _x('Filter Tags', 'taxonomy singular name'),
        'search_items' => SEARCH_FILTER_TAGS,
        'popular_items' => POPULAR_FILTER_TAGS,
        'all_items' => ALL_FILTER_TAGS,
        'parent_item' => null,
        'parent_item_colon' => null,
        'edit_item' => EDIT_FILTER_TAGS,
        'update_item' => UPDATE_FILTER_TAGS,
        'add_new_item' => ADD_NEW_FILTER_TAGS,
        'new_item_name' => NEW_FILTER_TAGS_NAME,
        'separate_items_with_commas' => SEPARATE_FILTER_TAGS_WITH_CMMAS,
        'add_or_remove_items' => ADD_OR_REMOVE_FILTER_TAGS,
        'choose_from_most_used' => CHOOSE_FROM_MOST_USED_FILTER_TAGS,
        'menu_name' => FILTER,
    );

// Now register the non-hierarchical taxonomy like tag

    register_taxonomy('filter', 'gallery_post', array(
        'hierarchical' => false,
        'labels' => $labels,
        'show_ui' => true,
        'show_admin_column' => false,
        'update_count_callback' => '_update_post_term_count',
        'query_var' => true,
        'rewrite' => array('slug' => 'topic'),
    ));
}

/* ----------------------------------------------------------------------------------- */
/* // Register 'Recent Custom Posts' widget
  /*----------------------------------------------------------------------------------- */
add_action('widgets_init', 'init_rcp_recent_posts');

function init_rcp_recent_posts() {
    return register_widget('rcp_recent_posts');
}

class rcp_recent_posts extends WP_Widget {

    /** constructor */
    function rcp_recent_posts() {
        parent::WP_Widget('rcp_recent_custom_posts', $name = 'Recent Rated Posts');
    }

    /**
     * This is our Widget
     * */
    function widget($args, $instance) {
        global $post;
        $post_type = 'post';
        extract($args);
        // Widget options
        $title = apply_filters('widget_title', $instance['title']); // Title		
        $cpt = $instance['types']; // Post type(s) 		
        $types = explode(',', $cpt); // Let's turn this into an array we can work with.
        $number = $instance['number']; // Number of posts to show
        // Output
        echo $before_widget;

        if ($title)
            echo $before_title . $title . $after_title;
        ?>
        <ul class="ratting_widget">
                    <?php
                    query_posts('showposts=' . $number . '&post_type=' . $post_type);
                    $wp_query->is_archive = true;
                    $wp_query->is_home = false;
                    if (have_posts()) : while (have_posts()) : the_post();
                            ?>
                    <li>
                        <div class="widget_thumb">
                                    <?php if ((function_exists('has_post_thumbnail')) && (has_post_thumbnail())) { ?>
                                        <?php the_post_thumbnail('post_thumbnail_1', array('class' => 'postimg')); ?>
                                    <?php } else { ?>
                    <?php inkthemes_get_image(66, 60); ?> 
                    <?php
                }
                ?></div>
                        <div class="widget_content">
                            <h6><a href="<?php the_permalink() ?>" title="<?php echo esc_attr(get_the_title() ? get_the_title() : get_the_ID()); ?>">		<?php
                $tit = the_title('', '', FALSE);
                echo substr($tit, 0, 30);
                if (strlen($tit) > 30)
                    echo "...";
                ?></a></h6>
                            <h6 class="title"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>">

                                </a></h6>
                <?php echo custom_trim_excerpt(7); ?>
                        </div>
                    </li>
                    <div class="clear"></div>
                <?php endwhile;
            wp_reset_query();
        endif;
        ?>
        </ul>
        <?php
        // echo widget closing tag
        echo $after_widget;
    }

    /** Widget control update */
    function update($new_instance, $old_instance) {
        $instance = $old_instance;

        //Let's turn that array into something the Wordpress database can store
        $types = implode(',', (array) $new_instance['types']);

        $instance['title'] = strip_tags($new_instance['title']);
        $instance['types'] = $types;
        $instance['number'] = strip_tags($new_instance['number']);
        return $instance;
    }

    /**
     * Widget settings
     * */
    function form($instance) {

        // instance exist? if not set defaults
        if ($instance) {
            $title = $instance['title'];
            $types = $instance['types'];
            $number = $instance['number'];
        } else {
            //These are our defaults
            $title = '';
            $types = 'post';
            $number = '5';
        }

        //Let's turn $types into an array
        $types = explode(',', $types);

        //Count number of post types for select box sizing
        $cpt_types = get_post_types(array('public' => true), 'names');
        foreach ($cpt_types as $cpt) {
            $cpt_ar[] = $cpt;
        }
        $n = count($cpt_ar);
        if ($n > 10) {
            $n = 10;
        }

        // The widget form
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php echo TITLE_COLON; ?></label>
            <input id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo $title; ?>" class="widefat" />
        </p>
        <p>
            <label for="<?php echo $this->get_field_id('number'); ?>"><?php echo NUMBER_OF_POSTS_TO_SHOW_COLON; ?></label>
            <input id="<?php echo $this->get_field_id('number'); ?>" name="<?php echo $this->get_field_name('number'); ?>" type="text" value="<?php echo $number; ?>" size="3" />
        </p>
        <?php
    }

}

// class rcp_recent_posts
?>