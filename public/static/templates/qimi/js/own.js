define(function (require) {
    $(function () {
        var listpun = require('common').listpun
        var metHeight = require('common').metHeight

        void function ()//顶部导航
        {
            var li = $('.tem_head nav ul li')
            li.hover(function () {
                $(this).find('dl').stop(true).slideDown()
            }, function () {
                $(this).find('dl').stop(true).slideUp()
            })

            function layout() {
                var top = $('.tem_head nav')
                var min = top.position().left
                var max = min + top.width()
                li.each(function (index) {
                    var self = li.eq(index)
                    self
                        .find('dl').css({
                        'visibility': 'hidden',
                        'display': 'block',
                    }).end()
                        .find('dd').css({
                        'left': function () {
                            var _self = $(this)
                            var QwQ = (_self.width() - self.width()) / 2
                            var w = self.position().left - QwQ
                            var _w = _self.width()
                            if (w < min) w = min;
                            else if (_w + w > max) {
                                w = max - _w;
                            }
                            return w
                        }
                    }).end()
                        .find('dl').css({
                        'visibility': 'visible',
                        'height': function () {
                            return self.find('dd').outerHeight()
                        },
                        'display': 'none'
                    })
                });
            }

            $(window).on('resize', layout)
        }()

        void function ()//banner效果
        {
            if (!$('.tem_banner li').length) return;
            var _animations = ["cube", "cubeRandom", "block", "cubeStop", "cubeStopRandom", "cubeHide", "cubeSize", "horizontal", "showBars", "showBarsRandom", "tube", "fade", "fadeFour", "paralell", "blind", "blindHeight", "blindWidth", "directionTop", "directionBottom", "directionRight", "directionLeft", "cubeSpread", "glassCube", "glassBlock", "circles", "circlesInside", "circlesRotate", "cubeShow", "upBars", "downBars", "hideBars", "swapBars", "swapBarsBack", "swapBlocks", "cut"]
            var animations = []

            function pushRandomAnimation() {
                var random = Math.floor(Math.random() * _animations.length)
                random = _animations[random]
                animations.push(random)
            }

            var wait = $.each(_animations, pushRandomAnimation)
            require.async(['skitter', 'skitter.css', 'easing'], function () {
                $('.skitter-large').skitter({
                    navigation: true,
                    show_randomly: false,
                    stop_over: false,
                    progressbar: true,
                    interval: 4000,
                    with_animations: animations
                });
            })
        }()

        void function ()//首页的效果
        {
            if (MetpageType != 1) return;
            void function ()//about 图片切换
            {
                if (!$(".tem_index_about").length) return;
                var times2;
                $(".tem_index_about_img ol li").hover(function () {
                    var m = $(this);
                    times2 = setTimeout(function () {
                        $(".tem_index_about_img ul li").hide();
                        $(".tem_index_about_img ol li").removeClass("tem_now");
                        $(".tem_index_about_img ul li").eq(m.index()).show();
                        m.addClass("tem_now")
                    }, 300)
                }, function () {
                    clearTimeout(times2)
                })
            }()
            void function ()//case 产品案例切换
            {
                var qimi_case = $(".qimi_index_product_list")
                if (!qimi_case.length) return;
                require.async(['owl-carousel', 'owl-carousel.css'], function () {
                    $('.qimi_index_product_list').owlCarousel({
                        autoPlay: 3000,
                        items: 3,
                        navigation: true,
                        navigationText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
                        itemsDesktop: [1920, 3],
                        itemsDesktopSmall: [1024, 3]
                    })
                })
            }()
            void function ()//news 新闻切换
            {
                var news = $('.tem_index_news_slides')
                if (!news.length) return;
                require.async(['flexslider', 'flexslider.css'], function () {
                    news.flexslider({
                        animation: "slide",
                        selector: ".slides > ul",
                        directionNav: false,
                        controlNav: true,
                        manualControls: ".tem_index_news_tab li",
                        touch: true,
                        slideshow: false,
                        pauseOnHover: true
                    })
                })
            }()
            void function ()//case 案例切换
            {
                var tem_case = $(".tem_index_case")
                if (!tem_case.length) return;
                // var img = $('.tem_index_case_list .tem_list dt img')
                // $('.tem_index_case_list .tem_list dt a').css({
                // 	"width": img.attr('width'),
                // 	"height": img.attr('height')
                // });
                // $('.tem_index_case_list .tem_list dd h3').css({
                // 	"width": img.attr('width')
                // });
                require.async(['owl-carousel', 'owl-carousel.css'], function () {
                    $('.tem_index_case_list').owlCarousel({
                        autoPlay: 3000,
                        items: 2,
                        // itemsDesktop :[],
                        itemsDesktopSmall: [1200, 2]
                    })
                })
            }()
        }()

        require.async(['./index_animate'])

        void function ()//载入fancybox图片放大插件
        {
            var x = $('.fancybox')
                , y = $('.fancybox-thumb')
            $(document).on('click', 'a.fancybox,a.fancybox-thumb', function (e) {
                e.preventDefault()
            })
            if (!x.length && !y.length) return;
            require.async(['fancybox', 'fancybox.css'], function () {
                x.fancybox()
                if (!y.length) return;
                //相册元素存在则加载相册插件
                require.async(['fancybox-thumbs', 'fancybox-thumbs.css'], function () {
                    y.fancybox({
                        helpers: {
                            thumbs: {
                                width: 80,
                                height: 120
                            }
                        }
                    });
                })
            })
        }()
        void function () {
            $(".qimi_index_product_tab li").click(function () {
                var that = $(this);
                var datename = $(this).attr("data-name");
                $(".qimi_index_product_tab li").removeClass("flex-active");
                that.addClass("flex-active");
                $(".qimi_index_case_list").hide();
                $("#" + datename).fadeIn();
            })
        }()
        void function () {
            $(".list_1 li").hover(function () {
                $(this).find(".qimi_img_bg").fadeToggle("fast", "linear");
            })
        }()
        void function () {
            $(".job-detail-show").click(function () {
                $(this).closest(".list").find(".met_editor").slideToggle();
            })
        }()
    })
})


//回到顶部 <a href="#top">
define('main', function main(load, exports) {
    require = load;
    load = load.async;
    var $window = exports.$window = $(window)
    var $html = exports.$html = $('html')
    var $body = exports.$body = $('body')
    var $scrollBody = exports.$scrollBody = $().add($html).add($body)
    var $document = exports.$document = $(document)
    exports.getScrollTop = function getScrollTop() {
        return $html.scrollTop() || $body.scrollTop()
    }
})
define('hash_click', function hash_click(load, exports) {
    require = load;
    load = load.async;
    var $document = require('./main').$document
    var $scrollBody = require('./main').$scrollBody

    /**
     * @param {JQueryEventObject} e
     */
    function listener(e) {
        /**@type {HTMLAnchorElement} */
        var _this = this
        if (0
            || !_this.hash
            || _this.href.replace(_this.hash, '') !== location.href.replace(location.hash, '')
        ) {
            return
        }
        /**@type {number} */
        var position
        if (/\#top/.test(_this.hash)) {
            position = 0
        } else {
            var ele = $(_this.hash)
            if (ele.length) {
                position = ele.offset().top
            }
        }
        if (typeof position === 'number') {
            e.preventDefault()
            $scrollBody.stop(true).animate({scrollTop: position})
        }
    }

    $document.on('click.anchor', 'a', listener)
})
seajs.use('hash_click')