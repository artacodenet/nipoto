<?php
/*
 * ----------------------------------------
 * Start Hook And Custom Function Nipoto
 * ----------------------------------------
 */
require_once __DIR__ . '/vendor/autoload.php';

use Carbon\Carbon;

// Actions
add_action('init', 'blockchin_nav_menu');
add_action('widgets_init', 'nipoto_weighet_footer');
add_action('save_post', 'save_post_nipoto');
add_action('after_setup_theme', 'nipoto_custom_header_setup');
add_action('add_meta_boxes', 'nipo_meta_box_add');
add_action('add_meta_boxes', 'nipo_meta_box_title');
add_action('wp_ajax_single_like_count', 'single_like_count');
add_action('wp_ajax_nopriv_single_like_count', 'single_like_count');
// allow uploads from users that are logged in
add_action('show_user_profile', 'arta_facial_auth_user_custome_image');
add_action('edit_user_profile', 'arta_facial_auth_user_custome_image');

function handle_date($date)
{
    $date = str_replace([
        'second',
        'minute',
        'hour',
        'month',
        'year',
        'day',
        'week',
        'ago',
        's'
    ],
        [
            'ثانیه',
            'دقیه',
            'ساعت',
            'ماه',
            'سال',
            'روز',
            'هفته',
        ], $date);
    return $date . "پیش";
}

function arta_facial_auth_user_custome_image($user)
{

    $user_image_id = get_user_meta($user->ID, "arta_facial_auth_user_image", true);

    $profile_url = get_the_guid($user_image_id);

    ?>
    <script>
        jQuery("#your-profile")
            .attr("enctype", "multipart/form-data")
            .attr("encoding", "multipart/form-data")
    </script>
    <div style="background: lightgrey; padding: 20px;border-radius: 5px;font-family: IRANSans">

        <h3 style="font-family: inherit"><?php _e("احراز هویت تصویری", "blank"); ?></h3>

        <table class="form-table">
            <tr class="user-profile-picture">
                <th>تصویر احراز هویت کاربر</th>
                <td>
                    <input id="arta_facial_auth_user_image" name="arta_facial_auth_user_image" type="file"
                           style=" padding: 10px;"/>
                    <input type='hidden' name='arta_facial_auth_user_image_upload_input'
                           id='arta_facial_auth_user_image_upload_input' value=''>

                    <img id="arta_user_image" width="350" alt="" src="<?php echo $profile_url ?>">
                    <p class="description">
                    </p>

                </td>
            </tr>
        </table>
    </div>

    <?php
}

add_action('personal_options_update', 'arta_facial_auth_user_costume_image_save');
add_action('edit_user_profile_update', 'arta_facial_auth_user_costume_image_save');

