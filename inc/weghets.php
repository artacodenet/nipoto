<?php

class WPDocs_New_Widget extends WP_Widget
{

    function __construct()
    {
        // Instantiate the parent object.
        parent::__construct(false, __('لیست قیمت های ارز', 'textdomain'));
    }


    function widget($args, $instance)
    {
        ?>
        <div class="bc-box-coin ltr">
            <div class="row">
                <div class="col-4">
                    <?php bc_image('prices-btc.svg', 'Bitcoin', 'icon-coin'); ?>
                </div>
                <div class="col-8 text-right">
                    <button class="bc-buy">Buy</button>
                    <button class="bc-trade">Trade</button>
                </div>
            </div>
            <div class="row bc-coin-title">
                <div class="col-12">
                    <p>Bitcoin <span>BTC</span></p>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="bc-coin-price">$46,965.25 <span>-4.36%</span></div>
                </div>
            </div>
        </div>

        <?php
    }

    function update($new_instance, $old_instance)
    {
        return $new_instance;
    }

    function form($instance)
    {
        $instance = "test widget";
        return $instance;
    }


}

class bc_switching extends WP_Widget
{

    function __construct()
    {

        // Add Widget scripts
        add_action('admin_enqueue_scripts', array($this, 'scripts'));

        parent::__construct('our_widget', // Base ID
            __('Our Widget Title', 'text_domain'), // Name
            array('description' => __('Our Widget with media files', 'text_domain'),) // Args
        );
    }

    public function scripts()
    {
        wp_enqueue_script('media-upload');
        wp_enqueue_media();
        wp_enqueue_script('our_admin', get_template_directory_uri() . '/assets/js/our_admin.js', array('jquery'));
    }

    public function widget($args, $instance)
    {
        // Our variables from the widget settings
        $title = apply_filters('widget_title', empty($instance['title']) ? __('Default title', 'text_domain') : $instance['title']);
        $image = !empty($instance['image']) ? $instance['image'] : '';

        ob_start();
        echo $args['before_widget'];
        if (!empty($instance['title'])) {
            echo $args['before_title'] . $title . $args['after_title'];
        }
        ?>

        <?php if ($image): ?>
        <img src="<?php echo esc_url($image); ?>" alt="">
    <?php endif; ?>

        <?php
        echo $args['after_widget'];
        ob_end_flush();
    }

    public function form($instance)
    {
        ?>
        <div class="elementor-control elementor-control-tabs elementor-control-type-repeater elementor-label-inline elementor-control-separator-default">
            <div class="elementor-control-content">
                <label>
                    <span class="elementor-control-title">آیتم های تغییر وضعیت</span>
                </label>
                <div class="elementor-repeater-fields-wrapper ui-sortable">
                    <div class="elementor-repeater-fields">
                        <div class="elementor-repeater-row-tools ui-sortable-handle">

                            <div class="elementor-repeater-row-item-title">تغییر وضعیت #1</div>


                            <div class="elementor-repeater-row-tool elementor-repeater-tool-remove">
                                <i class="eicon-close" aria-hidden="true"></i>
                                <span class="elementor-screen-only">حذف</span>
                            </div>
                        </div>
                        <div class="elementor-repeater-row-controls"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="elementor-button-wrapper">
            <button class="elementor-button elementor-button-default elementor-repeater-add" type="button">
                <i class="eicon-plus" aria-hidden="true"></i>افزودن آیتم
            </button>
        </div>

        </div>
        </div>
        <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['image'] = (!empty($new_instance['image'])) ? $new_instance['image'] : '';

        return $instance;
    }


}