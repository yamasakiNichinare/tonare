<?php
session_start();

header("Content-type: text/html; charset=utf-8");

//クリックジャッキング対策
header('X-FRAME-OPTIONS: SAMEORIGIN');

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
        <title>資料請求 | 声優の養成所【東京ナレーション演技研究所】</title>
        <link href="https://fonts.googleapis.com/earlyaccess/roundedmplus1c.css" rel="stylesheet" />
        <link rel="alternate" media="handheld" href="https://tonare.co.jp/">
        <link rel="alternate" media="only screen and (max-width: 767px)" href="https://tonare.co.jp/">
        <link rel="canonical" href="https://tonare.co.jp/">
        <link rel="shortcut icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="apple-touch-icon" href="https://tonare.co.jp/assets/images/common/thumbnail.png">
        <link rel="stylesheet" href="assets/css/swiper.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <link rel="stylesheet" href="assets/css/validationEngine.jquery.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="assets/js/jquery.validationEngine.js"></script>
        <script src="assets/js/languages/jquery.validationEngine-ja.js"></script>
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
            jQuery(document).ready(function(){
                jQuery("#theForm").validationEngine({
                    validateNonVisibleFields: true,
                    promptPosition: "topLeft",//エラー文の表示位置
                    showArrowOnRadioAndCheckbox: true,//エラー箇所の図示
                    focusFirstField: false,//エラー時に一番文頭の入力フィールドにフォーカスさせるかどうか
                });
            });
        </script>
        <script>
            function functionName()
            {
                var select1 = document.forms.formName.selectName1; //変数select1を宣言
                var select2 = document.forms.formName.selectName2; //変数select2を宣言

                select2.options.length = 0; // 選択肢の数がそれぞれに異なる場合、これが重要

                if (select1.options[select1.selectedIndex].value == "--")
                {
                    select2.options[0] = new Option("--");
                }

                if (select1.options[select1.selectedIndex].value == "高校生")
                {
                    select2.options[0] = new Option("1年生");
                    select2.options[1] = new Option("2年生");
                    select2.options[2] = new Option("3年生");
                }

                else if (select1.options[select1.selectedIndex].value == "大学生")
                {
                    select2.options[0] = new Option("1年生");
                    select2.options[1] = new Option("2年生");
                    select2.options[2] = new Option("3年生");
                    select2.options[3] = new Option("4年生");
                }

                else if (select1.options[select1.selectedIndex].value == "社会人")
                {
                    select2.options[0] = new Option("--");
                }

                else if (select1.options[select1.selectedIndex].value == "その他")
                {
                    select2.options[0] = new Option("--");
                }

                else if (select1.options[select1.selectedIndex].value == "中学生")
                {
                    select2.options[0] = new Option("1年生");
                    select2.options[1] = new Option("2年生");
                    select2.options[2] = new Option("3年生");
                }

                else if (select1.options[select1.selectedIndex].value == "専門学生")
                {
                    select2.options[0] = new Option("1年生");
                    select2.options[1] = new Option("2年生");
                }
            }
        </script>
        <script>
            $(function(){
                $(".henkan").blur(function(){
                    charChange($(this));
                });


                charChange = function(e){
                    var val = e.val();
                    var str = val.replace(/[Ａ-Ｚａ-ｚ０-９]/g,function(s){return String.fromCharCode(s.charCodeAt(0)-0xFEE0)});

                    if(val.match(/[Ａ-Ｚａ-ｚ０-９]/g)){
                        $(e).val(str);
                    }
                }
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
                                <form action="contact_confirm.php" method="post" id="theForm" name="formName">
                                    <p class="c_text"><i class="fas fa-pen-square"></i><span>資料請求にあたってご提供いただく皆様の個人情報につきましては、入所案内や入所関連情報の送付またはお電話でのご確認のみに使用し、ご本人様の承諾なしに第三者への提供は一切行いません。詳しくは「<span class="withUnderLine"><a href="policy.html">個人情報の取り扱いについて</a></span>」をご覧ください。</span></p>
                                    <p class="c_text"><i class="fas fa-pen-square"></i><span>弊所では、ご提供いただきました個人情報をもとにした「電話」「SNS」による個別の勧誘を一切いたしませんのでご安心ください。<br>※ご郵送先など不明な点がある場合のみ、ご連絡させていただくことがあります。</span></p>
                                    <p class="c_text"><i class="fas fa-pen-square"></i><span>資料の発送は日本国内のみとさせていただきます。</span></p>
                                    <ul class="formList">
                                        <li>
                                            <div>
                                                <p>お名前<span class="must">必須</span></p>
                                            </div>
                                            <div class="name">
                                                <ul>
                                                    <li>
                                                        <input type="text" name="firstname" id="firstname" placeholder="" class="validate[required] text-input">
                                                    </li>
                                                    <li>
                                                        <input type="text" name="lastname" id="lastname" placeholder="" class="validate[required] text-input" />
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>フリガナ<span class="must">必須</span></p>
                                            </div>
                                            <div class="name">
                                                <ul>
                                                    <li>
                                                        <input type="text" name="firstname_furigana" id="firstname-furigana" placeholder="" class="validate[required] text-input" />
                                                    </li>
                                                    <li>
                                                        <input type="text" name="lastname_furigana" id="lastname-furigana" placeholder="" class="validate[required] text-input" />
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>性別<span class="must">必須</span></p>
                                            </div>
                                            <div>
                                                <ul class="radioCheckList">
                                                    <li>
                                                        <input type="radio" name="gender" class="validate[required]]" id="man" value="男性">
                                                        <label for="man">男性</label>
                                                    </li>
                                                    <li>
                                                        <input type="radio" name="gender" class="validate[required]]" id="woman" value="女性">
                                                        <label for="woman">女性</label>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>生年月日<span class="must">必須</span></p>
                                            </div>
                                            <div class="birth">
                                                <ul>
                                                    <li>
                                                        <select name="year" class="validate[required]">
                                                            <option value="">--</option>
                                                            <?php foreach(range(2016,1940) as $year): ?>
                                                            <option value="<?=$year?>"><?=$year?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <p>年</p>
                                                    </li>
                                                    <li>
                                                        <select name="month" class="validate[required]">
                                                            <option value="">--</option>
                                                            <?php foreach(range(1,12) as $month): ?>
                                                            <option value="<?=str_pad($month,2,0,STR_PAD_LEFT)?>"><?=$month?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <p>月</p>
                                                    </li>
                                                    <li>
                                                        <select name="day" class="validate[required]">
                                                            <option value="">--</option>
                                                            <?php foreach(range(1,31) as $day): ?>
                                                            <option value="<?=str_pad($day,2,0,STR_PAD_LEFT)?>"><?=$day?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </li>
                                                    <li>
                                                        <p>日</p>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>電話番号<span class="must">必須</span><br><span class="small">(番号を入力してください)</span></p>
                                            </div>
                                            <div>
                                                <p>携帯電話</p>
                                                <input type="tel" placeholder="080********" name="tel_m" class="validate[groupRequired[payments],,maxSize[11],custom[integer]] text-input" oninput="check_numtype(this)" pattern="\d*" maxlength="11">
                                                <p class="fixedPhone">固定電話</p>
                                                <input type="tel" placeholder="03********" name="tel_h" class="validate[groupRequired[payments],maxSize[10],custom[integer]] text-input" oninput="check_numtype(this)" pattern="\d*" maxlength="10">
                                                <p class="small">※勧誘などのお電話はいたしません。お届け先に資料が届かない場合などにご連絡させていただきます。</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>郵便番号<span class="must">必須</span></p>
                                            </div>
                                            <div>
                                                <input type="tel" name="zip11" size="10" maxlength="7" onKeyUp="AjaxZip3.zip2addr(this,'','addr11','addr11');" placeholder="1234567" class="validate[required,custom[integer],maxSize[7]] text-input" oninput="check_numtype(this)">
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>住所<span class="must">必須</span><br><span class="small">(建物名・部屋番号までご記入ください)</span></p>
                                            </div>
                                            <div class="address">
                                                <input type="text" name="addr11" size="60" placeholder="東京都渋谷区代々木" class="validate[required] text-input henkan">
                                                <input type="text" name="address" placeholder="1-21-12ヤマノ26" class="validate[required] text-input banchi">
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>学年・職業<span class="must">必須</span></p>
                                            </div>
                                            <div class="jobLlist">
                                               <ul>
                                                   <li>
                                                       <select name = "selectName1" onChange="functionName()" class="validate[required]" data-promptPosition="inline">
                                                          <option value="--">--
                                                          <option value="中学生">中学生
                                                           <option value = "高校生">高校生
                                                           <option value = "大学生">大学生
                                                           <option value="専門学生">専門学生
                                                           <option value = "社会人">社会人
                                                           <option value="その他">その他
                                                       </select>
                                                   </li>
                                                   <li>
                                                       <select name = "selectName2" class="validate[required]">
                                                       </select>
                                                   </li>
                                               </ul>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>弊所を知ったキッカケ</p>
                                            </div>
                                            <div>
                                                <textarea name="textarea" id="ta"></textarea>
                                                <p class="small">例）雑誌〇〇を見て  スマホの広告を見て</p>
                                            </div>
                                        </li>
                                        <li>
                                            <div>
                                                <p>演技レッスンの経験はありますか？</p>
                                                <ul class="radioCheckList" style="font-weight: normal">
                                                    <li style="display: inline-block">
                                                        <input type="radio" name="yesno" id="no" value="ない">
                                                        <label for="no">ない</label>
                                                    </li>
                                                    <li style="display: inline-block">
                                                        <input type="radio" name="yesno" id="yes" value="ある">
                                                        <label for="yes">ある&nbsp;(下記ご記入ください)</label>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div>
                                                <textarea name="textarea2" id="ta2"></textarea>
                                            </div>
                                        </li>
                                    </ul>
                                    <ul class="btns">
                                        <li class="button button--gray">
                                            <input type="hidden" name="token" value="<?=sha1(session_id())?>">
                                            <input type="submit" value="確認する" name="confirm" id="submit">
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