function arta_facial_auth_user_costume_image_save($user_id)
{
    $wp_root_path = str_replace('/wp-content/themes', '', get_theme_root());
    $wp_root_path = str_replace("'\'", '/', $wp_root_path);
    if ($_FILES['arta_facial_auth_user_image']['name'] != null) {
        if (!function_exists('wp_crop_image')) {
            include($wp_root_path . '/wp-admin/includes/image.php');
        }
// $filename should be the path to a file in the upload directory.
        $filename = $_FILES['arta_facial_auth_user_image']["name"];
        $file_temp = $_FILES['arta_facial_auth_user_image']['tmp_name'];
// The ID of the post this attachment is for.
        $parent_post_id = 0;

// Check the type of file. We'll use this as the 'post_mime_type'.
        $filetype = wp_check_filetype(basename($filename), '');


// Get the path to the upload directory.
        $wp_upload_dir = wp_upload_dir();
        move_uploaded_file($_FILES["arta_facial_auth_user_image"]["tmp_name"], $wp_upload_dir['path'] . '/' . basename($filename));

// Prepare an array of post data for the attachment.
        $attachment = array(
            'guid' => $wp_upload_dir['url'] . '/' . basename($filename),
            'post_mime_type' => $filetype['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
            'post_content' => '',
            'post_status' => 'inherit'
        );

// Insert the attachment.
        $attach_id = wp_insert_attachment($attachment, $filename, $parent_post_id);

        $attach_data = wp_generate_attachment_metadata($attach_id, $wp_upload_dir["path"] . '/' . $filename);
        wp_update_attachment_metadata($attach_id, $attach_data);
        update_user_meta($user_id, 'arta_facial_auth_user_image', $attach_id);


    }

}


function nipoto_custom_header_setup()
{
    $args = array(
        'default-text-color' => '000',
        'width' => 1000,
        'height' => 250,
        'flex-width' => true,
        'flex-height' => true,
    );
    add_theme_support('custom-header', $args);
}

// Register Custom Menu
function blockchin_nav_menu()
{
    register_nav_menu('bc-main-nav', __('Main Menu'));
}

// Get Menu bc-main-nav
function bc_main_nav_menu()
{
    wp_nav_menu(array('theme_location' => 'bc-main-nav', 'container_class' => 'bc-nav-menu'));
}

if (function_exists('add_theme_support')) {
    add_theme_support('post-thumbnails');
    set_post_thumbnail_size(150, 150, true); // default Featured Image dimensions (cropped)

    // additional image sizes
    // delete the next line if you do not need additional image sizes
    add_image_size('category-thumb', 300, 9999); // 300 pixels wide (and unlimited height)
}


// Register Weghet Footer
function nipoto_weighet_footer()
{
    register_widget('WPDocs_New_Widget');
    register_widget('bc_switching');
    register_sidebar(
        array(
            'name' => __('ستون اول پاورقی', 'textdomain'),
            'id' => 'footer_column_1',
            'description' => __('ستون اول پاورقی', 'textdomain'),
            'before_widget' => '<li id="%1$s" class="menu-footer-list %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('ستون دوم پاورقی', 'textdomain'),
            'id' => 'footer_column_2',
            'description' => __('ستون دوم پاورقی', 'textdomain'),
            'before_widget' => '<li id="%1$s" class="menu-footer-list %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('ستون سوم پاورقی', 'textdomain'),
            'id' => 'footer_column_3',
            'description' => __('ستون سوم پاورقی', 'textdomain'),
            'before_widget' => '<li id="%1$s" class="menu-footer-list %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        )
    );
    register_sidebar(
        array(
            'name' => __('ستون چهارم پاورقی', 'textdomain'),
            'id' => 'footer_column_4',
            'description' => __('ستون چهارم پاورقی', 'textdomain'),
            'before_widget' => '<li id="%1$s" class="menu-footer-list %2$s">',
            'after_widget' => '</li>',
            'before_title' => '<h2 class="widgettitle">',
            'after_title' => '</h2>',
        )
    );

}

//Get All posts
function post_author_selector($count)
{
    $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
        'paged' => $paged

    );


// The Query
    $query = new WP_Query($args);
    $query->arta_pagination_max = $query->max_num_pages;
    return $query->posts;
}

function post_category_selector($count)
{
    $paged = isset($_GET["paged"]) ? $_GET["paged"] : 1;
    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
        'paged' => $paged,
        'meta_query' => array(
            'relation' => 'OR', // Use AND for taking result on both condition true
            array(
                'key' => 'nipo_is_selector', // any meta key
                'value' => 'is_selector', // value under that meta
                'compare' => '=', // Also support: =, !=, >, >=, <, <=, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXISTS, NOT EXISTS, REGEXP, NOT REGEXP, RLIKE
                'type' => 'CHAR', // Also support: NUMERIC, BINARY, DATE, DATETIME, DECIMAL, SIGNED, UNSIGNED, TIME
            ),
        ),


    );


// The Query
    $query = new WP_Query($args);
    $query->arta_pagination_max = $query->max_num_pages;
    return array("posts" => $query->posts, "max_num" => $query->max_num_pages);
}

//get most_popular_content
function get_most_popular_content($count)
{
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count

        'meta_query' => array(
            'relation' => 'OR', // Use AND for taking result on both condition true
            array(
                'key' => 'nipo_like_count', // any meta key
                'compare' => '=', // Also support: =, !=, >, >=, <, <=, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXISTS, NOT EXISTS, REGEXP, NOT REGEXP, RLIKE
                'type' => 'CHAR', // Also support: NUMERIC, BINARY, DATE, DATETIME, DECIMAL, SIGNED, UNSIGNED, TIME
            ),
        ),
    );

// The Query
    $query = new WP_Query($args);
    return $query->posts;
}

//Get post by post meta
function get_post_by_postmeta($count, $is_video, $is_selector)
{
    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count

        'meta_query' => array(
            'relation' => 'OR', // Use AND for taking result on both condition true
            array(
                'key' => $is_video, // any meta key
                'value' => 'is_video', // value under that meta
                'compare' => '=', // Also support: =, !=, >, >=, <, <=, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXISTS, NOT EXISTS, REGEXP, NOT REGEXP, RLIKE
                'type' => 'CHAR', // Also support: NUMERIC, BINARY, DATE, DATETIME, DECIMAL, SIGNED, UNSIGNED, TIME
            ),
            array(
                'key' => $is_selector, // any meta key
                'value' => 'is_selector', // value under that meta
                'compare' => '=', // Also support: =, !=, >, >=, <, <=, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXISTS, NOT EXISTS, REGEXP, NOT REGEXP, RLIKE
                'type' => 'CHAR', // Also support: NUMERIC, BINARY, DATE, DATETIME, DECIMAL, SIGNED, UNSIGNED, TIME
            ),
        ),
    );

