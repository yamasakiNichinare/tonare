<?php
// セッションの開始
session_start();

header("Content-type: text/html; charset=utf-8");

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

//トークン判定
if ($_POST['token'] != sha1(session_id()) ){
    echo "不正アクセスの可能性あり";
    exit();
}

$firstname = htmlspecialchars($_POST['firstname'], ENT_QUOTES);
$lastname = htmlspecialchars($_POST['lastname'], ENT_QUOTES);
$firstname_furigana = htmlspecialchars($_POST['firstname_furigana'], ENT_QUOTES);
$lastname_furigana = htmlspecialchars($_POST['lastname_furigana'], ENT_QUOTES);
$gender = htmlspecialchars($_POST['gender'], ENT_QUOTES);
$year = htmlspecialchars($_POST['year'], ENT_QUOTES);
$month = htmlspecialchars($_POST['month'], ENT_QUOTES);
$day = htmlspecialchars($_POST['day'], ENT_QUOTES);
$tel_m = htmlspecialchars($_POST['tel_m'], ENT_QUOTES);
$tel_h = htmlspecialchars($_POST['tel_h'], ENT_QUOTES);
$zip11 = htmlspecialchars($_POST['zip11'], ENT_QUOTES);
$addr11 = htmlspecialchars($_POST['addr11'], ENT_QUOTES);
$address = htmlspecialchars($_POST['address'], ENT_QUOTES);
$selectName1 = htmlspecialchars($_POST['selectName1'], ENT_QUOTES);
$selectName2 = htmlspecialchars($_POST['selectName2'], ENT_QUOTES);
$textarea = htmlspecialchars($_POST['textarea'], ENT_QUOTES);
$yesno = htmlspecialchars($_POST['yesno'], ENT_QUOTES);
$textarea2 = htmlspecialchars($_POST['textarea2'], ENT_QUOTES);

