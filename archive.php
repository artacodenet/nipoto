<?php get_header(); ?>
<?php

use Carbon\Carbon;

$term_id = get_queried_object()->term_id;
$current = get_term($term_id);
$post_cat = get_post_by_term($term_id, $current->taxonomy, NIPTO_POST_PER_PAGA);
$post_category_selector = post_category_selector(4, $term_id, $current->taxonomy);


?>
    <div class="category_header">
        <div class="container">
            <div class="row">
                <div class="col-4 col-sm-4 col-md-3 col-lg-2">
                    <div class="cat_header_img">
                        <?php nipoto_image('cat.png', ''); ?>
                    </div>
                </div>
                <div class="col-8 col-sm-8 col-md-9 col-lg-10">
                    <div class="cat_header_detail">
                        <h5><?php echo $current->name ?></h5>
                        <p><?php echo $current->description ?></p>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="selected_editor">
        <div class="container">
            <div class="selector_editor_title">
                <h5 class="nipo_main_title">منتخب <?php echo $current->name; ?></h5>
            </div>
            <div class="row">
                <?php if ($post_category_selector["posts"] != null)  : ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                        <div class="selector_editor_right">
                            <div class="selector_image">
                                <a href="<?php echo get_permalink($post->ID) ?>">
                                    <img src='<?php echo get_the_post_thumbnail_url($post_category_selector["posts"][0]->ID) ?>'>
                                </a>
                            </div>
                            <div class="infoContent_footer">

                                <div class="selector_info">
                                    <div class="infoTitle">
                                        <h6>
                                            <a href="<?php echo get_permalink($post_category_selector["posts"][0]->ID) ?>"> <?php echo $post_category_selector["posts"][0]->post_title ?></a>
                                        </h6>
                                    </div>
                                    <div class="infoContent">
                                        <p>
                                            <?php echo substr($post_category_selector["posts"][0]->post_content, 0, 430); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                        <div class="row">
                            <?php
                            unset($post_category_selector["posts"][0]);
                            foreach ($post_category_selector["posts"] as $post) :
                                ?>
                                <div class="col-md-6 col-lg-12">
                                    <div class="selector_editor_left">
                                        <div class="editor_left_box">
                                            <div class="row">
                                                <div class="col-3">
                                                    <div class="selector_left_image inline_block">
                                                        <a href="<?php echo get_permalink($post->ID) ?>">
                                                            <img src='<?php echo get_the_post_thumbnail_url($post->ID) ?>'>
                                                        </a>
                                                    </div>
                                                </div>
                                                <div class="col-9">
                                                    <div class="selector_left_content inline_block">
                                                        <div class="leftContentTitle">
                                                            <div class="title_r inline_block">
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
                                                            <div class="title_l inline_block text-end">
                                                                <span><?php echo handle_date(Carbon::create($post->post_date)->diffForHumans()); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="selector_left_info">
                                                            <a href="<?php echo get_permalink($post->ID) ?>">
                                                                <?php echo $post->post_title; ?>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <div class="latest_articles">
        <div class="container">
            <div class="latest_articles_content">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="cat_latest_articles">
                            <button type="button" id="latest_articles" class="latest_articles_header_active">جدید ترین
                                مقالات
                            </button>
                            <button type="button" id="video_articles">مطالب ویدیویی</button>
                        </div>
                        <div class="row">
                            <?php
                            $post_by_meta = get_post_is_video(5, 'nipo_is_video', $current->taxonomy, $term_id);
                            foreach ($post_cat["posts"] as $post) :
                                ?>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                    <div class="isArticle">

                                        <div class="article_single" itemid="article_single_latest">
                                            <div class="article_single_content">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                                        <div class="article_single_img inline_block">
                                                            <a href="<?php echo get_permalink($post->ID); ?>">
                                                                <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>"
                                                                     alt="">
                                                            </a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                                        <div class="article_single_content_info inline_block">
                                                            <div class="article_single_content_title">
                                                                <h6>
                                                                    <a href="<?php echo get_permalink($post->ID); ?>">
                                                                        <?php echo substr($post->post_title, 0, 100) . ". . ."; ?>
                                                                    </a>
                                                                </h6>
                                                            </div>
                                                            <div class="article_single_content_detail">
                                                                <p><?php echo substr($post->post_content, 0, 250) . " . . ." ?> </p>
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
                                                                        <?php
                                                                        $author_id = $post->post_author;
                                                                        $author_meta = get_the_author_meta('nicename', $author_id);
                                                                        ?>
                                                                        <span><?php echo $author_meta ?></span><br>
                                                                        <span><i>
                                                                        <svg width="11" height="11" viewBox="0 0 11 11"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.5 0C2.46211 0 0 2.46211 0 5.5C0 8.53789 2.46211 11 5.5 11C8.53789 11 11 8.53789 11 5.5C11 2.46211 8.53789 0 5.5 0ZM5.5 10.3125C2.84668 10.3125 0.6875 8.15332 0.6875 5.5C0.6875 2.84668 2.84668 0.6875 5.5 0.6875C8.15332 0.6875 10.3125 2.84668 10.3125 5.5C10.3125 8.15332 8.15332 10.3125 5.5 10.3125ZM7.60762 6.31855L5.84375 5.30234V2.40625C5.84375 2.21719 5.68906 2.0625 5.5 2.0625C5.31094 2.0625 5.15625 2.21719 5.15625 2.40625V5.5C5.15625 5.62287 5.22171 5.73633 5.32812 5.79777L7.26301 6.91496C7.31758 6.9459 7.37559 6.96094 7.43359 6.96094C7.55242 6.96094 7.66799 6.89951 7.7318 6.78906C7.82676 6.62363 7.7709 6.41523 7.60762 6.31855Z"
                                                                                  fill="#919CBA"/>
                                                                        </svg>
                                                                        </i>یک ساعت قبل</span>

                                                                    </div>
                                                                </div>
                                                                <div class="show_article inline_block">
                                                                    <a href="<?php echo get_permalink($post->ID) ?>">
                                                                        مشاهده
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

                                </div>
                            <?php endforeach;

                            foreach ($post_by_meta as $post) :
                                ?>
                                <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                    <div class="isvideo" style="display: none">
                                        <div class="article_single" itemid="article_single_is_video">
                                            <div class="article_single_content">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                                        <div class="article_single_img inline_block">
                                                            <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>"
                                                                 alt="">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                                        <div class="article_single_content_info inline_block">
                                                            <div class="article_single_content_title">
                                                                <h6><?php echo $post->post_title; ?></h6>
                                                            </div>
                                                            <div class="article_single_content_detail">
                                                                <p><?php echo substr($post->post_content, 0, 250) . " . . ." ?> </p>
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
                                                                        <?php
                                                                        $author_id = $post->post_author;
                                                                        $author_meta = get_the_author_meta('nicename', $author_id);
                                                                        ?>
                                                                        <span><?php echo $author_meta ?></span><br>
                                                                        <span><i>
                                                                        <svg width="11" height="11" viewBox="0 0 11 11"
                                                                             fill="none"
                                                                             xmlns="http://www.w3.org/2000/svg">
                                                                            <path d="M5.5 0C2.46211 0 0 2.46211 0 5.5C0 8.53789 2.46211 11 5.5 11C8.53789 11 11 8.53789 11 5.5C11 2.46211 8.53789 0 5.5 0ZM5.5 10.3125C2.84668 10.3125 0.6875 8.15332 0.6875 5.5C0.6875 2.84668 2.84668 0.6875 5.5 0.6875C8.15332 0.6875 10.3125 2.84668 10.3125 5.5C10.3125 8.15332 8.15332 10.3125 5.5 10.3125ZM7.60762 6.31855L5.84375 5.30234V2.40625C5.84375 2.21719 5.68906 2.0625 5.5 2.0625C5.31094 2.0625 5.15625 2.21719 5.15625 2.40625V5.5C5.15625 5.62287 5.22171 5.73633 5.32812 5.79777L7.26301 6.91496C7.31758 6.9459 7.37559 6.96094 7.43359 6.96094C7.55242 6.96094 7.66799 6.89951 7.7318 6.78906C7.82676 6.62363 7.7709 6.41523 7.60762 6.31855Z"
                                                                                  fill="#919CBA"/>
                                                                        </svg>
                                                                        </i>یک ساعت قبل</span>

                                                                    </div>
                                                                </div>
                                                                <div class="show_article inline_block">
                                                                    <a href="<?php echo get_permalink($post->ID) ?>">
                                                                        مشاهده
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

                                </div>
                            <?php
                            endforeach;
                            ?>


                            <nav aria-label="...">

                                <?php foreach ($post_cat['pagination'] as $catpage): ?>
                                    <a href="<?php echo '?page=' . $catpage->page ?>" <?php if ($catpage->isCurrent) : ?> style="color: black" <?php endif; ?> ><?php echo $catpage->page ?></a>
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
                                <p class="most_popular_content mb-3">محبوبترین مطالب</p>
                                <?php
                                $most_popular = get_most_popular_content(-1);
                                if ($most_popular != null):
                                    foreach ($most_popular as $post):
                                        ?>
                                        <div class="articles_item">
                                            <div class="article_item_content">
                                                <div class="row">
                                                    <div class="col-3">
                                                        <div class="article_item_image inline_block">
                                                            <a href="<?php echo get_permalink($post->ID) ?>">
                                                                <img src='<?php echo get_the_post_thumbnail_url($post->ID) ?>'>
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
                                                                <p>
                                                                    <a href="<?php echo get_permalink($post->ID) ?>">
                                                                        <?php echo substr($post->post_content, '0', '100') . '. . .' ?>
                                                                    </a>
                                                                </p>
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
                                <?php foreach (get_post_by_review(5) as $post) : ?>
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
                                                                <p><?php echo substr($post->post_title, 0, 250) . " . . ." ?></p>
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

