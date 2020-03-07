/* table of contents----------------------------------
1.アコーディオン（SP用）
2.スムーズスクロール
3.viewportの切り替え
4.ページトップボタン表示
5.テキストエリア自動改行
6.送信ボタンギミック
----------------------------------------------------*/
//1.アコーディオン（SP用）
$(function() {
    var windowWidth = $(window).width();
    var windowSm = 767;
    if (windowWidth <= windowSm) {
        //スマホ時に行う処理を書く
        $(function() {
            $('h2').click(function(e) {
                e.preventDefault();
                $(this).children('.fa-chevron-down').toggleClass('on');
                $(this).next().slideToggle();
            });
        })
    } else {
        //タブレット、PCに行う処理を書く
    }
});
//2.スムーズスクロール
$(function() {
    var windowWidth = $(window).width();
    var windowSm = 767;
    if (windowWidth <= windowSm) {
        //スマホ時に行う処理を書く
        $(function() {
            var headerHight = 68; //ヘッダの高さ
            $('.faqNav a').click(function() {
                var href = $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top - headerHight; //ヘッダの高さ分位置をずらす
                $("html, body").animate({ scrollTop: position }, 550, "swing");
                return false;
            });
        });
    } else {
        //タブレット、PCに行う処理を書く
        $(function() {
            var headerHight = 168; //ヘッダの高さ
            $('header > .forPC a,.faqNav a,#overview .nav a').click(function() {
                var href = $(this).attr("href");
                var target = $(href == "#" || href == "" ? 'html' : href);
                var position = target.offset().top - headerHight; //ヘッダの高さ分位置をずらす
                $("html, body").animate({ scrollTop: position }, 550, "swing");
                return false;
            });
        });
    }
});
//3.viewportの切り替え
$(function() {
    var _ua = (function(u) {
        return {
            Tablet: (u.indexOf("windows") != -1 && u.indexOf("touch") != -1 && u.indexOf("tablet pc") == -1) ||
                u.indexOf("ipad") != -1 ||
                (u.indexOf("android") != -1 && u.indexOf("mobile") == -1) ||
                (u.indexOf("firefox") != -1 && u.indexOf("tablet") != -1) ||
                u.indexOf("kindle") != -1 ||
                u.indexOf("silk") != -1 ||
                u.indexOf("playbook") != -1,
            Mobile: (u.indexOf("windows") != -1 && u.indexOf("phone") != -1) ||
                u.indexOf("iphone") != -1 ||
                u.indexOf("ipod") != -1 ||
                (u.indexOf("android") != -1 && u.indexOf("mobile") != -1) ||
                (u.indexOf("firefox") != -1 && u.indexOf("mobile") != -1) ||
                u.indexOf("blackberry") != -1
        }
    })(window.navigator.userAgent.toLowerCase());

    if (_ua.Tablet) {
        $('meta[name="viewport"]').attr('content', 'width=990, maximum-scale=1, user-scalable=0');
    }
});
//4.ページトップボタン表示
$(function() {
    var btn = $('#toTheTop');
    $(window).scroll(function() {
        if ($(this).scrollTop() > 100) {
            btn.fadeIn();
        } else {
            btn.fadeOut();
        }
    });
    btn.click(function(e) {
        e.preventDefault();
        $('body,html').animate({
            scrollTop: 0
        }, 500);
        return false;
    });
});
//5.テキストエリア自動改行
$(function() {
    $("#ta").height(30); //init
    $("#ta").css("lineHeight", "20px"); //init
    $("#ta").on("input", function(evt) {
        if (evt.target.scrollHeight > evt.target.offsetHeight) {
            $(evt.target).height(evt.target.scrollHeight);
        } else {
            var lineHeight = Number($(evt.target).css("lineHeight").split("px")[0]);
            while (true) {
                $(evt.target).height($(evt.target).height() - lineHeight);
                if (evt.target.scrollHeight > evt.target.offsetHeight) {
                    $(evt.target).height(evt.target.scrollHeight);
                    break;
                }
            }
        }
    });
});
$(function() {
    $("#ta2").height(30); //init
    $("#ta2").css("lineHeight", "20px"); //init
    $("#ta2").on("input", function(evt) {
        if (evt.target.scrollHeight > evt.target.offsetHeight) {
            $(evt.target).height(evt.target.scrollHeight);
        } else {
            var lineHeight = Number($(evt.target).css("lineHeight").split("px")[0]);
            while (true) {
                $(evt.target).height($(evt.target).height() - lineHeight);
                if (evt.target.scrollHeight > evt.target.offsetHeight) {
                    $(evt.target).height(evt.target.scrollHeight);
                    break;
                }
            }
        }
    });
});
//6.送信ボタンギミック
$(function() {
    $('input, textarea').on('keydown keyup keypress change', function() {
        if ($(this).val().length > 0) {
            $("#submit").prop("disabled", false);
            $('#submit').parent('li').removeClass('button--gray').addClass('button--orange');
        } else {
            $("#submit").prop("disabled", true);
            $('#submit').parent('li').removeClass('button--orange').addClass('button--gray');
        }
    });
});
//7.SP用スクロール時のヘッダーギミック
$(function() {
    var $win = $(window),
        $header = $('header'),
        headerHeight = $header.outerHeight(),
        startPos = 0;

    $win.on('load scroll', function() {
        var value = $(this).scrollTop();
        if (value > startPos && value > headerHeight) {
            $header.css('top', '-' + headerHeight + 'px');
        } else {
            $header.css('top', '0');
        }
        startPos = value;
    });
});