<?php
add_action('template_include', function ($template) {
    global $wp_query;
    $query = $wp_query->query_vars;
    if ($query["name"] == "nipoto") {
        nipoto_include( 'template-parts/customer','main' );
    }
    return $template;
});