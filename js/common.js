console.log(GetQueryString());
console.log(GetBrowserName());


/* ----------------------------------------------------------
** functions
** GetQueryString()
** GetPostValue(lavel)
** RemoveHtml(str)
---------------------------------------------------------- */

// urlパラメーターを連想配列に格納
function GetQueryString() {
    var result = {};
    if (1 < window.location.search.length) {
        // 最初の1文字 (?記号) を除いた文字列を取得する
        var query = window.location.search.substring(1);

        // クエリの区切り記号 (&) で文字列を配列に分割する
        var parameters = query.split('&');

        for (var i = 0; i < parameters.length; i++) {
            // パラメータ名とパラメータ値に分割する
            var element = parameters[i].split('=');

            var paramName = decodeURIComponent(element[0]);
            var paramValue = decodeURIComponent(element[1]);

            // パラメータ名をキーとして連想配列に追加する
            result[paramName] = paramValue;
        }
    }
    return result;
}



// $_POSTの中身を取得
// ※使用するとソースコードからPOSTの内容が見えてしまいます。
// フォーム送信等のPOSTデータには使用することは控えてください。
function GetPostValue(lavel) {
    // 許可するページを選択
    var permit_page = {
        index: true,
        date: true,
        archive: true,
        category: true,
        taxonomy: true,
        tag: true,
        single: true,
        admin: true,
        allPage: false //前項設定関係なく全てのページでの許可
    };

    // 許可するページ且つ、allPageで許可がある場合
    if (permit_page[myValues.page_type] && permit_page['allPage']) {
        // localize_script でコメントアウトしていたらnullを返す
        if (myValues.post_value) {
            // 引数が指定されている場合は指定のデータ名の値を返す
            if (lavel) {
                var postedData = myValues.post_value[lavel];
                return postedData;
            } else { // 引数が指定されていない場合$_POSTをそのまま返す
                var postedData = myValues.post_value;
                return postedData;
            }
        } else {
            return null;
        }
    } else {
        console.log("error: This page is not permitted.");
        return null;
    }
}



// HTMLタグをが含まれいてる文字列を渡すとHTMLタグを削除したものを返します。
function RemoveHtml(str) {
    return String(str).replace(/<("[^"]*"|'[^']*'|[^'">])*>/g, '');
}



// 使用中のブラウザを返します。
function GetBrowserName() {
    const ua = window.navigator.userAgent.toLowerCase();
    let name = "unknown";
    if (ua.indexOf("msie") !== -1) {
        const ver = window.navigator.appVersion.toLowerCase();
        if (ver.indexOf("msie 6.") !== -1) {
            name = 'ie6';
        } else if (ver.indexOf("msie 7.") !== -1) {
            name = 'ie7';
        } else if (ver.indexOf("msie 8.") !== -1) {
            name = 'ie8';
        } else if (ver.indexOf("msie 9.") !== -1) {
            name = 'ie9';
        } else if (ver.indexOf("msie 10.") !== -1) {
            name = 'ie10';
        } else {
            name = 'ie';
        }
    } else if (ua.indexOf('trident/7') !== -1) {
        name = 'ie11';
    } else if (ua.indexOf('edge') !== -1) {
        name = 'edge';
    } else if (ua.indexOf('chrome') !== -1 && ua.indexOf('edge') === -1) {
        name = 'chrome';
    } else if (ua.indexOf('safari') !== -1 && ua.indexOf('chrome') === -1) {
        name = 'safari';
    } else if (ua.indexOf('opera') !== -1) {
        name = 'opera';
    } else if (ua.indexOf('firefox') !== -1) {
        name = 'firefox';
    }
    return name;
}

//accordion
$(function() {
    $('.accordion .accordion__title').on('click', function() {
        /*クリックでコンテンツを開閉*/
        $(this).next().slideToggle(350);
        /*矢印の向きを変更*/
        $(this).toggleClass('open', 350);
    });
});

// ハンバーガーメニュー開始
// 追従ナビ・スマホでハンバーガーメニューになる
(function($) {
    $(function() {
        var $header = $('#head_wrap');
        $('#nav-toggle, #global-nav ul li a').click(function() {
            $header.toggleClass('open');
        });
    });
})(jQuery);

// ゆっくりスクロールする
$(function() {
    $('a[href^="#"]').click(function() {
        var adjust = 0;
        var speed = 1200;
        var href = $(this).attr("href");
        var target = $(href == "#" || href == "" ? 'html' : href);
        var position = target.offset().top + adjust;
        $('body,html').animate({ scrollTop: position }, speed, 'swing');
        return false;
    });
});
// ハンバーガーメニュ終了

// ページトップボタン開始
$(function() {
    var pagetop = $('#page-top');
    pagetop.click(function() {
        $('body, html').animate({
            scrollTop: 0
        }, 1);
        return false;
    });
});
// ページトップボタン終了

// ページ外リンクでヘッダーがかぶるのを防ぐ
$(window).on('load', function() {
    var headerHight = 136; //ヘッダの高さ
    if (document.URL.match("#")) {
        var str = location.href;
        var cut_str = "#";
        var index = str.indexOf(cut_str);
        var href = str.slice(index);
        var target = href;
        var position = $(target).offset().top - headerHight;
        $("html, body").scrollTop(position);
        return false;
    }
});
// ページ外リンクでヘッダーがかぶるのを防ぐ