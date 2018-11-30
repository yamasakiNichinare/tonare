<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

//トークン判定
if ($_POST['token'] != sha1(session_id()) ){
    header("Location: https://tonare.co.jp");
    exit();
}

if(empty($_POST)) {
    header("Location: https://tonare.co.jp");
    exit();
}

$firstname = htmlspecialchars($_SESSION['firstname'], ENT_QUOTES);
$lastname = htmlspecialchars($_SESSION['lastname'], ENT_QUOTES);
$firstname_furigana = htmlspecialchars($_SESSION['firstname_furigana'], ENT_QUOTES);
$lastname_furigana = htmlspecialchars($_SESSION['lastname_furigana'], ENT_QUOTES);
$gender = htmlspecialchars($_SESSION['gender'], ENT_QUOTES);
$year = htmlspecialchars($_SESSION['year'], ENT_QUOTES);
$month = htmlspecialchars($_SESSION['month'], ENT_QUOTES);
$day = htmlspecialchars($_SESSION['day'], ENT_QUOTES);
$tel_m = htmlspecialchars($_SESSION['tel_m'], ENT_QUOTES);
$tel_h = htmlspecialchars($_SESSION['tel_h'], ENT_QUOTES);
$zip11 = htmlspecialchars($_SESSION['zip11'], ENT_QUOTES);
$addr11 = htmlspecialchars($_SESSION['addr11'], ENT_QUOTES);
$address = htmlspecialchars($_SESSION['address'], ENT_QUOTES);
$selectName1 = htmlspecialchars($_SESSION['selectName1'], ENT_QUOTES);
$selectName2 = htmlspecialchars($_SESSION['selectName2'], ENT_QUOTES);
$textarea = htmlspecialchars($_SESSION['textarea'], ENT_QUOTES);
$yesno = htmlspecialchars($_SESSION['yesno'], ENT_QUOTES);
$textarea2 = htmlspecialchars($_SESSION['textarea2'], ENT_QUOTES);
//請求者が請求を完了した日時を取得
$time = date('Y-m-d');

//文字コード変換
$formdata = array($time, $firstname, $lastname, $firstname_furigana, $lastname_furigana, $year, $month, $day, $gender, $selectName1, $selectName2, $zip11, $addr11, $address, $tel_m, $tel_h, $textarea, $yesno, $textarea2);
mb_convert_variables('SJIS-win', 'UTF-8', $formdata);

// メモリバッファを開く
$buf = fopen('information.csv', 'a+');

// データを出力
fputcsv($buf, $formdata);
fclose($buf);

$add_header ="From:seikyu@tonare.co.jp\n";
//$add_header .= "Reply-to: yamasaki@nichinare.co.jp\n";
$add_header .= "X-Mailer: PHP/". phpversion();

//管理者確認用メール本文
$message =<<<HTML
資料請求者の情報です。

【資料請求者情報】
名前：{$firstname}{$lastname}
フリガナ：{$firstname_furigana}{$lastname_furigana}
性別：{$gender}
生年月日：{$year}年{$month}月{$day}日
携帯電話：{$tel_m}
固定電話：{$tel_h}
住所：{$zip11}{$addr11}{$address}
学年・職業：{$selectName1}{$selectName2}
キッカケ：{$textarea}
演技レッスンの経験はありますか？：{$yesno}　　{$textarea2}

HTML;


//文字コード設定
mb_language("ja");
mb_internal_encoding("UTF-8");

//管理者受信用メール送信処理
mb_send_mail('seikyu@tonare.co.jp',"資料請求がありました",$message,$add_header);

session_destroy();

?>