$_SESSION["firstname"] = $firstname;
$_SESSION["lastname"] = $lastname;
$_SESSION["firstname_furigana"] = $firstname_furigana;
$_SESSION["lastname_furigana"] = $lastname_furigana;
$_SESSION["gender"] = $gender;
$_SESSION["year"] = $year;
$_SESSION["month"] = $month;
$_SESSION["day"] = $day;
$_SESSION["tel_m"] = $tel_m;
$_SESSION["tel_h"] = $tel_h;
$_SESSION["zip11"] = $zip11;
$_SESSION["addr11"] = $addr11;
$_SESSION["address"] = $address;
$_SESSION["selectName1"] = $selectName1;
$_SESSION["selectName2"] = $selectName2;
$_SESSION["textarea"] = $textarea;
$_SESSION["yesno"] = $yesno;
$_SESSION["textarea2"] = $textarea2;

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
        <title>資料請求確認画面 | 声優の養成所【東京ナレーション演技研究所】</title>
        <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
        <link rel="alternate" media="handheld" href="https://tonare.co.jp/">
        <link rel="alternate" media="only screen and (max-width: 767px)" href="https://tonare.co.jp/">
        <link rel="canonical" href="https://tonare.co.jp/">
        <link rel="shortcut icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="apple-touch-icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="stylesheet" href="assets/css/swiper.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="assets/js/jquery.validate.min.js"></script>
        <script src="assets/js/localization/messages_ja.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.0.6/js/all.js"></script>
        <script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8"></script>
        <script src="assets/js/jquery.autoKana.js"></script>
        <script src="assets/js/jquery.sticky-sidebar.js"></script>
        <script src="assets/js/script.js"></script>
        <script type="text/javascript">
            $(document).ready(function() {
                $.fn.autoKana('#firstname', '#firstname-furigana', {
                    katakana : true  //true：カタカナ、false：ひらがな（デフォルト）
                });
                $.fn.autoKana('#lastname', '#lastname-furigana', {
                    katakana : true  //true：カタカナ、false：ひらがな（デフォルト）
                });
            });
        </script>
        <script>
            $('#sidebar').stickySidebar({
                topSpacing: 170,
                bottomSpacing: 60
            });
        </script>
        <script>
            $(document).ready(function() {
                $("#theForm").validate({
                    rules : {
                        firstname: {
                            required: true
                        },
                        lastname: {
                            required: true
                        },
                        firstname_furigana: {
                            required: true
                        },
                        lastname_furigana: {
                            required: true
                        },
                        tel: {
                            required: true
                        },
                        zip11:{
                            required: true
                        },
                        addr11:{
                            required: true
                        },
                        know: {
                            required: true
                        },
                        year: {
                            required: true
                        },
                        month: {
                            required: true
                        },
                        day: {
                            required: true
                        }
                    },
                    messages: {
                        firstname:{
                            required: "苗字を入力してください"
                        },
                        lastname: {
                            required: "名前を入力してください"
                        },
                        firstname_furigana:{
                            required: "ミョウジを入力してください"
                        },
                        lastname_furigana: {
                            required: "ナマエを入力してください"
                        },
                        tel: {
                            required: "電話番号を入力してください"
                        },
                        zip11: {
                            required: "郵便番号を入力してください"
                        },
                        addr11: {
                            required: "住所を入力してください"
                        },
                        know: {
                            required: "キッカケを選択してください"
                        },
                        year: {
                            required: "年を選択してください"
                        },
                        month: {
                            required: "月を選択してください"
                        },
                        day: {
                            required: "日を選択してください"
                        }
                    }
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
    <body id="page" class="confirm">

        <?php



        ?>

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
                            <div class="box__white">
                                <form action="contact_complete.php" method="post" id="theForm">
                                    <ul class="formList">
                                        <li>
                                            <div>
                                                <p>お名前<span class="must">必須</span></p>
                                            </div>
                                            <div>
                                                <p><span class="s_first"><?php echo $firstname ?></span><span><?php echo $lastname ?></span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>フリガナ<span class="must">必須</span></p>
                                            </div>
                                            <div>
                                                <p><span class="s_first"><?php echo $firstname_furigana ?></span><span><?php echo $lastname_furigana ?></span></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>性別<span class="must">必須</span></p>
                                            </div>
                                            <div>
                                                <p><?php echo $gender ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>生年月日<span class="must">必須</span></p>
                                            </div>
                                            <div>
                                                <p>
                                                    <span><?php echo $year ?></span>
                                                    <span>年</span>
                                                    <span><?php echo $month ?></span>
                                                    <span>月</span>
                                                    <span><?php echo $day ?></span>
                                                    <span>日</span>
                                                </p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>電話番号<span class="must">必須</span><br><span class="small">(固定、もしくは携帯の番号を入力してください)</span></p>
                                            </div>
                                            <div>
                                                <p>携帯電話</p>
                                                <p><?php echo $tel_m ?></p>
                                                <p class="fixedPhone">固定電話</p>
                                                <p><?php echo $tel_h ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>郵便番号<span class="must">必須</span></p>
                                            </div>
                                            <div>
                                                <p><?php echo $zip11 ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>住所<span class="must">必須</span><br><span class="small">(建物名・部屋番号までご記入ください)</span></p>
                                            </div>
                                            <div>
                                                <p><?php echo $addr11 ?><?php echo $address ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>学年・職業<span class="must">必須</span></p>
                                            </div>
                                            <div class="jobLlist">
                                                <p><?php echo $selectName1 ?><?php echo $selectName2 ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>当所を知ったキッカケ</p>
                                            </div>
                                            <div>
                                                <p><?php echo $textarea ?></p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>演技レッスンの経験はありますか？</p>
                                            </div>
                                            <div>
                                                <p><?php echo $yesno ?></p>
                                                <p><?php echo $textarea2 ?></p>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="btns">
                                        <li class="backBtnWrap">
                                            <a href="javascript:history.back();" class="backBtn"><input type="button" value="戻る"></a>
                                        </li>
                                        <li class="button button--orange">
                                            <input type="hidden" name="token" value="<?=$_POST['token']?>">
                                            <input type="submit" value="送信する">
                                        </li>
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


    </body>
</html>
