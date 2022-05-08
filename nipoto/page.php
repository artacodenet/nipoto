<?php
/*
 * ----------------------------------------
 * Page File Theme Wordpress (Default File)
 * ----------------------------------------
 */

$obj_id = get_queried_object_id();
$current_url = get_permalink($obj_id);
get_header();
/* Start the Loop */
while (have_posts()) :
    the_post();
    get_template_part('template-parts/content/page');

    // If comments are open or there is at least one comment, load up the comment template.
    if (comments_open() || get_comments_number()) {
        comments_template();
    }
endwhile; // End of the loop.
get_footer();