<!DOCTYPE html>
<html lang="ja">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
        <meta charset="UTF-8">
        <meta name="format-detection" content="telephone=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="msapplication-TileImage" content="https://tonare.co.jp/assets/images/common/thumbnail.png" />
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <meta property="og:title" content="声優の養成所【東京ナレーション演技研究所】">
        <meta property="og:url" content="https://tonare.co.jp/">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="ja_JP" />
        <meta property="og:image" content="https://tonare.co.jp/assets/images/common/facebook.png">
        <meta property="og:site_name" content="声優の養成所【東京ナレーション演技研究所】">
        <meta name="twitter:card" content="summary">
        <meta name="twitter:site" content="https://twitter.com/tonare_pr?lang=ja">
        <meta name="twitter:image" content="https://tonare.co.jp/assets/images/common/twitter.png" />
        <meta name="twitter:title" content="声優の養成所【東京ナレーション演技研究所】">
        <meta name="twitter:description" content="声優の養成所なら東京ナレーション演技研究所。学校に通いながら、働きながらでも時間的・経済的に負担の少ないレッスンで声優をめざせます。初心者でも基礎から学べ、グループプロダクションに推薦する関連会社オーディションを年に一度実施しています。">
        <title>資料請求完了画面 | 声優の養成所【東京ナレーション演技研究所】</title>
        <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
        <link rel="alternate" media="handheld" href="https://tonare.co.jp/">
        <link rel="alternate" media="only screen and (max-width: 767px)" href="https://tonare.co.jp/">
        <link rel="canonical" href="https://tonare.co.jp/">
        <link rel="shortcut icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="apple-touch-icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="assets/js/jquery.sticky-sidebar.js"></script>
        <script src="assets/js/script.js"></script>
        <script>
            $('#sidebar').stickySidebar({
                topSpacing: 170,
                bottomSpacing: 60
            });
        </script>
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-115044264-1"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());

            gtag('config', 'UA-115044264-1');
            gtag('config', 'AW-812230876');
        </script>
        <!-- Event snippet for Google_PCとスマホ conversion page -->
        <script>
            gtag('event', 'conversion', {
                'send_to': 'AW-812230876/j0VWCO30sn8Q3NGmgwM',
                'value': 1.0,
                'currency': 'JPY'
            });
        </script>
    </head>
    <body id="page" class="confirm">
        <!-- Yahoo Code for your Conversion Page -->
        <script type="text/javascript">
            /* <![CDATA[ */
            var yahoo_conversion_id = 1001006636;
            var yahoo_conversion_label = "i262CJCA6YMBEMG9nf4C";
            var yahoo_conversion_value = 0;
            /* ]]> */
        </script>
        <script type="text/javascript" src="https://s.yimg.jp/images/listing/tool/cv/conversion.js">
        </script>
        <noscript>
            <div style="display:inline;">
                <img height="1" width="1" style="border-style:none;" alt="" src="https://b91.yahoo.co.jp/pagead/conversion/1001006636/?value=0&label=i262CJCA6YMBEMG9nf4C&guid=ON&script=0&disvt=true"/>
            </div>
        </noscript>

        <!--ヘッダー-->
        <header class="header">
            <div class="header__inner">
                <div class="header__left">
                    <a href="/">
                        <div class="header__left__inner">
                            <div class="img"><img src="assets/images/common/logo.png" alt="東京ナレーション演技研究所"></div>
                            <div class="text">
                                <p>日ナレ式声優育成システム採用</p>
                                <h1><img src="assets/images/common/logotext.png" alt="東京ナレーション演技研究所"></h1>
                            </div>
                        </div>
                    </a>
                </div><!--//.header__left-->
                <div class="header__right forPC">
                    <div>
                        <div class="info">
                            <p class="info_tel">&#8810;お問い合わせ&#8811;<br><i class="fas fa-mobile-alt"></i>03-3372-5611</p>
                            <p class="info_date">水〜日/12:00〜19:00</p>
                        </div>
                    </div>
                    <p class="button button--orange">
                        <a href="contact.php">
                            <i class="far fa-file-alt"></i>資料請求<br>(無料)
                        </a>
                    </p>
                </div>
                <!--//.header__right-->
            </div> <!--//.header__inner-->
            <nav class="forPC">
                <ul>
                    <li><a href="index.html#news">最新情報</a></li>
                    <li><a href="index.html#everyone">声優をめざされる皆様へ</a></li>
                    <li><a href="index.html#about">東ナレの特色</a></li>
                    <li><a href="index.html#overview">レッスン概要</a></li>
                    <li><a href="index.html#howto">入所方法／審査日程</a></li>
                    <li><a href="index.html#studio">レッスンスタジオ</a></li>
                    <li><a href="index.html#production">グループプロダクション</a></li>
                </ul>
            </nav>
        </header>
        <!--//ヘッダー-->
        <!--メインコンテンツ-->
        <div class="wrapper">
            <div class="wall">
                <div class="wall__inner">
                    <main>
                        <section class="page">
                            <h2>資料請求</h2>
                            <div class="box__white box__complete">
                                <p>資料請求ありがとうございました。<br>資料は10日程度でお届けする予定です。</p>
                                <p>なお、資料が届かない方、今後のご案内が不要の方は、大変お手数ですが弊所事務局までご連絡ください。</p>
                                <ul class="btns">
                                    <li class="button button--back"><a href="index.html">トップに戻る</a></li>
                                </ul>
                            </div>
                        </section>
                    </main>
                    <!--twitter pc-->
                    <div class="sidebar forPC" id="sidebar">
                        <div class="sidebar__inner">
                            <aside class="asideTwitter">
                                <a class="twitter-timeline" data-lang="ja" data-chrome="noheader,nofooter" data-height="400" data-theme="dark" href="https://twitter.com/tonare_pr?ref_src=twsrc%5Etfw">Tweets by tonare_pr</a> <script async src="https://platform.twitter.com/widgets.js" charset="utf-8"></script>
                            </aside>
                        </div>
                    </div>
                    <!--//twitter pc-->
                </div><!--//.wall__inner-->
            </div><!--//.wall-->
        </div><!--//.wrapper-->
        <!--//メインコンテンツ-->

        <!--ボタンエリア-->
        <div class="btnArea">
            <!--よくある質問-->
            <div class="faq forPC">
                <a href="faq.html"><i class="fas fa-question-circle"></i>よくある質問</a>
            </div>
            <!--//よくある質問-->
            <!--受講生専用サイト-->
            <div class="student">
                <a href="login.php"><i class="far fa-clipboard"></i>受講生専用サイト</a>
            </div>
            <!--//受講生専用サイト-->
        </div>
        <!--//ボタンエリア-->

        <!--フッター-->
        <footer class="footer">
            <div class="footer__inner">
                <!--snsシェアボタン-->
                <ul class="sns">
                    <li><a href="https://twitter.com/tonare_pr?"><i class="fab fa-twitter-square"></i></a></li>
                    <li><a href="https://www.facebook.com/sharer/sharer.php?u=http://qiita.com/katsuma"><i class="fab fa-facebook-square"></i></a></li>
                    <li><a href="http://line.me/R/msg/text/?http://qiita.com/katsuma"><i class="fab fa-line"></i></a></li>
                </ul>
                <!--snsシェアボタン-->
                <ul class="info">
                    <li class="withUnderLine"><a href="company.html">会社概要</a></li>
                    <li class="withUnderLine"><a href="policy.html">個人情報の取扱いについて</a></li>
                    <li class="withUnderLine"><a href="links.html">リンク</a></li>
                    <li class="withUnderLine"><a href="sitemap.html">サイトマップ</a></li>
                    <li class="withUnderLine"><a href="about.html">このサイトについて</a></li>
                </ul>
                <div class="info forSP">
                    <p class="info_title">&#8810;お問い合わせ&#8811;</p>
                    <p class="info_tel"><i class="fas fa-mobile-alt"></i>03-3372-5611</p>
                    <p class="info_date">営業時間：水〜日/12:00〜19:00</p>
                </div>
                <small>&copy; 2018 東京ナレーション演技研究所 All Rights Reserved.</small>
            </div>
            <!--//.footer__inner-->
        </footer>
        <!--//フッター-->

        <!--固定フッター（SP用）-->
        <nav class="fixednav forSP">
            <ul>
                <li>
                    <a href="faq.html"><i class="fas fa-question-circle"></i>よくある質問</a>
                </li>
                <li>
                    <a href="contact.php">
                        <i class="far fa-file-alt"></i>資料請求(無料)
                    </a>
                </li>
            </ul>
        </nav>
        <!--//固定フッター（SP用）-->

        <!-- Twitter single-event website tag code -->
        <script src="//platform.twitter.com/oct.js" type="text/javascript"></script>
        <script type="text/javascript">twttr.conversion.trackPid('o05f5', { tw_sale_amount: 0, tw_order_quantity: 0 });</script>
        <noscript>
        <img height="1" width="1" style="display:none;" alt="" src="https://analytics.twitter.com/i/adsct?txn_id=o05f5&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        <img height="1" width="1" style="display:none;" alt="" src="//t.co/i/adsct?txn_id=o05f5&p_id=Twitter&tw_sale_amount=0&tw_order_quantity=0" />
        </noscript>
        <!-- End Twitter single-event website tag code -->
    </body>
</html>
