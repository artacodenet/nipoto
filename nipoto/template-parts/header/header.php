<div class="nipo_HashTags">
    <div class="container">
        <div class="HashtagsLabel">
            <label>برچسب های پر بازدید : </label>
        </div>
        <?php $tags = get_tags(array('get' => 'all'));

        foreach ($tags as $tag) :
            ?>
            <div class="Hashtag_bc">
                <span><a href="<?php echo get_term_link($tag) ?>"><?php echo "#" . $tag->name ?></a></span>
            </div>
        <?php
        endforeach;

        ?>

    </div>
</div>
<div class="nipo_HeaderNav">
    <div class="container">
        <div class="row">
            <div class="d-sm-block col-2 col-sm-2 col-md-2 d-lg-none">
                <button id="responsive_menu_btn">
                    <svg width="25" height="18" viewBox="0 0 25 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M25 0.818182C25 0.366136 24.6002 0 24.1071 0H0.892857C0.401786 0 -4.47035e-07 0.366136 -4.47035e-07 0.818182C-4.47035e-07 1.27023 0.401786 1.63636 0.892857 1.63636H24.1071C24.6002 1.63636 25 1.27023 25 0.818182ZM25 9C25 8.55 24.6002 8.18182 24.1071 8.18182H0.892857C0.401786 8.18182 -4.47035e-07 8.55 -4.47035e-07 9C-4.47035e-07 9.45 0.401786 9.81818 0.892857 9.81818H24.1071C24.6002 9.81818 25 9.45 25 9ZM0.892857 18H24.1071C24.6002 18 25 17.6318 25 17.1818C25 16.7318 24.6002 16.3636 24.1071 16.3636H0.892857C0.401786 16.3636 -4.47035e-07 16.7318 -4.47035e-07 17.1818C-4.47035e-07 17.6318 0.401786 18 0.892857 18Z"
                              fill="#838DA7"/>
                    </svg>
                </button>
            </div>
            <div class="col col-4 col-sm-4 col-md-4 col-lg-2 col-xl-2">
                <a href="<?php bloginfo('url');?>">
                    <div class="nipo_logo" style="background: url('<?php echo esc_url( get_header_image() ); ?>')"></div>
                </a>
            </div>
            <div class=" d-none d-xs-none d-sm-none d-md-none d-lg-block col-lg-6 col-xl-6">
                <div class="nipo_NavMenu inline_block">
                    <?php
                    wp_nav_menu(array(
                        'menu' => 'nipoto',
                        'menu_class' => 'menuItem',
                    ));
                    ?>
                </div>
            </div>
            <div class="col col-6 col-sm-6 col-md-6 col-lg-4 col-xl-4">
                <div class="left_menu">
                    <div class="nipo_search inline_block">
                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M20.8062 19.8803L15.0027 14.0766C16.2824 12.5836 17.0247 10.6518 17.0247 8.53125C17.0247 3.81855 13.2051 0 8.49391 0C3.78268 0 0 3.81979 0 8.53125C0 13.2427 3.81919 17.0625 8.49391 17.0625C10.6135 17.0625 12.5481 16.2848 14.0389 15.0056L19.8423 20.8093C20.0064 20.9344 20.1746 21 20.3427 21C20.5109 21 20.6785 20.9359 20.8066 20.8077C21.0645 20.5529 21.0645 20.1346 20.8062 19.8803ZM8.53082 15.75C4.51559 15.75 1.31244 12.5098 1.31244 8.53125C1.31244 4.55273 4.51559 1.3125 8.53082 1.3125C12.546 1.3125 15.7492 4.51582 15.7492 8.53125C15.7492 12.5467 12.5091 15.75 8.53082 15.75Z"
                                  fill="#838DA7"/>
                        </svg>
                    </div>
                    <div class="nipo_user_account inline_block">
                        <svg width="19" height="22" viewBox="0 0 19 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.5 11.0006C12.4984 11.0006 14.9286 8.53796 14.9286 5.50032C14.9286 2.46268 12.4984 0 9.5 0C6.50156 0 4.07143 2.46268 4.07143 5.50032C4.07143 8.53796 6.50156 11.0006 9.5 11.0006ZM9.5 1.37508C11.7452 1.37508 13.5714 3.22542 13.5714 5.50032C13.5714 7.77479 11.7452 9.62556 9.5 9.62556C7.25478 9.62556 5.42857 7.7735 5.42857 5.50032C5.42857 3.22542 7.25647 1.37508 9.5 1.37508ZM11.6502 13.0633H7.34978C3.2915 13.0633 0 16.3978 0 20.5102C0 21.3327 0.658214 22 1.46996 22H17.5309C18.3426 22.0013 19 21.3352 19 20.5102C19 16.3978 15.7089 13.0633 11.6502 13.0633ZM17.5283 20.6262H1.46996C1.40804 20.6262 1.35714 20.5746 1.35714 20.5102C1.35714 17.1627 4.04598 14.4383 7.34978 14.4383H11.646C14.954 14.4383 17.6429 17.1627 17.6429 20.5102C17.6429 20.5746 17.592 20.6262 17.5283 20.6262Z"
                                  fill="#838DA7"/>
                        </svg>
                    </div>
                    <div class="TradingMarket inline_block">
                        <button type="button" class="TradingMarket_button">بازار معاملاتی</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="responsive_menu">
    <button id="responsive_menu_close">
        <svg fill="#FFFFFF" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 50 50" width="20px" height="20px">
            <path d="M 7.71875 6.28125 L 6.28125 7.71875 L 23.5625 25 L 6.28125 42.28125 L 7.71875 43.71875 L 25 26.4375 L 42.28125 43.71875 L 43.71875 42.28125 L 26.4375 25 L 43.71875 7.71875 L 42.28125 6.28125 L 25 23.5625 Z"/>
        </svg>
    </button>
    <?php
    wp_nav_menu(array(
        'menu' => 'nipoto',
        'menu_class' => 'menuItem',

    ));
    ?>
</div>