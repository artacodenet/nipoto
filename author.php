<?php get_header();

use Carbon\Carbon;

$current_user_id = get_the_author_meta('ID');
$args = array(
    'author' => $current_user_id,
    'orderby' => 'post_date',
    'order' => 'ASC',
    'posts_per_page' => NIPO_AUTHOR_POST_PER_PAGE
);
$posts = get_posts($args);
$post_author = post_author_selector(NIPO_AUTHOR_POST_PER_PAGE, $current_user_id);
?>

    <div class="author_header">
        <div class="container">
            <p>
                <a href="<?php bloginfo('url'); ?>" style="text-decoration: none">
                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.8592 7.17361L9.37402 0.117516C9.25195 0.0394289 9.13302 0 9.01408 0C8.89515 0 8.77621 0.0394289 8.68231 0.117516L0.169008 7.17361C0.0572708 7.26769 0 7.39706 0 7.52642C0 7.78879 0.226667 7.99653 0.502348 7.99653C0.619969 7.99653 0.737715 7.95796 0.831925 7.87916L2.00312 6.88255L2.00331 12.6744C2.00331 13.9719 3.12663 15 4.50722 15H13.4931C14.8737 15 15.9971 13.9454 15.9971 12.6744L15.9971 6.88255L17.1956 7.87922C17.2926 7.9586 17.4085 7.99682 17.4992 7.99682C17.7724 7.99682 18 7.78917 18 7.55288C18 7.39706 17.9718 7.26769 17.8592 7.17361ZM10.5289 14.1121H7.52425V9.40804H10.5289V14.1121ZM14.9953 6.1152V12.7009C14.9953 13.4791 14.3214 14.1121 13.493 14.1121H11.503V9.24928C11.5305 8.82003 11.1549 8.46723 10.6948 8.46723H7.35524C6.89828 8.46723 6.52269 8.82003 6.52269 9.24928V14.1121H4.50704C3.67762 14.1121 3.00469 13.48 3.00469 12.7009V6.1152C3.00469 6.10411 2.99876 6.09487 2.99797 6.08397L9.01408 1.09773L15.0297 6.08403C15.0297 6.09462 14.9953 6.10344 14.9953 6.1152Z"
                              fill="#333C52"></path>
                    </svg>
                </a>
                /نگارنده ها /
                <span><?php echo get_the_author_meta('display_name') ?></span>
            </p>
        </div>
    </div>
    <div class="latest_articles">
        <div class="container">
            <div class="latest_articles_content">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="author_details">
                            <div class="row">
                                <div class="col-12 col-sm-12 col-md-5 col-lg-5">
                                    <div class="author_profile">
                                        <div class="author_image">
                                            <?php
                                            $user_image_id = get_user_meta(get_current_user_id(), "arta_facial_auth_user_image", true);
                                            $profile_url = get_the_guid($user_image_id);
                                            ?>
                                            <img src="<?php echo $profile_url ?>" alt="">
                                        </div>
                                        <div class="author_profile_details">
                                            <span><a>درباره نگارنده</a></span>
                                            <h4><?php echo get_the_author_meta('display_name') ?></h4>
                                            <p><span>تعداد مطلب : </span><span
                                                        class="fw-bold"><?php echo count_user_posts($current_user_id) ?></span>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12 col-md-7 col-lg-7">
                                    <div class="about_author">
                                        <p><?php echo the_author_meta('description') ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <?php foreach ($post_author["posts"] as $post) : ?>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                    <div class="article_single">
                                        <div class="article_single_content">
                                            <div class="row">
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                                    <div class="article_single_img inline_block">
                                                        <a href="<?php echo get_permalink($post->ID) ?>"><img
                                                                    src="<?php echo get_the_post_thumbnail_url($post->ID) ?>"
                                                                    alt=""></a>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                                    <div class="article_single_content_info inline_block">
                                                        <div class="article_single_content_title">
                                                            <a href="<?php echo get_permalink($post->ID) ?>">
                                                                <h6><?php echo substr($post->post_title, 0, 100) . ". . ." ?></h6>
                                                            </a>
                                                        </div>
                                                        <div class="article_single_content_detail">
                                                            <p><?php echo substr($post->post_content, 0, 250) . " . . ." ?></p>
                                                        </div>
                                                        <div class="article_single_content_footer">
                                                            <div class="content_footer_user inline_block">
                                                                <div class="user_image inline_block">
                                                                    <?php $user_image_id = get_user_meta(get_current_user_id(), "arta_facial_auth_user_image", true);
                                                                    $profile_url = get_the_guid($user_image_id);
                                                                    ?>
                                                                    <img src="<?php echo $profile_url ?>" alt="">
                                                                </div>
                                                                <div class="user_info inline_block">
                                                                    <span><?php echo get_the_author_meta('display_name') ?></span><br>
                                                                    <span><i><svg width="11" height="11"
                                                                                  viewBox="0 0 11 11"
                                                                                  fill="none"
                                                                                  xmlns="http://www.w3.org/2000/svg">
