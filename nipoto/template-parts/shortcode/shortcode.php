<?php
add_shortcode('arta_read_more', 'show_post_function');
function show_post_function($post_id)
{
    echo "sajad from shortcode";
    $post = get_post($post_id);
    ?>
    <div class="nipo_read_more">
        <svg width="9" height="60" viewBox="0 0 9 60" fill="none" xmlns="http://www.w3.org/2000/svg">
            <rect width="9" height="60" fill="#FF9A9A"/>
        </svg>
        <p>بیشتر بخوانید : <a href="<?php echo get_permalink($post_id) ?>"><?php echo $post->post_title ?></a></p>
    </div>
    <?php
}
