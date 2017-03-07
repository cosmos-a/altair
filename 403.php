<!DOCTYPE html>
<html lang="en" class="mdl-js">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <meta name="theme-color" content="#673ab7">
    <meta name="msapplication-navbutton-color" content="#673ab7">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="google" content="notranslate">
    <title>Altair</title>
    <link rel="icon" type="image/png" href="assets/img_altair.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.deep_purple-red.min.css">
</head>

<body>
    <div class="mdl-color--grey-100 mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <header class="mdl-layout__header">
            <div class="mdl-layout__header-row">
                <span class="mdl-layout-title">Altair</span>
            </div>
        </header>
        <div class="mdl-layout__drawer">
            <span class="mdl-layout-title">Altair</span>
            <nav class="mdl-navigation">
                <?php
                    $navs = json_decode(file_get_contents('navs.json'), true);
                    foreach ($navs as $key => $value) {
                        echo '<a class="mdl-navigation__link" href="' . $value . '">' . $key . '</a>';
                    }
                ?>
            </nav>
        </div>
        <main class="mdl-layout__content">
            <div id="top"></div>
            <div class="mdl-grid">
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 24px 24px">
                    <h4>Error <span class=mdl-color-text--primary>403</span> Forbidden.</h4>
                    <span class=mdl-color-text--primary>엑세스가 금지되었습니다.</span><br><br>
                    요청하신 페이지는 엑세스가 금지되었습니다. 요청하신 디렉토리 내에 인덱스 페이지가 없으신 경우 업로드 하신 후 접속해 보시기 바랍니다.
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 0 24px">
                    <ul class="mdl-list">
                        <?php
                            foreach ($navs as $key => $value) {
                                echo '<li class="mdl-list__item">';
                                echo '<a class="mdl-color-text--grey-700 mdl-button mdl-js-button mdl-js-ripple-effect" href="' . $value . '" style="margin: 0 auto;">' . $key . '</a>';
                                echo '</li>';
                            }
                        ?>
                    </ul>
                </div>
            </div>
            <footer class="mdl-mini-footer">
                <div class="mdl-mini-footer__left-section">
                    <div class="mdl-logo">Copyright 2016-2017&nbsp;<a class="mdl-color-text--grey-100" href="https://github.com/Astro36">Astro</a>. All rights reserved.</div>
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
</body>

</html>