<path d="M5.5 0C2.46211 0 0 2.46211 0 5.5C0 8.53789 2.46211 11 5.5 11C8.53789 11 11 8.53789 11 5.5C11 2.46211 8.53789 0 5.5 0ZM5.5 10.3125C2.84668 10.3125 0.6875 8.15332 0.6875 5.5C0.6875 2.84668 2.84668 0.6875 5.5 0.6875C8.15332 0.6875 10.3125 2.84668 10.3125 5.5C10.3125 8.15332 8.15332 10.3125 5.5 10.3125ZM7.60762 6.31855L5.84375 5.30234V2.40625C5.84375 2.21719 5.68906 2.0625 5.5 2.0625C5.31094 2.0625 5.15625 2.21719 5.15625 2.40625V5.5C5.15625 5.62287 5.22171 5.73633 5.32812 5.79777L7.26301 6.91496C7.31758 6.9459 7.37559 6.96094 7.43359 6.96094C7.55242 6.96094 7.66799 6.89951 7.7318 6.78906C7.82676 6.62363 7.7709 6.41523 7.60762 6.31855Z"
      fill="#919CBA"/>
</svg>
</i><?php echo handle_date(Carbon::create($post->post_date)->diffForHumans()); ?></span>
                                                                </div>
                                                            </div>
                                                            <div class="show_article inline_block">
                                                                <a href="<?php echo get_permalink($post->ID) ?>"> مشاهده
                                                                    مطلب
                                                                    <svg width="6" height="8" viewBox="0 0 6 8"
                                                                         fill="none"
                                                                         xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M4.4868 7.87927L0.700334 4.26349C0.556527 4.12429 0.556527 3.91554 0.700334 3.77623L4.4868 0.120217C4.6656 -0.0288685 4.90752 -0.0409136 5.08106 0.0931728C5.2625 0.235895 5.25987 0.465887 5.11262 0.607473L1.57858 3.99986L5.11262 7.39292C5.26715 7.54278 5.25358 7.77223 5.08138 7.907C4.90752 8.04063 4.6656 8.02927 4.4868 7.87927Z"
                                                                              fill="#838DA7"/>
                                                                    </svg>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                            <nav aria-label="..." class="text-center">
                                <?php foreach ($post_author['pagination'] as $authpage): ?>
                                    <div class="author_pagination text-center inline_block">
                                        <a href="<?php echo '?page=' . $authpage->page ?>">
                                            <p <?php if ($authpage->isCurrent) : ?> style="color: black; background:
                                #FFF1ED;" <?php endif; ?>
                                                    class="persian"><?php echo intval($authpage->page) ?></p></a>
                                    </div>
                                <?php endforeach; ?>
                            </nav>

                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
                        <div class="instant_price">
                            <div class="instant_price_title">
                                <h5 class="nipo_main_title">قیمت لحظه ای</h5>
                            </div>
                            <div class="instant_price_header">
                                <button id="instant_price_btc" class="instant_price_type">
                                    <span>بیت کوین</span>
                                </button>
                                <button id="instant_price_eteriom" class="instant_price_type">
                                    <span>اتریوم</span>
                                </button>
                                <button id="instant_price_teter" class="instant_price_type">
                                    <span>تتر</span>
                                </button>
                                <button id="instant_price_doj" class="instant_price_type">
                                    <span>دوج</span>
                                </button>
                                <button id="instant_price_shiba" class="instant_price_type">
                                    <span>شیبا</span>
                                </button>
                            </div>
                            <div class="instant_price_content">
                                <div class="row">
                                    <div class="col-5">
                                        <div class="currency_icon inline_block">
                                            <?php nipoto_image('BTC.png', ''); ?>
                                        </div>
                                        <div class="currency_name inline_block">
                                            <p>بیت کوین</p>
                                            <span>(BTC)</span>
                                        </div>

                                    </div>
                                    <div class="col-2">
                                        <div class="instant_price_average">
                                            <span>۲.۱۳٪</span>
                                        </div>
                                    </div>
                                    <div class="col-5">
                                        <div class="instant_currency_price">
                                            <p class="instant_currency_price_dollar"><span>$</span>۴۲,۳۵۶,۰۷۳.۳۸</p>
                                            <p class="instant_currency_price_toman">۱۲۳,۹۵۴,۵۸۰ <span> تومان </span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button type="button" class="currency_sell_buy">خرید و فروش <span>بیت کوین</span></button>
                        </div>
                        <div class="row">
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12 ">
                                <p class="most_popular_content mb-3">انتخاب سردبیر</p>
                                <?php
                                $post_selector = get_post_is_selector(-1, 'nipo_is_selector');
                                if ($post_selector != null):
                                    foreach ($post_selector as $item) :
                                        ?>
                                        <div class="articles_item">
                                            <div class="article_item_content">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="article_item_image inline_block">
                                                            <a href="<?php echo get_permalink($item->ID) ?>"><img
                                                                        src="<?php echo get_the_post_thumbnail_url($item->ID) ?>"
                                                                        alt=""></a>

                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="article_item_content_detail inline_block">
                                                            <div class="article_item_content_title">
                                                                <a href="<?php echo get_tag_link(get_the_category($item->ID)[0]) ?>"><span><?php echo get_the_category($item->ID)[0]->name; ?></span></a>
                                                            </div>
                                                            <div class="article_item_content_info">
                                                                <a href="<?php echo get_permalink($item->ID) ?>">
                                                                    <p><?php echo $item->post_title ?></p></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php
                                    endforeach;
                                endif;
                                ?>
                            </div>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12 ">
                                <p class="most_visited_content mb-3 mt-5">پربازدیدترین مطالب</p>
                                <?php foreach (get_post_by_review(MOST_PERVIWE_PER_PAGE) as $post) : ?>
                                    <div class="articles_item">
                                        <div class="article_item_content">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="article_item_image inline_block">
                                                        <a href="<?php echo get_permalink($post->post_id) ?>">
                                                            <img src='<?php echo get_the_post_thumbnail_url($post->post_id) ?>'>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="article_item_content_detail inline_block">
                                                        <div class="article_item_content_title">
                                                            <?php
                                                            $terms = get_the_terms($post->ID, "category");
                                                            $current_term = get_term($terms[0])->name;
                                                            ?>
                                                            <a href="<?php echo get_term_link($terms[0], "category") ?>">
                                                            <span>
                                                                <?php echo $current_term; ?>
                                                            </span>
                                                            </a>
                                                        </div>
                                                        <div class="article_item_content_info">
                                                            <a href="<?php echo get_permalink($post->post_id) ?>">
                                                                <p class="word_space"><?php echo $post->post_title; ?></p>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();