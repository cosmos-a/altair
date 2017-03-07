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
                <div class="mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop" id="content" style="padding: 0 24px 8px 24px">
                    <h4>게시판&nbsp;<button class="mdl-button mdl-js-button mdl-button--icon" onclick="location.href='write.php'">
                        <i class="material-icons">edit</i>
                    </button></h4>
                </div>
                <table class="mdl-shadow--2dp mdl-cell mdl-cell--8-col mdl-cell--2-offset-desktop mdl-data-table mdl-js-data-table">
                    <thead>
                        <tr>
                            <th class="mdl-data-table__cell--non-numeric">Title</th>
                            <th class="mdl-data-table__cell--non-numeric">Date</th>
                            <th class="mdl-data-table__cell--non-numeric">Author</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $articles = array_reverse(json_decode(file_get_contents('articles.json'), true));
                            foreach ($articles as $key => $value) {
                                $article = json_decode(file_get_contents('articles/' . $value . '.json'), true);
                                echo '<tr>';
                                echo '<td class="mdl-data-table__cell--non-numeric"><a href="article.php?article=' . $value . '">' . $article['title'] . '</a></td>';
                                echo '<td class="mdl-data-table__cell--non-numeric">' . $article['date'] . '</td>';
                                echo '<td class="mdl-data-table__cell--non-numeric">' . $article['author'] . '</td>';
                                echo '</tr>';
                            }
                        
                        ?>
                    </tbody>
                </table>
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