// The Query
    $query = new WP_Query($args);
    return $query->posts;
}

function get_post_is_selector($count, $is_selector)
{
    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count

        'meta_query' => array(
            'relation' => 'OR', // Use AND for taking result on both condition true
            array(
                'key' => $is_selector, // any meta key
                'value' => 'is_selector', // value under that meta
                'compare' => '=', // Also support: =, !=, >, >=, <, <=, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXISTS, NOT EXISTS, REGEXP, NOT REGEXP, RLIKE
                'type' => 'CHAR', // Also support: NUMERIC, BINARY, DATE, DATETIME, DECIMAL, SIGNED, UNSIGNED, TIME
            ),
        ),
    );

// The Query
    $query = new WP_Query($args);
    return $query->posts;
}

function get_post_by_review($count)
{
    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'meta_key' => 'nipo_post_preview_count',
        'orderby' => 'meta_value_num',
        'meta_type' => 'NUMERIC',
    );

// The Query
    $query = new WP_Query($args);
    return $query->posts;
}

// get post is video
function get_post_is_video($count, $is_video)
{
    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count

        'meta_query' => array(
            'relation' => 'OR', // Use AND for taking result on both condition true
            array(
                'key' => $is_video, // any meta key
                'value' => 'is_video', // value under that meta
                'compare' => '=', // Also support: =, !=, >, >=, <, <=, NOT LIKE, IN, NOT IN, BETWEEN, NOT BETWEEN, EXISTS, NOT EXISTS, REGEXP, NOT REGEXP, RLIKE
                'type' => 'CHAR', // Also support: NUMERIC, BINARY, DATE, DATETIME, DECIMAL, SIGNED, UNSIGNED, TIME
            ),
        ),
    );

// The Query
    $query = new WP_Query($args);
    return $query->posts;
}

function wpdocs_get_paginated_links($query)
{
    // When we're on page 1, 'paged' is 0, but we're counting from 1,
    // so we're using max() to get 1 instead of 0
    $currentPage = max(1, isset($_GET["page"]) ? $_GET["page"] : 1);

    // This creates an array with all available page numbers, if there
    // is only *one* page, max_num_pages will return 0, so here we also
    // use the max() function to make sure we'll always get 1
    $pages = range(1, max(1, $query->max_num_pages));

    // Now, map over $pages and return the page number, the url to that
    // page and a boolean indicating whether that number is the current page
    return array_map(function ($page) use ($currentPage) {
        return ( object )array(
            "isCurrent" => $page == $currentPage,
            "page" => $page,
            "url" => get_pagenum_link($page)
        );
    }, $pages);
}

//get posts by category ID
function get_post_by_category($term_id = -1, $count = NIPTO_POST_PER_PAGA)
{

    $paged = isset($_GET["page"]) ? $_GET["page"] : 1;
    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
        'paged' => $paged,
    );
    if ($term_id != -1) :
        $args['tax_query'] = array(
            array(
                'taxonomy' => 'category',
                'terms' => $term_id,
                'field' => 'term_id',
            )
        );
    endif;


// The Query
    $query = new WP_Query($args);
    $query->arta_pagination_max = $query->max_num_pages;
    return array("posts" => $query->posts, "pagination" => wpdocs_get_paginated_links($query));

}

function get_post_by_term($term_id = -1,$taxonomy='category', $count = NIPTO_POST_PER_PAGA)
{

    $paged = isset($_GET["page"]) ? $_GET["page"] : 1;
    // WP_Query arguments
    $args = array(
        'post_type' => array('post'), // use any for any kind of post type, custom post type slug for custom post type
        'post_status' => array('publish'), // Also support: pending, draft, auto-draft, future, private, inherit, trash, any
        'posts_per_page' => $count, // use -1 for all post
        'order' => 'DESC', // Also support: ASC
        'orderby' => 'date', // Also support: none, rand, id, title, slug, modified, parent, menu_order, comment_count
        'paged' => $paged,
    );
    if ($term_id != -1) :
        $args['tax_query'] = array(
            array(
                'taxonomy' => $taxonomy,
                'terms' => $term_id,
                'field' => 'term_id',
            )
        );
    endif;


// The Query
    $query = new WP_Query($args);
    $query->arta_pagination_max = $query->max_num_pages;
    return array("posts" => $query->posts, "pagination" => wpdocs_get_paginated_links($query));

}

