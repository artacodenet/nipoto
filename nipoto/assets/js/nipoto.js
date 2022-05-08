jQuery(document).ready(function ($) {
    var post_id = ajax_object.post_id;
    $('#single_like_count').click(function () {

        $.ajax({
            type: 'post',
            url: ajax_object.ajax_url,
            data: {
                "action": 'single_like_count',
                'post_id': post_id,

            },
            beforeSend: function () {
                $("#single_like_count").prop('disabled', true);
            },
            success: function (data) {
                $('.like_count span').text(data);
            },
            complete: function () {
                $("#single_like_count").prop('disabled', false);
            }
        });
    });


    $('.current_price_content_responsive').slick({
        dots: false,
        prevArrow: false,
        nextArrow: false,
        initialSlide: 3,
        infinite: false,
        speed: 300,
        slidesToShow: 4,
        slidesToScroll: 4,
        pauseOnFocus: true,
        easing: 'linear',
        rtl: true,
        responsive: [

            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    infinite: true,
                    dots: false
                }
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    dots: false
                }
            },
            {
                breakpoint: 480,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                    dots: false

                }
            }
        ]
    });

    $('.instant_price_type').click(function () {
        $('.instant_price_type').css('border', 'none')
        $(this).css('border-bottom', '3px solid #FFC451');
    });

    $('.latest_articles_header > div').click(function () {
        var termid = $(this).attr('term_id');
        $('.article_single').hide();
        $('div[cat-id=' + termid + "]").show();
        $('.latest_articles_header > div').removeClass('latest_articles_header_active')
        $(this).addClass('latest_articles_header_active');
    });

    $('#latest_articles').click(function () {
        $(this).addClass('latest_articles_header_active');
        $('#video_articles').removeClass('latest_articles_header_active');
        $('.isArticle').show();
        $('.isvideo').hide();

    });
    $('#video_articles').click(function () {
        $(this).addClass('latest_articles_header_active');
        $('#latest_articles').removeClass('latest_articles_header_active');
        $('.isArticle').hide();
        $('.isvideo').show();
    });

    function to_persian(selector) {
        var change = new Number(selector).toLocaleString('fa-ir');
    }

    selector = $('.like_count span').text();
    num = to_persian(selector);
    $('.like_count span').text(num);

    $('#responsive_menu_btn').click(function () {
        $('.responsive_menu').css({'margin-right': '0', 'transition': 'margin 100ms'});
    });
    $('#responsive_menu_close').click(function (){
        $('.responsive_menu').css({'margin-right': '-60%', 'transition': 'margin 100ms'});
    })

});