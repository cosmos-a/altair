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
    <?php
        require_once 'library/HTMLPurifier.auto.php';

        $config = HTMLPurifier_Config::createDefault();
        $config->set('Attr.EnableID', false);
        $config->set('Attr.DefaultImageAlt', '');
        $config->set('AutoFormat.Linkify', true);
        $config->set('HTML.MaxImgLength', null);
        $config->set('CSS.MaxImgLength', null);
        $config->set('Core.Encoding', 'UTF-8');
        $config->set('HTML.FlashAllowFullScreen', true);
        $config->set('HTML.SafeEmbed', true);
        $config->set('HTML.SafeIframe', true);
        $config->set('HTML.SafeObject', true);
        $config->set('Output.FlashCompat', true);
        $config->set('URI.SafeIframeRegexp', '#^(?:https?:)?//(?:'.implode('|', array('www\\.youtube(?:-nocookie)?\\.com/', 'maps\\.google\\.com/', 'player\\.vimeo\\.com/video/', 'www\\.microsoft\\.com/showcase/video\\.aspx', '(?:serviceapi\\.nmv|player\\.music)\\.naver\\.com/', '(?:api\\.v|flvs|tvpot|videofarm)\\.daum\\.net/', 'v\\.nate\\.com/', 'play\\.mgoon\\.com/', 'channel\\.pandora\\.tv/', 'www\\.tagstory\\.com/', 'play\\.pullbbang\\.com/', 'tv\\.seoul\\.go\\.kr/', 'ucc\\.tlatlago\\.com/', 'vodmall\\.imbc\\.com/', 'www\\.musicshake\\.com/', 'www\\.afreeca\\.com/player/Player\\.swf', 'static\\.plaync\\.co\\.kr/', 'video\\.interest\\.me/', 'player\\.mnet\\.com/', 'sbsplayer\\.sbs\\.co\\.kr/', 'img\\.lifestyler\\.co\\.kr/', 'c\\.brightcove\\.com/', 'www\\.slideshare\\.net/')).')#');
        $purifier = new HTMLPurifier($config);

        $articleid = $_POST['articleid'];
        $date = date('Y.m.d H:i:s');
        $author = $_POST['author'];
        $ip = $_SERVER['REMOTE_ADDR'];
        $contents = $_POST['contents'];

        if (!empty($articleid) && !empty($author) && !empty($contents)) {
            $author = $purifier->purify(trim($author));
            $contents = $purifier->purify(str_replace("\n", '<br>', trim($contents)));
            if ($author !== '' && $contents !== '') {
                $article = json_decode(file_get_contents('articles/' . $articleid . '.json'), true);
                array_push($article['comments'], array(
                    'data' => $date,
                    'author' => $author,
                    'ip' => $ip,
                    'contents' => $contents
                ));
                fwrite(fopen('articles/' . $articleid . '.json', 'w'), json_encode($article));
            } else {
                echo '<script>alert("Error: 유효하지 않은 내용입니다.")</script>';
            }
            echo '<script>location.href="article.php?article=' . $articleid . '"</script>';
        }
    ?>
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
                    <?php
                        $articleid = $_GET['article'];
                        if (file_exists('articles/' . $articleid . '.json')) {
                            $article = json_decode(file_get_contents('articles/' . $articleid . '.json'), true);
                            echo '<h4>' . $article['title'] . '</h4>';
                            echo '<span class="mdl-color-text--grey-700">' . $article['date'] . '<br>';
                            echo $article['author'] . '(' . preg_replace('/\.\d{1,3}\.\d{1,3}$/', '.***.***', $article['ip']) . ')</span><hr>';
                            echo $article['contents'];
                        }
                    ?>
                    <br><br>
                    <a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--raised mdl-button--accent" href="board.php">목록으로</a>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 24px 24px">
                    <h4>Comments</h4>
                    <ul class="mdl-list">
                        <?php
                            if (file_exists('articles/' . $articleid . '.json')) {
                                $article = json_decode(file_get_contents('articles/' . $articleid . '.json'), true);
                                $comments = $article['comments'];
                                foreach ($comments as $key => $value) {
                                    echo '<li class="mdl-list__item mdl-list__item--two-line">';
                                    echo '<span class="mdl-list__item-primary-content">';
                                    echo '<span>' . $value['author'] . '(' . preg_replace('/\.\d{1,3}\.\d{1,3}$/', '.***.***', $value['ip']) . ')</span>';
                                    echo '<span class="mdl-list__item-sub-title">' . $value['contents'] . '</span>';
                                    
                                    echo '</span>';
                                    echo '</li>';
                                }
                                if (count($comments) === 0) {
                                    echo '<li class="mdl-list__item mdl-list__item--two-line">';
                                    echo '<span class="mdl-list__item-primary-content">';
                                    echo '<span>덧글이 존재하지 않습니다.</span>';
                                    echo '<span class="mdl-list__item-sub-title">덧글을 작성해보세요.</span>';
                                    
                                    echo '</span>';
                                    echo '</li>';
                                }
                            }
                        ?>
                    </ul>
                </div>
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 24px 24px">
                    <h4>Write</h4>
                    <form action="article.php" method="post">
                        <input name="articleid" value="<?php echo $articleid; ?>" style="display:none">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                            <input class="mdl-textfield__input" type="text" id="name" name="author">
                            <label class="mdl-textfield__label" for="name">Name</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label" style="width: 100%;">
                            <textarea class="mdl-textfield__input" type="text" rows= "3" id="contents" name="contents"></textarea>
                            <label class="mdl-textfield__label" for="contents">Contents</label>
                        </div>
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-button--colored" type="submit">
                            <i class="material-icons">edit</i>
                        </button>
                    </form>
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
</body>

</html>