<?php get_header(); ?>

<?php

use Carbon\Carbon;

$post_author_selector = post_author_selector(4);
$post_by_meta = get_post_by_postmeta(4, 'nipo_is_video', 'nipo_is_selector');
$posts_is_selector = get_post_is_selector(-1, 'nipo_is_selector');
$post_by_cat = get_post_by_category(4);
$args = array(
    'hide_empty' => false,
);
$categories = get_categories($args); //This returns both used and unused categories

?>
    <div class="Quick-Access">
        <div class="container">
            <div class="row">
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="Quick-Access_Item">
                        <div class="icon inline_block">
                            <svg width="35" height="30" viewBox="0 0 42 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M40.5431 7.01084L21.7547 0.133512C21.2625 -0.0452851 20.7309 -0.0432762 20.2453 0.132173L1.45819 7.01084C0.572184 7.33227 0 8.15595 0 9.04658C0 9.93722 0.572184 10.8192 1.45819 11.1433L3.15 11.8256V19.3994L1.07691 28.6942C1.00511 29.0123 1.07998 29.345 1.2789 29.6002C1.47782 29.8554 1.78041 30 2.10066 30H6.29934C6.61822 30 6.92022 29.8514 7.119 29.5982C7.31896 29.345 7.39384 29.0123 7.32408 28.6942L5.25 19.2588V12.589L20.2453 18.0795C20.4883 18.1674 20.7426 18.2093 20.998 18.2093C21.2544 18.2093 21.5107 18.1654 21.7567 18.0774L40.5385 11.2001C41.4291 10.8814 42 10.0578 42 9.04658C42 8.03541 41.4291 7.33227 40.5431 7.01084ZM3.41775 27.7968L4.21116 24.2644L4.98816 27.7968H3.41775ZM20.9541 16.0645L8.49844 11.5042L21.3084 7.45281C21.8622 7.27703 22.1747 6.67936 22.0021 6.11217C21.8309 5.54919 21.2481 5.22622 20.6889 5.40568L5.21062 10.2988L2.1 9.10685L21.0459 2.14917L39.9 9.10685L20.9541 16.0645ZM31.6509 17.1494C31.0757 17.2268 30.6705 17.7647 30.7466 18.3527L31.4921 24.1539C31.568 24.7504 31.1866 25.3365 30.5209 25.6499C27.6393 27.01 24.381 27.7741 21.1234 27.8558H20.9016C17.619 27.7741 14.3607 27.01 11.4778 25.6499C10.8124 25.336 10.4311 24.7499 10.5066 24.1559L11.2547 18.3547C11.3305 17.7667 10.9255 17.2291 10.3504 17.1514C9.765 17.069 9.24656 17.4909 9.17437 18.0735L8.42887 23.8787C8.23095 25.4209 9.08309 26.8821 10.5997 27.5973C13.7419 29.0759 17.2856 29.9129 20.8753 30H21.1471C24.7144 29.91 28.2608 29.0792 31.3977 27.5973C32.9143 26.8814 33.7661 25.4209 33.5686 23.8767L32.8231 18.0735C32.7534 17.4909 32.2284 17.069 31.6509 17.1494Z"
                                      fill="#00D7A3"/>
                            </svg>
                        </div>
                        <div class="access_info inline_block">
                            <p>آموزش تحلیل تکنیکال</p>
                            <span>از اینجا شروع کن و تحلیل رو یاد بگیر</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="Quick-Access_Item">
                        <div class="icon inline_block">
                            <svg width="34" height="30" viewBox="0 0 34 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.73737 20.625H1.86869C0.836821 20.625 0 21.4646 0 22.5V28.125C0 29.1604 0.836821 30 1.86869 30H3.73737C4.76924 30 5.60606 29.1604 5.60606 28.125V22.5C5.60606 21.4629 4.76924 20.625 3.73737 20.625ZM3.73737 28.125H1.86869V22.5H3.73737V28.125ZM31.7677 11.25H29.899C28.8671 11.25 28.0303 12.0896 28.0303 13.125V28.125C28.0303 29.1604 28.8671 30 29.899 30H31.7677C32.7995 30 33.6364 29.1604 33.6364 28.125V13.125C33.6364 12.0879 32.8013 11.25 31.7677 11.25ZM31.7677 28.125H29.899V13.125H31.7677V28.125ZM22.4242 18.75H20.5556C19.5237 18.75 18.6869 19.5896 18.6869 20.625V28.125C18.6869 29.1604 19.5237 30 20.5556 30H22.4242C23.4561 30 24.2929 29.1604 24.2929 28.125V20.625C24.2929 19.5879 23.4579 18.75 22.4242 18.75ZM22.4242 28.125H20.5556V20.625H22.4242V28.125ZM13.0808 11.25H11.2121C10.1785 11.25 9.34343 12.0879 9.34343 13.125V28.125C9.34343 29.1604 10.1803 30 11.2121 30H13.0808C14.1127 30 14.9495 29.1604 14.9495 28.125V13.125C14.9495 12.0879 14.1144 11.25 13.0808 11.25ZM13.0808 28.125H11.2121V13.125H13.0808V28.125ZM29.4961 5.22656C29.8464 5.45625 30.337 5.625 30.8333 5.625C32.3808 5.625 33.6364 4.36582 33.6364 2.8125C33.6364 1.25918 32.3808 0 30.8333 0C29.2858 0 28.0303 1.25918 28.0303 2.8125C28.0303 3.17332 28.1223 3.50508 28.2489 3.82031L22.8272 7.89844C22.4242 7.66992 21.9863 7.5 21.4899 7.5C20.9935 7.5 20.5526 7.66857 20.1503 7.8985L14.7334 3.82031C14.8561 3.50508 14.9495 3.17344 14.9495 2.8125C14.9495 1.25918 13.694 0 12.1465 0C10.599 0 9.34343 1.25918 9.34343 2.8125C9.34343 3.24346 9.46922 3.63457 9.64318 3.99844L3.98515 9.67559C3.62233 9.50391 3.23283 9.375 2.80303 9.375C1.25494 9.375 0 10.6348 0 12.1875C0 13.7402 1.25494 15 2.80303 15C4.35112 15 5.60606 13.7402 5.60606 12.1875C5.60606 11.7565 5.48027 11.3654 5.30631 11.0016L10.9643 5.32441C11.2764 5.49902 11.7143 5.625 12.1465 5.625C12.6434 5.625 13.0837 5.45643 13.4861 5.2265L18.9053 9.30463C18.7803 9.62109 18.6869 9.94922 18.6869 10.3125C18.6869 11.8652 19.9424 13.125 21.4899 13.125C23.0374 13.125 24.2929 11.8652 24.2929 10.3125C24.2929 9.95168 24.2009 9.61992 24.0743 9.30469L29.4961 5.22656ZM30.8333 1.875C31.3472 1.875 31.7677 2.2957 31.7677 2.8125C31.7677 3.3293 31.3472 3.75 30.8333 3.75C30.5523 3.75 30.3443 3.61658 30.219 3.50473L30.1061 3.40365L30.026 3.2591C29.9399 3.10488 29.899 2.95898 29.899 2.8125C29.899 2.2957 30.3194 1.875 30.8333 1.875ZM2.80303 13.125C2.28797 13.125 1.86869 12.7031 1.86869 12.1875C1.86869 11.6719 2.28797 11.25 2.80303 11.25C2.99498 11.25 3.17554 11.3094 3.33958 11.4266L3.46916 11.5192L3.56143 11.6492C3.67839 11.8125 3.73737 11.9941 3.73737 12.1875C3.73737 12.7031 3.31809 13.125 2.80303 13.125ZM12.9523 3.25898L12.8764 3.40371L12.7596 3.50508C12.637 3.61641 12.4268 3.75 12.1465 3.75C11.9538 3.75 11.7727 3.69082 11.6092 3.57363L11.4807 3.48105L11.3873 3.35098C11.2705 3.18633 11.2121 3.00527 11.2121 2.8125C11.2121 2.2957 11.6326 1.875 12.1465 1.875C12.6604 1.875 13.0808 2.2957 13.0808 2.8125C13.0808 2.95898 13.0399 3.10488 12.9523 3.25898ZM21.4899 11.25C20.976 11.25 20.5556 10.8281 20.5556 10.3125C20.5556 10.1663 20.5972 10.0201 20.6827 9.86584L20.7628 9.72129L20.8757 9.62022C20.9994 9.50977 21.2096 9.375 21.4899 9.375C21.7702 9.375 21.979 9.50842 22.1042 9.62027L22.2172 9.72135L22.2972 9.8659C22.3834 10.0195 22.4242 10.166 22.4242 10.3125C22.4242 10.8281 22.0038 11.25 21.4899 11.25Z"
                                      fill="#00D1DE"/>
                            </svg>
                        </div>
                        <div class="access_info inline_block">
                            <p>تحلیل ارزهای دیجیتال</p>
                            <span>قبل از ترید بهتره اینجا رو بخونی!</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="Quick-Access_Item">
                        <div class="icon inline_block">
                            <svg width="31" height="30" viewBox="0 0 31 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M9.93702 5.47806C10.0138 5.54832 10.1082 5.61917 10.2086 5.68943C9.29935 5.72427 8.4137 5.80043 7.55757 5.91616V4.72348C7.55757 3.82307 8.06534 3.08679 8.70301 2.53651C9.34658 1.98268 10.2204 1.52746 11.2242 1.16375C13.2316 0.433261 15.9417 0 18.8939 0C21.793 0 24.5562 0.433261 26.5637 1.16375C27.5674 1.52746 28.4413 1.98268 29.0848 2.53651C29.7225 3.08679 30.2303 3.82307 30.2303 4.72348V10.864V17.5891C30.2303 18.4983 29.7461 19.2541 29.1025 19.8327C28.4058 20.4113 27.5792 20.8896 26.5755 21.2734C25.9673 21.5036 25.2883 21.7103 24.5621 21.8815V19.9331C25.0462 19.8032 25.495 19.6615 25.9083 19.508C26.7821 19.1714 27.4257 18.7994 27.839 18.4275C28.2464 18.0614 28.3409 17.7721 28.3409 17.5891V13.6804C27.8272 14.011 27.2309 14.3003 26.5755 14.5483C25.9673 14.7786 25.2883 14.9852 24.5621 15.1565V13.208C25.0462 13.0781 25.495 12.9364 25.9083 12.7829C26.7821 12.4464 27.4257 12.0685 27.839 11.7024C28.2464 11.2832 28.3409 11.047 28.3409 10.864V7.44538C27.8213 7.77012 27.219 8.04763 26.5637 8.2838C25.5422 8.65578 24.3436 8.95099 23.0211 9.14584C22.9148 8.98051 22.8026 8.92738 22.6904 8.827C22.0941 8.28971 21.4092 7.85278 20.6947 7.49852C22.7436 7.36272 24.5562 7.00256 25.867 6.50659C26.7998 6.18776 27.4434 5.82877 27.8508 5.47806C28.2641 5.12438 28.3409 4.86636 28.3409 4.72348C28.3409 4.58059 28.2641 4.32257 27.8508 3.9689C27.4434 3.61819 26.7998 3.2592 25.867 2.93918C24.1665 2.30211 21.6808 1.88939 18.8939 1.88939C16.1071 1.88939 13.6213 2.30211 11.8677 2.93918C10.988 3.2592 10.3444 3.61819 9.93702 3.9689C9.52372 4.32257 9.39382 4.58059 9.39382 4.72348C9.39382 4.86636 9.52372 5.12438 9.93702 5.47806ZM0 12.281C0 11.3777 0.50494 10.6455 1.14544 10.0433C1.78902 9.54143 2.66522 9.08679 3.66542 8.72072C5.67408 7.98858 8.38418 7.55757 11.3364 7.55757C14.2354 7.55757 16.9986 7.98858 19.0061 8.72072C20.0098 9.08679 20.8837 9.54143 21.5273 10.0433C22.1649 10.6455 22.6727 11.3777 22.6727 12.281V25.1466C22.6727 26.0559 22.1885 26.8116 21.545 27.3903C20.8483 27.9689 20.0216 28.4472 19.0179 28.8309C17.0104 29.5985 14.2885 30 11.3364 30C8.33104 30 5.66522 29.5985 3.65184 28.8309C2.64869 28.4472 1.7719 27.9689 1.12891 27.3903C0.486577 26.8116 1.7713e-05 26.0559 1.7713e-05 25.1466L0 12.281ZM2.37709 13.0368C2.78508 13.3852 3.43102 13.7453 4.31136 14.0642C6.06377 14.7018 8.5495 15.1151 11.3364 15.1151C14.1232 15.1151 16.6089 14.7018 18.3094 14.0642C19.2423 13.7453 19.8858 13.3852 20.2932 13.0368C20.7066 12.6825 20.7833 12.4228 20.7833 12.281C20.7833 12.1393 20.7066 11.8796 20.2932 11.5253C19.8858 11.1769 19.2423 10.8168 18.3094 10.4979C16.6089 9.80712 14.1232 9.44696 11.3364 9.44696C8.5495 9.44696 6.06377 9.80712 4.31136 10.4979C3.43102 10.8168 2.78508 11.1769 2.37709 11.5253C1.96615 11.8796 1.88939 12.1393 1.88939 12.281C1.88939 12.4228 1.96615 12.6825 2.37709 13.0368ZM19.0061 15.8414C16.9986 16.5735 14.2354 17.0045 11.3364 17.0045C8.38418 17.0045 5.67408 16.5735 3.66542 15.8414C3.01004 15.6052 2.40779 15.3218 1.88939 15.003V18.4216C1.88939 18.6046 1.98445 18.8408 2.39362 19.26C2.8022 19.6261 3.44755 20.0039 4.32494 20.3405C6.07558 21.0018 8.5495 21.4328 11.3364 21.4328C14.1232 21.4328 16.5971 21.0018 18.3507 20.3405C19.2246 20.0039 19.8681 19.6261 20.2814 19.26C20.6888 18.8408 20.7833 18.6046 20.7833 18.4216V15.003C20.2637 15.3218 19.6615 15.6052 19.0061 15.8414ZM2.39362 25.985C2.8022 26.357 3.44755 26.729 4.32494 27.0655C6.07558 27.7268 8.5495 28.1106 11.3364 28.1106C14.1232 28.1106 16.5971 27.7268 18.3507 27.0655C19.2246 26.729 19.8681 26.357 20.2814 25.985C20.6888 25.619 20.7833 25.3297 20.7833 25.1466V21.2379C20.2696 21.5686 19.6733 21.8579 19.0179 22.1059C17.0104 22.8734 14.2885 23.3222 11.3364 23.3222C8.33104 23.3222 5.66522 22.8734 3.65184 22.1059C3.00177 21.8579 2.40425 21.5686 1.83625 21.2379V25.1466C1.83625 25.3297 1.98445 25.619 2.39362 25.985Z"
                                      fill="#C876B7"/>
                            </svg>
                        </div>
                        <div class="access_info inline_block">
                            <p>آموزش ارزهای دیجیتال</p>
                            <span>با دنیای کریپتو بیشتر آشنا شو!</span>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-6 col-lg-3">
                    <div class="Quick-Access_Item">
                        <div class="icon inline_block">
                            <svg width="35" height="30" viewBox="0 0 35 30" fill="none"
                                 xmlns="http://www.w3.org/2000/svg">
                                <path d="M31.0714 0H9.64286C7.8683 0 6.42857 1.44174 6.42857 3.21429V25.7143C6.42857 26.8969 5.46696 27.8571 4.28571 27.8571C3.10446 27.8571 2.14286 26.8969 2.14286 25.7143V5.35714C2.14286 4.76786 1.66339 4.28571 1.07143 4.28571C0.479464 4.28571 0 4.76786 0 5.35714V25.7143C0 28.0768 1.92187 30 4.28571 30H28.9286C31.8824 30 34.2857 27.5973 34.2857 24.6429V3.21429C34.2857 1.44174 32.846 0 31.0714 0ZM32.1429 24.6429C32.1429 26.4154 30.7011 27.8571 28.9286 27.8571H7.99554C8.36384 27.2277 8.57143 26.4978 8.57143 25.7143V3.21429C8.57143 2.62433 9.05357 2.14286 9.64286 2.14286H31.0714C31.6607 2.14286 32.1429 2.62433 32.1429 3.21429V24.6429ZM18.2143 18.2143H11.7857C11.1964 18.2143 10.7143 18.6964 10.7143 19.2857C10.7143 19.875 11.1935 20.3571 11.7857 20.3571H18.2143C18.8065 20.3571 19.2857 19.8779 19.2857 19.2857C19.2857 18.6935 18.8036 18.2143 18.2143 18.2143ZM28.9286 18.2143H22.5C21.9107 18.2143 21.4286 18.6964 21.4286 19.2857C21.4286 19.875 21.9078 20.3571 22.5 20.3571H28.9286C29.5208 20.3571 30 19.8779 30 19.2857C30 18.6935 29.5179 18.2143 28.9286 18.2143ZM18.2143 22.5H11.7857C11.1964 22.5 10.7143 22.9821 10.7143 23.5714C10.7143 24.1607 11.1935 24.6429 11.7857 24.6429H18.2143C18.8065 24.6429 19.2857 24.1637 19.2857 23.5714C19.2857 22.9792 18.8036 22.5 18.2143 22.5ZM28.9286 22.5H22.5C21.9078 22.5 21.4286 22.9792 21.4286 23.5714C21.4286 24.1637 21.9078 24.6429 22.5 24.6429H28.9286C29.5208 24.6429 30 24.1637 30 23.5714C30 22.9792 29.5179 22.5 28.9286 22.5ZM27.8571 4.28571H12.8571C11.6719 4.28571 10.7143 5.2433 10.7143 6.42857V12.8571C10.7143 14.0404 11.6739 15 12.8571 15H27.8571C29.0404 15 30 14.0404 30 12.8571V6.42857C30 5.2433 29.0424 4.28571 27.8571 4.28571ZM27.8571 12.8571H12.8571V6.42857H27.8571V12.8571Z"
                                      fill="#CC962E"/>
                            </svg>
                        </div>
                        <div class="access_info inline_block">
                            <p>اخبار ارزهای دیجیتال</p>
                            <span>یه تریدر اخبارشم باید بخونه!</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="selected_editor">
        <div class="container">
            <div class="selector_editor_title">
                <h5 class="nipo_main_title">منتخب سردبیر</h5>
            </div>
            <div class="row">
                <?php if ($posts_is_selector != null) : ?>
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                    <div class="selector_editor_right">
                        <div class="selector_image">
                            <a href="<?php echo get_permalink($posts_is_selector[0]->ID) ?>"><img src="<?php echo get_the_post_thumbnail_url($posts_is_selector[0]->ID) ?>" alt=""></a>
                        </div>
                        <div class="infoContent_footer">

                            <div class="selector_info">
                                <div class="infoTitle">
                                    <h6>
                                        <a href="<?php echo get_permalink($posts_is_selector[0]->ID) ?>"><?php echo $posts_is_selector[0]->post_title ?></a>
                                    </h6>
                                </div>
                                <div class="infoContent">
                                    <p><?php echo substr($posts_is_selector[0]->post_content, 0, 400) . " . . ." ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                    <div class="row">
                        <?php
                        unset($posts_is_selector[0]);
                        foreach ($posts_is_selector as $post) :
                            $category = get_the_category($post->ID);
                            $category_name = $category[0]->name;
                            ?>
                            <div class="col-md-6 col-lg-12">
                                <div class="selector_editor_left">
                                    <div class="editor_left_box">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="selector_left_image inline_block">
                                                    <a href="<?php echo get_permalink($post->ID) ?>"><img src='<?php echo get_the_post_thumbnail_url($post->ID) ?>'></a>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="selector_left_content inline_block">
                                                    <div class="leftContentTitle">
                                                        <div class="title_r inline_block">
                                                            <span><?php echo $category_name ?></span>
                                                        </div>
                                                        <div class="title_l inline_block float-end">
                                                            <span><?php echo handle_date(Carbon::create($post->post_date)->diffForHumans()); ?></span>
                                                        </div>
                                                    </div>
                                                    <div class="selector_left_info">
                                                        <p>
                                                            <a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a>
                                                        </p>
                                                    </div>
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
                </div>
            </div>
        </div>
    </div>
    <div class="current_price">
        <div class="container">
            <div class="current_price_header">
                <div class="header_title inline_block">
                    <h5 class="nipo_main_title">قیمت لحظه ای ارزهای دیجیتال</h5>
                </div>
                <div class="current_price_showAll inline_block float-end">
                    <a href="#">
                        <button type="button">+ مشاهده همه</button>
                    </a>
                </div>
            </div>
            <div class="current_price_content">
                <div class="row ">
                    <div class="col-2">
                        <div class="current_price_item">
                            <div class="item_header">
                                <div class="currency_icon">
                                    <?php nipoto_image('BTC.png', 'artacode'); ?>
                                </div>
                                <div class="currency_name">
                                    <span>بیت‌کوین (BTC)</span>
                                </div>
                                <div class="currency_average">
                                    <span>۲.۱۳٪</span>
                                </div>
                            </div>
                            <div class="item_content">
                                <div class="currency_price">
                                    <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                                </div>
                                <div class="currency_price_toman">
                                    <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                                </div>
                                <div class="currency_chart">
                                    <?php nipoto_image('chart.png', 'artacode') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="current_price_item">
                            <div class="item_header">
                                <div class="currency_icon">
                                    <?php nipoto_image('ETH.png', 'artacode'); ?>
                                </div>
                                <div class="currency_name">
                                    <span>اتریوم (ETH)</span>
                                </div>
                                <div class="currency_average">
                                    <span>۲.۱۳٪</span>
                                </div>
                            </div>
                            <div class="item_content">
                                <div class="currency_price">
                                    <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                                </div>
                                <div class="currency_price_toman">
                                    <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                                </div>
                                <div class="currency_chart">
                                    <?php nipoto_image('chart.png', 'artacode') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="current_price_item">
                            <div class="item_header">
                                <div class="currency_icon">
                                    <?php nipoto_image('ADA.png', 'artacode'); ?>
                                </div>
                                <div class="currency_name">
                                    <span>بیت‌کوین (BTC)</span>
                                </div>
                                <div class="currency_average">
                                    <span>۲.۱۳٪</span>
                                </div>
                            </div>
                            <div class="item_content">
                                <div class="currency_price">
                                    <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                                </div>
                                <div class="currency_price_toman">
                                    <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                                </div>
                                <div class="currency_chart">
                                    <?php nipoto_image('chart.png', 'artacode') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="current_price_item">
                            <div class="item_header">
                                <div class="currency_icon">
                                    <?php nipoto_image('litecoin.png', 'artacode'); ?>
                                </div>
                                <div class="currency_name">
                                    <span>لایت کوین (LTC)</span>
                                </div>
                                <div class="currency_average">
                                    <span>۲.۱۳٪</span>
                                </div>
                            </div>
                            <div class="item_content">
                                <div class="currency_price">
                                    <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                                </div>
                                <div class="currency_price_toman">
                                    <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                                </div>
                                <div class="currency_chart">
                                    <?php nipoto_image('chart.png', 'artacode') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="current_price_item">
                            <div class="item_header">
                                <div class="currency_icon">
                                    <?php nipoto_image('USDT.png', 'artacode'); ?>
                                </div>
                                <div class="currency_name">
                                    <span>تتر (USDT)</span>
                                </div>
                                <div class="currency_average">
                                    <span>۲.۱۳٪</span>
                                </div>
                            </div>
                            <div class="item_content">
                                <div class="currency_price">
                                    <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                                </div>
                                <div class="currency_price_toman">
                                    <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                                </div>
                                <div class="currency_chart">
                                    <?php nipoto_image('chart.png', 'artacode') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="current_price_item">
                            <div class="item_header">
                                <div class="currency_icon">
                                    <?php nipoto_image('BitcoinSV.png', 'artacode'); ?>
                                </div>
                                <div class="currency_name">
                                    <span>بیت کوین کش (BCH)</span>
                                </div>
                                <div class="currency_average">
                                    <span>۲.۱۳٪</span>
                                </div>
                            </div>
                            <div class="item_content">
                                <div class="currency_price">
                                    <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                                </div>
                                <div class="currency_price_toman">
                                    <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                                </div>
                                <div class="currency_chart">
                                    <?php nipoto_image('chart.png', 'artacode') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="current_price_content_responsive">
                <div class="current_price_item ">
                    <div class="item_header">
                        <div class="currency_icon">
                            <?php nipoto_image('BTC.png', 'artacode'); ?>
                        </div>
                        <div class="currency_name">
                            <span>بیت‌کوین (BTC)</span>
                        </div>
                        <div class="currency_average">
                            <span>۲.۱۳٪</span>
                        </div>
                    </div>
                    <div class="item_content">
                        <div class="currency_price">
                            <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                        </div>
                        <div class="currency_price_toman">
                            <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                        </div>
                        <div class="currency_chart">
                            <?php nipoto_image('chart.png', 'artacode') ?>
                        </div>
                    </div>
                </div>
                <div class="current_price_item ">
                    <div class="item_header">
                        <div class="currency_icon">
                            <?php nipoto_image('ETH.png', 'artacode'); ?>
                        </div>
                        <div class="currency_name">
                            <span>اتریوم (ETH)</span>
                        </div>
                        <div class="currency_average">
                            <span>۲.۱۳٪</span>
                        </div>
                    </div>
                    <div class="item_content">
                        <div class="currency_price">
                            <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                        </div>
                        <div class="currency_price_toman">
                            <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                        </div>
                        <div class="currency_chart">
                            <?php nipoto_image('chart.png', 'artacode') ?>
                        </div>
                    </div>
                </div>
                <div class="current_price_item ">
                    <div class="item_header">
                        <div class="currency_icon">
                            <?php nipoto_image('ADA.png', 'artacode'); ?>
                        </div>
                        <div class="currency_name">
                            <span>بیت‌کوین (BTC)</span>
                        </div>
                        <div class="currency_average">
                            <span>۲.۱۳٪</span>
                        </div>
                    </div>
                    <div class="item_content">
                        <div class="currency_price">
                            <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                        </div>
                        <div class="currency_price_toman">
                            <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                        </div>
                        <div class="currency_chart">
                            <?php nipoto_image('chart.png', 'artacode') ?>
                        </div>
                    </div>
                </div>
                <div class="current_price_item ">
                    <div class="item_header">
                        <div class="currency_icon">
                            <?php nipoto_image('litecoin.png', 'artacode'); ?>
                        </div>
                        <div class="currency_name">
                            <span>لایت کوین (LTC)</span>
                        </div>
                        <div class="currency_average">
                            <span>۲.۱۳٪</span>
                        </div>
                    </div>
                    <div class="item_content">
                        <div class="currency_price">
                            <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                        </div>
                        <div class="currency_price_toman">
                            <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                        </div>
                        <div class="currency_chart">
                            <?php nipoto_image('chart.png', 'artacode') ?>
                        </div>
                    </div>
                </div>
                <div class="current_price_item ">
                    <div class="item_header">
                        <div class="currency_icon">
                            <?php nipoto_image('USDT.png', 'artacode'); ?>
                        </div>
                        <div class="currency_name">
                            <span>تتر (USDT)</span>
                        </div>
                        <div class="currency_average">
                            <span>۲.۱۳٪</span>
                        </div>
                    </div>
                    <div class="item_content">
                        <div class="currency_price">
                            <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                        </div>
                        <div class="currency_price_toman">
                            <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                        </div>
                        <div class="currency_chart">
                            <?php nipoto_image('chart.png', 'artacode') ?>
                        </div>
                    </div>
                </div>
                <div class="current_price_item ">
                    <div class="item_header">
                        <div class="currency_icon">
                            <?php nipoto_image('BitcoinSV.png', 'artacode'); ?>
                        </div>
                        <div class="currency_name">
                            <span>بیت کوین کش (BCH)</span>
                        </div>
                        <div class="currency_average">
                            <span>۲.۱۳٪</span>
                        </div>
                    </div>
                    <div class="item_content">
                        <div class="currency_price">
                            <span>$۴۲,۳۵۶,۰۷۳.۳۸</span>
                        </div>
                        <div class="currency_price_toman">
                            <span>۱۲۳,۹۵۴,۵۸۰</span><span> تومان </span>
                        </div>
                        <div class="currency_chart">
                            <?php nipoto_image('chart.png', 'artacode') ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="video_tutorials">
        <div class="container">
            <div class="video_tutorials_title">
                <h5 class="nipo_main_title">تحلیل‌ها و آموزش های ویدیویی</h5>
            </div>
            <div class="row">
                <div class="col-12 col-sm-12 col-md-12 col-lg-7 col-xl-7">
                    <div class="video_tutorials_single">
                        <a href="<?php echo get_permalink($post_by_meta[0]->ID); ?>"><img src="<?php echo get_the_post_thumbnail_url($post_by_meta[0]->ID); ?>"
                             alt=""></a>
                    </div>
                </div>
                <div class="col-12 col-sm-12 col-md-12 col-lg-5 col-xl-5">
                    <div class="row">
                        <?php unset($post_by_meta[0]);
                        foreach ($post_by_meta as $post) : ?>
                            <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                <div class="video_tutorials_items">
                                    <div class="video_tutorials_box">
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="video_tutorials_image inline_block">
                                                    <a href="<?php echo get_permalink($post->ID); ?>"> <img src="<?php echo get_the_post_thumbnail_url($post->ID); ?>"
                                                         alt=""></a>
                                                </div>
                                            </div>
                                            <div class="col-9">
                                                <div class="video_tutorials_content inline_block">
                                                    <div class="video_tutorials_content_Title">
                                                        <span>تحلیل روزانه</span>
                                                    </div>
                                                    <div class="video_tutorials_content_info">
                                                        <h6>
                                                            <a href="<?php echo get_permalink($post->ID); ?>"><?php echo $post->post_title ?></a>
                                                        </h6>
                                                        <p>
                                                            <?php echo substr($post->post_content, 0, 100) . " . . ." ?>
                                                        </p>
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
            </div>
        </div>
    </div>
    <div class="latest_articles">
        <div class="container">
            <div class="latest_articles_content">
                <div class="row">
                    <div class="col-12 col-sm-12 col-md-12 col-lg-8 col-xl-8">
                        <div class="latest_articles_header">
                            <?php
                            $x = 0;
                            foreach ($categories as $category) {

                                if ($x == 0) {
                                    $class = "latest_articles_header_active";
                                } else {
                                    $class = "";
                                }
                                printf('<div class ="' . $class . '" term_id = "' . $category->term_id . '">' . esc_html($category->name) . '</div>',
                                );
                                $x++;
                            }
                            ?>
                        </div>
                        <div class="row">
                            <?php
                            $c = 0;
                            foreach ($categories as $category) :
                                $posts = get_post_by_category($category->term_id);
                                foreach ($posts["posts"] as $post) :
                                    ?>
                                    <div class="col-12 col-sm-12 col-md-6 col-lg-12">
                                        <div style="display: <?php if ($c == 0) echo 'block'; else echo 'none' ?>"
                                             class="article_single"
                                             cat-id="<?php echo $category->term_id ?>">

                                            <div class="article_single_content">
                                                <div class="row">
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-4">
                                                        <div class="article_single_img inline_block">
                                                            <a href="<?php echo get_permalink($post->ID) ?>"><img src="<?php echo get_the_post_thumbnail_url($post->ID) ?> "
                                                                 alt=""></a>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-sm-12 col-md-12 col-lg-8">
                                                        <div class="article_single_content_info inline_block">
                                                            <div class="article_single_content_title">
                                                                <h6>
                                                                    <a href="<?php echo get_permalink($post->ID) ?>"><?php echo $post->post_title ?></a>
                                                                </h6>
                                                            </div>
                                                            <div class="article_single_content_detail">
                                                                <p><?php echo $post->post_content ?></p>
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
                                                                    <a href="<?php echo get_permalink($post->ID) ?>>">
                                                                        مشاهده مطلب
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
                                <?php
                                endforeach;
                                $c++;
                            endforeach;
                            ?>
                            <div class="pagination">
                                <?php
                                $args = array(
                                    'before' => '<div class="page-links-XXX"><span class="page-link-text">' . __('More pages: ', 'textdomain') . '</span>',
                                    'after' => '</div>',
                                    'link_before' => '<span class="page-link">',
                                    'link_after' => '</span>',
                                    'next_or_number' => 'next',
                                    'separator' => ' | ',
                                    'nextpagelink' => __('Next &raquo', 'textdomain'),
                                    'previouspagelink' => __('&laquo Previous', 'textdomain'),
                                );

                                wp_link_pages($args);
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-4 col-xl-4">
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
                                                            <img src='<?php echo get_the_post_thumbnail_url($post->ID) ?>'>

                                                        </div>
                                                    </div>
                                                    <div class="col-9">
                                                        <div class="article_item_content_detail inline_block">
                                                            <div class="article_item_content_title">
                                                                <span>اخبار روزانه</span>
                                                            </div>
                                                            <div class="article_item_content_info">
                                                                <a href=""><p><?php echo substr($post->post_content, '0', '100') . '. . .' ?></p></a>
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
                                                        <p>ری دالیو، میلیاردر مطرح: دولت‌ها با بیت کوین کنار نخواهند
                                                            آمد</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <p>ری دالیو، میلیاردر مطرح: دولت‌ها با بیت کوین کنار نخواهند
                                                            آمد</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <p>ری دالیو، میلیاردر مطرح: دولت‌ها با بیت کوین کنار نخواهند
                                                            آمد</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                                                        <p>ری دالیو، میلیاردر مطرح: دولت‌ها با بیت کوین کنار نخواهند
                                                            آمد</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php get_footer();
