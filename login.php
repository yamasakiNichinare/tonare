<?php
# h()関数☆レシピ221☆（安全にブラウザで値を表示したい）を読み込みます☆レシピ041☆（他のファイルを取り込んで利用したい）。
require_once 'h.php';
# password_verify()関数☆レシピ220☆（パスワードをハッシュ化したい）を読み込みます。
require_once 'password.php';

# クリックジャッキング対策☆レシピ290☆（クリックジャッキングとは？）をします。
header('X-FRAME-OPTIONS: SAMEORIGIN');

# セッションを開始します。
session_start();

# ユーザー名とパスワードを設定します。複数名分の設定ができます。
$userid[]   = '1391';   // ユーザーID
$username[] = '受講生';  // お名前
// パスワード「5611」をpassword_hash()関数でハッシュ化した文字列
$hash[] = '$2y$10$UtRbJTuKZGNmqomHYcBA3OFqTi88.fI9W0yxZdw5k9HHnve.m8fz.';

$userid[]   = 'test';
$username[] = 'テスト';
// パスワード「pass2」をpassword_hash()関数でハッシュ化した文字列
$hash[] = '$2y$10$qNxqM4UP79klxfqV9cIwcO6LBJI44Z34k76m9w9teN.PLpfTe8lxG';

# エラーメッセージの変数を初期化します。
$error = '';

# 認証済みかどうかのセッション変数を初期化します。
if (! isset($_SESSION['auth'])) {
    $_SESSION['auth'] = false;
}

if (isset($_POST['userid']) && isset($_POST['password'])) {
    foreach ($userid as $key => $value) {
        if ($_POST['userid'] === $userid[$key] &&
            # 入力されたパスワード文字列とハッシュ化済みパスワードを照合します。
            password_verify($_POST['password'], $hash[$key])) {
            # セッション固定化攻撃☆レシピ301☆（セッション固定化攻撃を防ぎたい）を防ぐため、セッションIDを変更します。
            session_regenerate_id(true);
            $_SESSION['auth'] = true;
            $_SESSION['username'] = $username[$key];
            break;
        }
    }
    if ($_SESSION['auth'] === false) {
        $error = 'ユーザーIDかパスワードに誤りがあります。';
    }
}

if ($_SESSION['auth'] !== true) {
?>
<!DOCTYPE html>
<html lang="ja">
    <head prefix="og: http://ogp.me/ns# fb: http://ogp.me/ns/fb# article: http://ogp.me/ns/article#">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="format-detection" content="telephone=no">
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
        <title>《受講生専用》東ナレからのお知らせ | 声優の養成所【東京ナレーション演技研究所】</title>
        <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
        <link rel="alternate" media="handheld" href="https://tonare.co.jp/">
        <link rel="alternate" media="only screen and (max-width: 767px)" href="https://tonare.co.jp/">
        <link rel="canonical" href="https://tonare.co.jp/">
        <link rel="shortcut icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="apple-touch-icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="stylesheet" href="assets/css/swiper.min.css">
        <link rel="stylesheet" href="assets/css/validationEngine.jquery.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="assets/js/jquery.validationEngine.js"></script>
        <script src="assets/js/languages/jquery.validationEngine-ja.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <script src="assets/js/jquery.autoKana.js"></script>
        <script src="assets/js/jquery.sticky-sidebar.js"></script>
        <script src="assets/js/script.js"></script>
        <script>
            $('#sidebar').stickySidebar({
                topSpacing: 170,
                bottomSpacing: 60
            });
        </script>
        <script>
            jQuery(document).ready(function(){
                jQuery("#theForm").validationEngine({
                    validateNonVisibleFields: true,
                    promptPosition: "topLeft",//エラー文の表示位置
                    showArrowOnRadioAndCheckbox: true,//エラー箇所の図示
                    focusFirstField: false,//エラー時に一番文頭の入力フィールドにフォーカスさせるかどうか
                });
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
    </head>
    <body id="page">

        <!--ヘッダー-->
        <header class="header">
            <div class="header__inner">
                <div class="header__left">
                    <a href="index.html">
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
                        <section class="page box__cream">
                            <h2 class="forPC">《受講生専用》東ナレからのお知らせ</h2>
                            <h2 class="forSP" style="font-size:2rem;line-height:1.4;">《受講生専用》<br>東ナレからのお知らせ</h2>
                            <div class="box box__white">


                                <?php
    if ($error) {  // エラー文がセットされていれば赤色で表示
        echo '<p style="color:red;">' . h($error) . '</p>';
    }
                                ?>


                                <form method="post" id="theForm" name="formName" action="student.php">
                                    <ul class="loginList">
                                        <li><span>ID</span><input type="text" name="userid" id="userid" class="validate[required]" value=""></li>
                                        <li><span>パスワード</span><input type="password" name="password" id="password" class="validate[required]"></li>
                                    </ul>
                                    <ul class="btns">
                                        <li class="button button--gray"><input type="submit" value="ログイン" id="submit"></li>
                                    </ul>
                                </form>
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
        </div>
        <!--//メインコンテンツ-->

        <!--ボタンエリア-->
        <div class="btnArea">
            <!--よくある質問-->
            <div class="faq forPC">
                <a href="faq.html"><i class="fas fa-question-circle"></i>よくある質問</a>
            </div>
            <!--//よくある質問-->
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


    </body>
</html>
<?php
    # スクリプトを終了し、認証が必要なページが表示されないようにします。
    exit();
}
/* ?>終了タグ省略 ☆レシピ001☆（サーバーのPHP情報を知りたい） */
