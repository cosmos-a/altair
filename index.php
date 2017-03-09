<!DOCTYPE html>
<html lang="en" class="mdl-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Rank Management System">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#0d1b42">
    <meta name="msapplication-navbutton-color" content="#0d1b42">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="google" content="notranslate">
    <title>Altair</title>
    <link rel="icon" type="image/png" href="assets/img_altair.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-red.min.css">
    <style type="text/css">
        .mdl-layout__drawer-button {
            color: #eee;
        }
    </style>
</head>

<body>
    <div class="mdl-layout mdl-js-layout" style="background: url('assets/img_milkyway.jpg') center / cover;">
        <header class="mdl-layout__header mdl-layout__header--transparent">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Altair</span>
                <div class="mdl-layout-spacer"></div>
                <nav class="mdl-navigation">
                    <?php
                        $navs = json_decode(file_get_contents('navs.json'), true);
                        foreach ($navs as $key => $value) {
                            echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                        }
                    ?>
                </nav>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Altair</span>
            <nav class="mdl-navigation">
                <?php
                    foreach ($navs as $key => $value) {
                        echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                    }
                ?>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div id="top"></div>
            <div style="padding-top: 168px; padding-bottom: 168px;">
                <h1 class="mdl-color-text--white" style="text-align: center; text-shadow: 0 2px 2px #888">Altair</h1>
                <h4 class="mdl-color-text--white" style="text-align: center; text-shadow: 0 2px 2px #888">Anonymous Writing</h4>
                <div style="background: url('assets/ic_keyboard_arrow_down_white.png') center / cover; cursor: pointer; margin: 0 auto; margin-top: 54px; width: 54px; height: 54px;" onclick="scrollTo('#logo');">
                    <a href="#logo" style="text-decoration: none;">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
                </div>
            </div>
            <div class="mdl-grid">
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="logo" style="padding: 24px 24px 24px 24px">
                    <div style="background: url('assets/img_altair.png') center / cover; border-radius: 8px; margin: 0 auto; width: 256px; height: 256px;">
                    </div>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" style="padding: 0 24px 24px 24px">
                    <h4>Altair</h4>
                    알타이르(Altair)는 독수리자리에서 가장 밝은 별이다. 밝기 기준으로 주계열성에서 준거성의 경계에 속해 있다. 알타이르는 독수리자리 베타와 독수리자리 감마와 함께, '독수리자리의 손잡이'로 종종 불려왔다. 알타이르는 여름의 대삼각형에서 꼭짓점에 해당하는 별이다. 지구로부터 약 16.8광년 떨어져 있으며 맨눈으로 보이는 별들 중에서도 지구와 매우 가까운 곳에 있다. 겉보기 등급은 0.7등성으로 전체 별 중에서 열 두 번째로 밝은 별이다. 분광형은 A이며 질량은 태양의 1.7배, 밝기는 11배 정도이다.<br><br>
                    오늘날 중국, 일본, 한국 등 동양권 국가에는 이 별이 견우성(牽牛星)으로 알려져 있다. 하지만 이는 잘못된 것으로 실제 견우성은 우수에 자리잡고 있기는 하나 하고(河鼓)가 아니라 우(牛)에 속해 있으며, 따라서 다비흐가 원래의 견우성이다.<br><br>
                    출처: <a href="https://ko.wikipedia.org/wiki/%EC%95%8C%ED%83%80%EC%9D%B4%EB%A5%B4">위키백과</a>
                </div>
            </div>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Copyright 2017&nbsp;<a class="mdl-color-text--grey-100" href="https://github.com/Astro36">Astro</a>. All rights reserved.</div>
                </div>
                <div class="mdl-mini-footer__right-section">
                    <ul class="mdl-mini-footer__link-list">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#top">Back to Top</a></li>
                    </ul>
                </div>
            </footer>
        </main>
    </div>
    <script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
    <script defer src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script type="text/javascript">
        function scrollTo(id){
            $('html, body, div, main').stop().animate({scrollTop: $(id).offset().top}, 1000);
        }
    </script>
</body>

</html>