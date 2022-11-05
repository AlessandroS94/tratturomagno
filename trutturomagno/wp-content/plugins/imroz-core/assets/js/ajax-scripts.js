(function ($) {
    "use strict";

    var $document = $(document),
        $ajax_nonce = imroz_portfolio_ajax.ajax_nonce,
        $imroz_ajax_url = imroz_portfolio_ajax.ajax_url;


    // Ajax Call
    /**
     * setTime
     * @returns {number}
     */
    function setTime() {
        return 100;
    }

    /**
     * showTextLoading
     * @param selector
     */
    function showTextLoading(selector) {
        $('' + selector + '').addClass('text-loading');
        $('' + selector + '').addClass('disabled');
    }

    /**
     * hideTextLoading
     * @param selector
     */
    function hideTextLoading(selector) {
        $('' + selector + '').removeClass('text-loading');
        $('' + selector + '').removeClass('disabled');
    }

    /* Load All Portfolio */
    $document.on('click', '.load-more', function (e) {
        e.preventDefault();
        var _self = $(this);
        showTextLoading('.load-more');
        var $settings = _self.attr('data-settings');
        var $query = _self.attr('data-query');

        var settings = $.parseJSON($settings),
            query = $.parseJSON($query),
            paged = _self.attr('data-paged'),
            post_count = _self.attr('data-post-count'),
            $target = _self.data('target');

        $.ajax({
            url: $imroz_ajax_url,
            dataType: "json",
            method: 'post',
            cache: false,
            data: {
                'action': 'imroz_get_all_posts_content',
                'security': $ajax_nonce,
                'query': query,
                'settings': settings,
                'paged': paged,
                'post_count': post_count
            },
            success: function (resp) {
                var $html = resp;

                if (typeof($html.outputs) != "undefined" || ($html)) {
                    var postsCount = parseInt($html.posts_count),
                        total_posts = 0;
                    _self.attr('data-paged', parseInt(paged) + 1);
                    _self.attr('data-post-count', parseInt(postsCount));
                    _self.parent('.view-more-btn').parent('.col-lg-12').parent('.row').siblings('.portfolio-content-wrap-row').append($html.outputs);

                    setTimeout(function () {
                        total_posts = $('.portfolio-content-wrap-row').find('.portfolio-tilthover').length;
                        if ($html.outputs == "" || (total_posts === $html.posts_count)) {
                            _self.parent('.view-more-btn').parent('.col-lg-12').parent('.row').remove();
                        }
                    }, setTime());
                    hideTextLoading('.load-more');
                }
            },
            error: function (errorThrown) {
                console.log(errorThrown);
            }
        });

    });

}(jQuery));