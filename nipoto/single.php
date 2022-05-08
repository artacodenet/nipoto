<?php get_header();

use Carbon\Carbon;

$post_id = get_the_id();
wp_localize_script("nipotoJs", "ajax_object", ["post_id" => $post_id, "ajax_url" => admin_url("admin-ajax.php")]);
$cat = get_the_category($post_id);

$post = get_post($post_id);
$subtitle1 = get_post_meta(get_the_id(), 'nipo_single_subtitle_1', true);
$subtitle2 = get_post_meta(get_the_id(), 'nipo_single_subtitle_2', true);
$author_id = $post->post_author;
$comments = get_comments();
$post_cat = get_post_by_category($cat[0]->term_id,NIPTO_POST_PER_PAGA);
$last_preview_count = get_post_meta($post_id,'nipo_post_preview_count',true);
$last_preview_count = $last_preview_count != null ? $last_preview_count : 0;
update_post_meta($post_id,'nipo_post_preview_count',++$last_preview_count);
?>

    <div class="author_header">
        <div class="container">
            <p>
                <a href="<?php bloginfo('url');?>" style="text-decoration: none">
                    <svg width="18" height="15" viewBox="0 0 18 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M17.8592 7.17361L9.37402 0.117516C9.25195 0.0394289 9.13302 0 9.01408 0C8.89515 0 8.77621 0.0394289 8.68231 0.117516L0.169008 7.17361C0.0572708 7.26769 0 7.39706 0 7.52642C0 7.78879 0.226667 7.99653 0.502348 7.99653C0.619969 7.99653 0.737715 7.95796 0.831925 7.87916L2.00312 6.88255L2.00331 12.6744C2.00331 13.9719 3.12663 15 4.50722 15H13.4931C14.8737 15 15.9971 13.9454 15.9971 12.6744L15.9971 6.88255L17.1956 7.87922C17.2926 7.9586 17.4085 7.99682 17.4992 7.99682C17.7724 7.99682 18 7.78917 18 7.55288C18 7.39706 17.9718 7.26769 17.8592 7.17361ZM10.5289 14.1121H7.52425V9.40804H10.5289V14.1121ZM14.9953 6.1152V12.7009C14.9953 13.4791 14.3214 14.1121 13.493 14.1121H11.503V9.24928C11.5305 8.82003 11.1549 8.46723 10.6948 8.46723H7.35524C6.89828 8.46723 6.52269 8.82003 6.52269 9.24928V14.1121H4.50704C3.67762 14.1121 3.00469 13.48 3.00469 12.7009V6.1152C3.00469 6.10411 2.99876 6.09487 2.99797 6.08397L9.01408 1.09773L15.0297 6.08403C15.0297 6.09462 14.9953 6.10344 14.9953 6.1152Z"
                              fill="#333C52"></path>
                    </svg>
                </a>
                <span><?php echo "/".$cat[0]->name . " / " . $post->post_title ?></span>
            </p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8 ">
                <div class="nipo_single_header ">
                    <div class="single_header_right inline_block">
                        <div class="single_tax">
                            <span><?php echo $cat[0]->name ?></span>
                        </div>
                        <div class="single_create_time">
                            <svg width="12" height="14" viewBox="0 0 16 18" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M13.7143 2.25H12.5714V0.530859C12.5714 0.251824 12.3143 0 12 0C11.6857 0 11.4286 0.251824 11.4286 0.530859V2.25H4.57143V0.530859C4.57143 0.251824 4.31429 0 4 0C3.68571 0 3.42857 0.251824 3.42857 0.530859V2.25H2.28571C1.02321 2.25 0 3.25723 0 4.5V15.75C0 16.9928 1.02321 18 2.28571 18H13.7143C14.9768 18 16 16.9928 16 15.75V4.5C16 3.25723 14.975 2.25 13.7143 2.25ZM2.28571 3.375H13.7143C14.3454 3.375 14.8571 3.87879 14.8571 4.5V5.625H1.14286V4.5C1.14286 3.87773 1.65464 3.375 2.28571 3.375ZM13.7143 16.875H2.28571C1.65464 16.875 1.14286 16.3712 1.14286 15.75V6.75H14.8571V15.75C14.8571 16.3723 14.3464 16.875 13.7143 16.875Z"
                                      fill="#5C6276"/>
                            </svg>
                            <span><?php echo handle_date(Carbon::create($post->post_date)->diffForHumans()); ?></span>
                        </div>
                    </div>
                    <div class="single_header_left  inline_block">
                        <div class="study_time">

                            <p>
                                <svg width="11" height="11" viewBox="0 0 11 11" fill="none"
                                     xmlns="http://www.w3.org/2000/svg">
                                    <path d="M5.5 0C2.46211 0 0 2.46211 0 5.5C0 8.53789 2.46211 11 5.5 11C8.53789 11 11 8.53789 11 5.5C11 2.46211 8.53789 0 5.5 0ZM5.5 10.3125C2.84668 10.3125 0.6875 8.15332 0.6875 5.5C0.6875 2.84668 2.84668 0.6875 5.5 0.6875C8.15332 0.6875 10.3125 2.84668 10.3125 5.5C10.3125 8.15332 8.15332 10.3125 5.5 10.3125ZM7.60762 6.31855L5.84375 5.30234V2.40625C5.84375 2.21719 5.68906 2.0625 5.5 2.0625C5.31094 2.0625 5.15625 2.21719 5.15625 2.40625V5.5C5.15625 5.62287 5.22171 5.73633 5.32812 5.79777L7.26301 6.91496C7.31758 6.9459 7.37559 6.96094 7.43359 6.96094C7.55242 6.96094 7.66799 6.89951 7.7318 6.78906C7.82676 6.62363 7.7709 6.41523 7.60762 6.31855Z"
                                          fill="#919CBA"></path>
                                </svg>
                                زمان مطالعه : <span>۷ دقیقه</span></p>
                        </div>
                    </div>
                </div>
                <div class="single_title">
                    <h5><?php echo $post->post_title ?></h5>
                    <p><?php echo $subtitle1 ?></p>
                </div>
                <div class="single_info">
                    <p><?php echo $subtitle2 ?></p>
                </div>
                <div class="single_image">
                    <img src="<?php echo get_the_post_thumbnail_url($post->ID) ?>" alt="">
                </div>
                <div class="single_content">
                    <?php echo $post->post_content ?>
                </div>
                <hr>
                <div class="single_likeAndComment">
                    <div class="inline_block text-center">
                        <div class="single_comment_count ">
                            <svg width="18" height="16" viewBox="0 0 18 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.01585 1.14286C13.3653 1.14286 16.873 3.96429 16.873 7.42857C16.873 10.8929 13.3653 13.7143 9.01585 13.7143C8.02094 13.7143 7.03518 13.5625 6.08429 13.2589C5.74916 13.1494 5.38275 13.2068 5.09572 13.4139C4.3174 13.9942 3.03405 14.6742 1.47882 14.8303C1.86974 14.2903 2.52656 13.3839 2.91361 12.3439L2.91814 12.3318C3.06898 11.9293 2.98118 11.5068 2.69172 11.1596C1.67322 10.0393 1.1291 8.77143 1.1291 7.42857C1.1291 3.96429 4.66993 1.14286 9.01585 1.14286ZM9.01585 0C4.03953 0 0.000966539 3.325 0.000966539 7.42857C0.000966539 9.12964 0.702512 10.6875 1.86436 11.9357C1.34066 13.3464 0.248902 14.5386 0.231293 14.5518C-0.00199178 14.8018 -0.0636235 15.1679 0.0684093 15.4804C0.204873 15.7929 0.506445 16 0.845244 16C3.01081 16 4.68754 15.0804 5.74409 14.3482C6.76541 14.6714 7.86422 14.8571 9.01585 14.8571C13.9957 14.8571 18 11.5311 18 7.42857C18 3.32607 13.9957 0 9.01585 0Z"
                                      fill="#5C6276"/>
                            </svg>
                        </div>
                        <div class="comment_count">
                            <span>2</span>
                        </div>
                    </div>

                    <div class="inline_block text-center m-auto">
                        <button class="single_like_count " id="single_like_count">
                            <svg width="17" height="16" viewBox="0 0 17 16" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M15.3499 1.20465C13.5403 -0.430116 10.8309 -0.166092 9.15417 1.67117L8.5004 2.39574L7.84596 1.67117C6.4946 0.190041 3.76198 -0.693787 1.65225 1.20465C-0.43523 3.08516 -0.54148 6.4707 1.32188 8.50976L7.73673 15.5305C7.94557 15.759 8.2278 15.875 8.49675 15.875C8.77067 15.875 9.03895 15.7607 9.24647 15.5322L15.6746 8.50797C17.5479 6.4707 17.435 3.08516 15.3499 1.20465ZM14.9182 7.72578L8.51335 14.7535L2.08389 7.72578C0.809888 6.33711 0.544263 3.68281 2.34122 2.06176C4.16042 0.413634 6.30202 1.6093 7.08229 2.46606L8.50173 4.0175L9.92116 2.46606C10.6891 1.62231 12.8474 0.426993 14.6626 2.06176C16.4522 3.6793 16.1899 6.33359 14.9182 7.72578Z"
                                      fill="#5C6276"/>
                            </svg>
                        </button>
                        <div class="like_count">
                            <span><?php echo get_post_meta(get_the_id(), 'nipo_like_count', true) != null ? get_post_meta(get_the_id(), 'nipo_like_count', true) : 0 ?></span>
                        </div>
                    </div>

                </div>
                <div class="single_sell_buy_currency">
                    <div class="row">
                        <div class="col-12 col-xm-12 col-md-8 col-lg-8">
                            <div class="sell_buy_title">
                                <div class="single_nipo_logo inline_block">
                                    <svg width="78" height="62" viewBox="0 0 78 62" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M77.4283 16.441C77.6081 15.8196 77.6634 15.1681 77.5908 14.5248C77.5183 13.8815 77.3194 13.2593 77.0058 12.6949C76.6922 12.1304 76.2702 11.635 75.7647 11.2377C75.2591 10.8404 74.6802 10.5492 74.0619 10.3813C73.4435 10.2135 72.7983 10.1722 72.164 10.26C71.5296 10.3478 70.9191 10.5628 70.3681 10.8925C69.8171 11.2223 69.3367 11.66 68.9553 12.18C68.5739 12.7 68.2991 13.2919 68.147 13.9208L65.2065 25.0419L60.9792 41.0404C60.4883 42.8892 59.642 44.6221 58.4888 46.1402C57.3356 47.6583 55.898 48.9318 54.2581 49.8879C50.9462 51.8191 47.0114 52.3406 43.3193 51.3378C39.6272 50.3349 36.4802 47.8899 34.5707 44.5406C32.6612 41.1913 32.1455 37.212 33.1371 33.4782L35.1573 25.8293C35.4235 24.6085 35.214 23.3308 34.5725 22.2622C33.9309 21.1935 32.9066 20.4162 31.7127 20.0919C30.5188 19.7675 29.2472 19.9212 28.1625 20.5209C27.0778 21.1206 26.2635 22.1201 25.889 23.3116L23.7563 31.3721C23.6862 31.6433 23.6204 31.9146 23.5567 32.1817C22.1396 38.3212 23.1379 44.7775 26.3407 50.1864C29.5435 55.5953 34.7 59.5334 40.7208 61.1685C46.7416 62.8037 53.1551 62.0079 58.6065 58.9493C64.0578 55.8907 68.12 50.8089 69.9349 44.7774C70.0116 44.5151 70.0886 44.2459 70.1544 43.9767L73.6979 30.5559C73.7501 30.3558 73.8023 30.1555 73.8493 29.9597C73.9677 29.4615 74.0687 28.9654 74.1564 28.4674C74.2933 28.1817 74.4043 27.884 74.4878 27.5779L77.4283 16.441Z"
                                              fill="url(#paint0_linear_1_1122)"/>
                                        <path d="M44.456 28.4108L42.4439 36.0198C42.2647 36.641 42.21 37.2922 42.283 37.9351C42.3559 38.578 42.5551 39.1996 42.8688 39.7637C43.1825 40.3277 43.6043 40.8227 44.1097 41.2196C44.6151 41.6166 45.1937 41.9074 45.8117 42.0752C46.4297 42.243 47.0746 42.2843 47.7086 42.1967C48.3426 42.1091 48.9529 41.8943 49.5037 41.565C50.0545 41.2357 50.5348 40.7984 50.9163 40.2789C51.2978 39.7594 51.5729 39.1681 51.7255 38.5397L53.8451 30.5193C53.9174 30.2501 53.981 29.9767 54.0471 29.7121C55.4317 23.5853 54.4149 17.1543 51.2101 11.7697C48.0054 6.38514 42.862 2.46599 36.8603 0.835418C30.8587 -0.795156 24.4657 -0.0102723 19.0242 3.02522C13.5826 6.06071 9.51596 11.1106 7.67826 17.1143C7.60154 17.3766 7.52456 17.6457 7.45881 17.9173L3.89439 31.3402C3.83959 31.5403 3.78688 31.7406 3.74304 31.9364C3.62249 32.4325 3.52359 32.9283 3.43592 33.4266C3.29693 33.7114 3.18593 34.0093 3.10452 34.3161L0.164268 45.4594C-0.141889 46.6124 -0.0172482 47.8391 0.514376 48.9051C1.046 49.9711 1.94734 50.8017 3.04619 51.2381C4.14504 51.6745 5.36436 51.6862 6.47121 51.271C7.57805 50.8557 8.49482 50.0426 9.04636 48.987C9.17569 48.7404 9.2836 48.4828 9.36888 48.2173C9.39732 48.1328 9.42107 48.0484 9.44351 47.9637L12.3838 36.8426L16.6141 20.8485C17.1051 18.9997 17.9514 17.2668 19.1046 15.7488C20.2578 14.2307 21.6954 12.9572 23.3353 12.001C24.9751 11.0448 26.7852 10.4247 28.6621 10.1759C30.5389 9.92713 32.4459 10.0547 34.274 10.5512C36.1022 11.0478 37.8157 11.9036 39.3168 13.0698C40.8179 14.2361 42.0771 15.6899 43.0226 17.3484C43.9681 19.0068 44.5814 20.8373 44.8274 22.7354C45.0734 24.6335 44.9473 26.562 44.4563 28.4108H44.456Z"
                                              fill="url(#paint1_linear_1_1122)"/>
                                        <path d="M60.4384 11.0339C61.792 11.0491 63.1029 10.5548 64.1163 9.64702C65.1296 8.73925 65.773 7.48288 65.9215 6.1221C66.0699 4.76132 65.7128 3.39333 64.9194 2.284C64.1261 1.17467 62.9533 0.403256 61.629 0.119673C60.3046 -0.16391 58.9233 0.0606013 57.7534 0.749572C56.5836 1.43854 55.7089 2.54276 55.2992 3.84761C54.8896 5.15245 54.9743 6.56473 55.5369 7.80994C56.0995 9.05516 57.0997 10.0444 58.3433 10.5853C59.0057 10.8728 59.7176 11.0253 60.4384 11.0339Z"
                                              fill="url(#paint2_linear_1_1122)"/>
                                        <defs>
                                            <linearGradient id="paint0_linear_1_1122" x1="64.2218" y1="37.9718"
                                                            x2="25.7143" y2="54.0126" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF9270"/>
                                                <stop offset="1" stop-color="#FF5252"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_1_1122" x1="-4.10033e-08" y1="30.4301"
                                                            x2="38.0715" y2="27.7674" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF5252"/>
                                                <stop offset="1" stop-color="#FF9270"/>
                                            </linearGradient>
                                            <linearGradient id="paint2_linear_1_1122" x1="63.8158" y1="0.706194"
                                                            x2="53.4223" y2="13.1374" gradientUnits="userSpaceOnUse">
                                                <stop stop-color="#FF9270"/>
                                                <stop offset="1" stop-color="#FF5252"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </div>
                                <div class="sell_buy_nipo inline_block">
                                    <svg width="73" height="27" viewBox="0 0 73 27" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.260344 22.238C3.22434 21.5967 5.37368 20.8253 6.70834 19.924C8.04301 19.0227 8.71034 17.8613 8.71034 16.44C8.71034 15.4173 8.56301 14.4207 8.26834 13.45C7.99101 12.462 7.60101 11.656 7.09834 11.032C6.61301 10.408 6.06701 10.096 5.46034 10.096C5.11368 10.096 4.78434 10.226 4.47234 10.486C4.17768 10.7287 3.94368 11.0407 3.77034 11.422C3.59701 11.8033 3.51034 12.1673 3.51034 12.514C3.51034 12.8087 3.57101 13.0427 3.69234 13.216C3.96968 13.5973 4.60234 13.8487 5.59034 13.97C6.59568 14.074 7.97368 14.126 9.72434 14.126H12.2983L12.5063 16.076L12.2983 18L8.99634 18.026C6.89901 18.026 5.21768 17.8527 3.95234 17.506C2.68701 17.1593 1.80301 16.4573 1.30034 15.4C0.988344 14.724 0.832344 13.9787 0.832344 13.164C0.832344 12.1413 1.04901 11.1273 1.48234 10.122C1.91568 9.09933 2.51368 8.26733 3.27634 7.626C4.03901 6.96733 4.87101 6.638 5.77234 6.638C6.81234 6.638 7.75701 7.08867 8.60634 7.99C9.45568 8.89133 10.123 10.07 10.6083 11.526C11.0937 12.982 11.3363 14.4987 11.3363 16.076C11.3363 18.5027 10.461 20.548 8.71034 22.212C6.95968 23.876 4.54168 25.0027 1.45634 25.592L0.260344 22.238ZM11.9677 14.126H17.3757L17.5837 16.076L17.3757 18H11.9677V14.126ZM17.122 14.126H18.37C20.086 14.126 21.2993 13.9787 22.01 13.684C22.7206 13.3893 23.076 12.9387 23.076 12.332C23.0586 11.9507 22.8593 11.2227 22.478 10.148C22.0966 9.056 21.8193 8.328 21.646 7.964L24.402 6.456C24.7486 7.184 25.0953 8.15467 25.442 9.368C25.7886 10.564 25.962 11.6127 25.962 12.514C25.9446 14.282 25.3466 15.6427 24.168 16.596C22.9893 17.532 21.2473 18 18.942 18H17.122V14.126ZM19.54 1.1L21.698 3.284C21.23 3.76933 20.7533 4.246 20.268 4.714L19.54 5.442L18.474 4.35L17.382 3.284L19.54 1.1ZM24.09 1.1L26.248 3.284C25.78 3.76933 25.3033 4.246 24.818 4.714L24.09 5.442L23.024 4.35L21.932 3.284L24.09 1.1ZM27.8853 22.238C30.8493 21.5967 32.9987 20.8253 34.3333 19.924C35.668 19.0227 36.3353 17.8613 36.3353 16.44C36.3353 15.4173 36.188 14.4207 35.8933 13.45C35.616 12.462 35.226 11.656 34.7233 11.032C34.238 10.408 33.692 10.096 33.0853 10.096C32.7387 10.096 32.4093 10.226 32.0973 10.486C31.8027 10.7287 31.5687 11.0407 31.3953 11.422C31.222 11.8033 31.1353 12.1673 31.1353 12.514C31.1353 12.8087 31.196 13.0427 31.3173 13.216C31.5947 13.5973 32.2273 13.8487 33.2153 13.97C34.2207 14.074 35.5987 14.126 37.3493 14.126H39.9233L40.1313 16.076L39.9233 18L36.6213 18.026C34.524 18.026 32.8427 17.8527 31.5773 17.506C30.312 17.1593 29.428 16.4573 28.9253 15.4C28.6133 14.724 28.4573 13.9787 28.4573 13.164C28.4573 12.1413 28.674 11.1273 29.1073 10.122C29.5407 9.09933 30.1387 8.26733 30.9013 7.626C31.664 6.96733 32.496 6.638 33.3973 6.638C34.4373 6.638 35.382 7.08867 36.2313 7.99C37.0807 8.89133 37.748 10.07 38.2333 11.526C38.7187 12.982 38.9613 14.4987 38.9613 16.076C38.9613 18.5027 38.086 20.548 36.3353 22.212C34.5847 23.876 32.1667 25.0027 29.0813 25.592L27.8853 22.238ZM39.5927 14.126H45.0007L45.2087 16.076L45.0007 18H39.5927V14.126ZM44.747 14.126H44.929C46.489 14.126 47.6503 14.048 48.413 13.892C49.1756 13.7187 49.6783 13.4673 49.921 13.138C50.1636 12.8087 50.285 12.332 50.285 11.708C50.285 11.2053 50.1983 10.382 50.025 9.238L52.703 8.718C52.9456 9.98333 53.067 11.4133 53.067 13.008C53.1363 13.3027 53.327 13.5627 53.639 13.788C53.951 14.0133 54.4016 14.126 54.991 14.126H55.147L55.355 16.076L55.147 18H54.991C54.1936 18 53.457 17.7833 52.781 17.35C52.105 16.8993 51.5763 16.336 51.195 15.66L51.845 15.79C51.377 16.5873 50.6143 17.1593 49.557 17.506C48.517 17.8353 46.9743 18 44.929 18H44.747V14.126ZM49.453 19.794C50.1636 20.47 50.857 21.1633 51.533 21.874L49.453 23.954C48.777 23.2433 48.0836 22.55 47.373 21.874L49.453 19.794ZM44.539 19.794C45.2496 20.47 45.943 21.1633 46.619 21.874L44.539 23.954C43.863 23.2433 43.1696 22.55 42.459 21.874L44.539 19.794ZM47.009 23.122L48.855 24.942L47.009 26.762L46.411 26.164C45.995 25.7653 45.5876 25.358 45.189 24.942L47.009 23.122ZM65.4078 14.126L65.6158 16.076L65.4078 18H65.3038C64.1598 18 63.2065 17.7053 62.4438 17.116C61.6811 16.5267 61.1525 15.634 60.8578 14.438C60.6498 13.6407 60.4678 12.8 60.3118 11.916C60.2078 11.4827 60.1125 11.058 60.0258 10.642C59.9391 10.226 59.8525 9.82733 59.7658 9.446L62.3398 8.562C62.7211 10.1567 63.0418 11.4567 63.3018 12.462C63.4751 13.0513 63.7178 13.476 64.0298 13.736C64.3418 13.996 64.7578 14.126 65.2778 14.126H65.4078ZM63.0938 12.982C62.8511 14.75 62.1058 16.0327 60.8578 16.83C59.6098 17.61 57.6771 18 55.0598 18H54.8778V14.126H55.0338C56.7671 14.126 58.0845 13.996 58.9858 13.736C59.9045 13.476 60.4505 13.06 60.6238 12.488L63.0938 12.982ZM55.5278 20.21L57.6858 22.394C57.2178 22.8793 56.7411 23.356 56.2558 23.824L55.5278 24.552L54.4618 23.46L53.3698 22.394L55.5278 20.21ZM60.0778 20.21L62.2358 22.394C61.7678 22.8793 61.2911 23.356 60.8058 23.824L60.0778 24.552L59.0118 23.46L57.9198 22.394L60.0778 20.21ZM65.1356 14.126H66.5136C67.7616 14.126 68.6543 13.9873 69.1916 13.71C69.7463 13.4327 70.0236 13.0167 70.0236 12.462C70.0236 12.098 69.8416 11.3873 69.4776 10.33C69.1136 9.25533 68.8276 8.46667 68.6196 7.964L71.3496 6.456C71.679 7.184 72.017 8.16333 72.3636 9.394C72.7276 10.6073 72.9096 11.6733 72.9096 12.592C72.9096 14.36 72.355 15.7033 71.2456 16.622C70.1536 17.5407 68.5763 18 66.5136 18H65.1356V14.126ZM66.6696 2.998L69.0876 0.605999L71.4796 2.998L70.6736 3.804C70.1536 4.34133 69.625 4.87 69.0876 5.39L66.6696 2.998Z"
                                              fill="#5C6276"/>
                                    </svg>
                                    <p>خرید و فروش ارزهای دیجیتال از امروز شروع کنید</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-12 col-xm-12 col-md-4 col-lg-4">
                            <div class="sell_buy_button">
                                <a href="">
                                    <button type="button">خرید و فروش ارز دیجیتال</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="single_hashtag">
                    <button type="button" class="hashtag_item">#بیت کوین</button>
                </div>
                <hr>
                <div class="single_author">
                    <div class="row">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <div class="single_author_image">
                                <?php $user_image_id = get_user_meta(get_current_user_id(), "arta_facial_auth_user_image", true);
                                $profile_url = get_the_guid($user_image_id);
                                ?>
                                <img src="<?php echo $profile_url ?>" alt="">
                            </div>
                            <div class="single_author_profile">
                                <span>درباره نگارنده</span>
                                <p><?php echo get_the_author_meta('display_name', $author_id); ?></p>
                            </div>
                        </div>
                        <div class="col-12 col-sm-12 col-md-8 col-lg-8">
                            <p>لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ و با استفاده از طراحان گرافیک
                                است. چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است و برای شرایط
                                فعلی تکنولوژی مورد نیاز و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد. کتابهای
                                زیادی در شصت و سه درصد گذشته، حال و آینده شناخت فراوان جامعه و متخصصان را می طلبد</p>
                        </div>
                    </div>
                </div>
                <div class="single_may_be_interested">
                    <h5 class="nipo_main_title">ممکن است علاقه مند باشید</h5>
                    <div class="row">
                        <?php foreach ($post_cat["posts"] as $post) : ?>
                            <div class="col-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                                <div class="articles_item">
                                    <div class="article_item_content">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="article_item_image inline_block">
                                                    <img src="http://localhost/nipoto/wp-content/themes/nipoto/assets/images/Rectangle 17.png"
                                                         alt="artacode" class=""></div>
                                            </div>
                                            <div class="col-9">
                                                <div class="article_item_content_detail inline_block">
                                                    <div class="article_item_content_title">
                                                        <span><?php echo $cat[0]->name?></span>
                                                    </div>
                                                    <div class="article_item_content_info">
                                                        <p><?php echo $post->post_title?></p>
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
                <div class="single_comment">
                    <h5 class="nipo_main_title">ثبت دیدگاه</h5>
                    <?php
                    function wpdocs_remove_website_field($fields)
                    {
                        unset($fields['url']);
                        unset($fields['cookies']);
                        unset($fields['comment_notes_before']);
                        return $fields;
                    }

                    add_filter('comment_form_default_fields', 'wpdocs_remove_website_field');
                    $arg = array(
                        "class_submit" => "nipo_comment_submit",
                        "label_submit" => "ارسال دیدگاه",
                    );
                    comment_form($arg);
                    ?>
                    <!--                    <form action="" method="post">-->
                    <!--                        <input type="text" name="nipo_name" placeholder="نام و نام خانوادگی">-->
                    <!--                        <input type="text" name="nipo_email" placeholder="ایمیل">-->
                    <!--                        <textarea name="comment_content" placeholder="متن دیدگاه"></textarea>-->
                    <!--                        <button class="nipo_comment_submit" type="submit" name="nipo_comment_submit">ارسال دیدگاه-->
                    <!--                        </button>-->
                    <!--                    </form>-->
                </div>
                <div class="single_comment_list">
                    <h5 class="nipo_main_title">لیست نظرات
                        <span><?php echo "(" . get_comments_number($post_id) . ")" ?></span></h5>
                    <ol class="commentlist">
                        <?php
                        //Gather comments for a specific page/post
                        $comments = get_comments(array(
                            'post_id' => $post_id,
                        ));

                        //Display the list of comments
                        wp_list_comments(array(
                            'per_page' => 10, //Allow comment pagination
                            'reverse_top_level' => false //Show the oldest comments at the top of the list
                        ), $comments);
                        ?>
                    </ol>
                </div>

            </div>
            <div class="d-sm-none d-lg-block col-lg-4 col-xl-4 mt-4">
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
                                    <img src="http://localhost/nipoto/wp-content/themes/nipoto/assets/images/BTC.png"
                                         alt="" class=""></div>
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
                        $post_selector = get_post_is_selector(NIPTO_POST_PER_PAGA, 'nipo_is_selector');
                        if ($post_selector != null):
                            foreach ($post_selector as $item) :
                                ?>
                                <div class="articles_item">
                                    <div class="article_item_content">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="article_item_image inline_block">
                                                    <img src="<?php echo get_the_post_thumbnail_url($item->ID) ?>"
                                                         alt="">

                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="article_item_content_detail inline_block">
                                                    <div class="article_item_content_title">
                                                        <span><?php echo get_the_category($item->ID)[0]->name; ?></span>
                                                    </div>
                                                    <div class="article_item_content_info">
                                                        <p><?php echo $item->post_title ?></p>
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
                                                <?php nipoto_image('Rectangle 17.png', 'artacode'); ?>
                                            </div>
                                        </div>
                                        <div class="col-9">
                                            <div class="article_item_content_detail inline_block">
                                                <div class="article_item_content_title">
                                                    <span>اخبار روزانه</span>
                                                </div>
                                                <div class="article_item_content_info">
                                                    <p><?php echo $post->post_title ?></p>
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
<?php get_footer(); ?>