//get all category
function get_all_category()
{
    $categories = get_categories(array(
        'orderby' => 'name',
        'parent' => 0
    ));
}

function nipo_meta_box_title()
{
    add_meta_box('sub_title', 'sub titles', 'sub_titles_function', 'post', 'side', 'default');
}

function nipo_meta_box_add()
{
    add_meta_box('video_checking', 'video checking', 'video_checking_function', 'post', 'side', 'default');
}

//subtitles meta box add to single page callback
function sub_titles_function()
{
    $subtitle1 = get_post_meta(get_the_id(), 'nipo_single_subtitle_1', true);
    $subtitle2 = get_post_meta(get_the_id(), 'nipo_single_subtitle_2', true);
    ?>
    <input style="width: 100%; margin-bottom: 10px" type="text" name="nipo_single_subtitle_1"
           placeholder="ساب تایتل اول صفحه سینگل"
           value='<?php echo $subtitle1 ?>'>
    <input style="width: 100%" type="text" name="nipo_single_subtitle_2" placeholder="ساب تایتل دوم صفحه سینگل"
           value='<?php echo $subtitle2 ?>'>
    <?php
}

// check post is video and is selected by selector
function video_checking_function()
{
    $is_video = get_post_meta(get_the_id(), 'nipo_is_video', true);
    $is_selector = get_post_meta(get_the_id(), 'nipo_is_selector', true);
    ?>
    <input type='checkbox' name='is_video' value="is_video"
           id="is_video" <?php if ($is_video == 'is_video') echo 'checked'; else echo ''; ?> >
    <label for="is_video">نوشته ویدیویی</label>
    <input type="checkbox" name="is_selector" value="is_selector"
           id="is_selector" <?php if ($is_selector == 'is_selector') echo 'checked'; else echo ''; ?>>
    <label for="is_selector">منتخب سردبیر</label>
    <?php
}

//save post callback action
function save_post_nipoto()
{
    $post_id = get_the_id();

    if (isset($_POST['is_video'])) {
        update_post_meta($post_id, 'nipo_is_video', $_POST['is_video']);
    }

    if (isset($_POST['is_selector'])) {
        update_post_meta($post_id, 'nipo_is_selector', $_POST['is_selector']);
    }

    if (isset($_POST['nipo_single_subtitle_1'])) {
        update_post_meta($post_id, 'nipo_single_subtitle_1', $_POST['nipo_single_subtitle_1']);
    }

    if (isset($_POST['nipo_single_subtitle_2'])) {
        update_post_meta($post_id, 'nipo_single_subtitle_2', $_POST['nipo_single_subtitle_2']);
    }
}

// Create Function Custom Include File
function nipo_include($dir, $file)
{
    include_once __DIR__ . "/" . $dir . "/" . $file . ".php";
}

// Load Image From Theme
function nipoto_image($imageName, $alt, $class = null)
{
    echo '<img src="' . get_stylesheet_directory_uri() . '/assets/images/' . $imageName . '" alt="' . $alt . '" class="' . $class . '">';
}

/**
 * callback ajax request for single_like_count
 **/
function single_like_count()
{

    $post_id = $_POST['post_id'];
    $old_like = get_post_meta($post_id, "nipo_like_count", true);
    $old_like = $old_like != null ? $old_like : 0;
    update_post_meta($post_id, 'nipo_like_count', ++$old_like);
    echo $old_like++;
    exit;
}

// Include Head File (Stylesheet And Javascript)
nipo_include('', 'define');
nipo_include('inc', 'head');
nipo_include('inc', 'weghets');
nipo_include('template-parts/customer/api', 'api');
nipo_include('template-parts/shortcode', 'shortcode');


add_action('customize_register','my_customize_register');
function my_customize_register( $wp_customize ) {
    $wp_customize->add_section(
        'general_sec',
        array(
            'title' => __( 'Theme General Options', 'enigma' ),
            'description' => 'Here you can customize Your theme\'s general Settings',
            'panel'=>'enigma_theme_option',
            'capability'=>'edit_theme_options',
            'priority' => 35,

        )
    );

    $wp_customize->add_control( 'setting_id', array(
        'type' => 'file',
        'priority' => 10, // Within the section.
        'section' => 'title_tagline', // Required, core or custom.
        'label' => __( 'Date' ),
        'description' => __( 'This is a date control with a red border.' ),
        'input_attrs' => array(
            'class' => 'my-custom-class-for-js',
            'style' => 'border: 1px solid #900',
            'placeholder' => __( 'mm/dd/yyyy' ),
        ),
        'active_callback' => 'is_front_page',
    ) );
}