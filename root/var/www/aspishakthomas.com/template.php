<?php
abstract class Page {
    const HOME = 0;
    const BIO = 1;
    const RESEARCH = 2;
    const CONTACT = 3;

    public static function getTitle($page) {
        switch ($page) {
        case Page::HOME:
            return "Home";
        case Page::BIO:
            return "Bio and CV";
        case Page::RESEARCH:
            return "Research";
        case Page::CONTACT:
            return "Contact";
        default:
            throw new Exception("bad Page: " . $page);
        }
    }

    public static function getUrl($page) {
        switch ($page) {
        case Page::HOME:
            return "/";
        case Page::BIO:
            return "/bio/";
        case Page::RESEARCH:
            return "/research/";
        case Page::CONTACT:
            return "/contact/";
        default:
            throw new Exception("bad Page: " . $page);
        }
    }
}

function top($page) {
  ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-148066551-1"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-148066551-1');
    </script>
    <title><?= $page == PAGE::HOME ? "" : Page::getTitle($page) . " - " ?>Amanda Spishak-Thomas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karma:400,700&display=swap" rel="stylesheet">
  </head>
  <body>
    <h1>Amanda Spishak-Thomas</h1>
    <div class="nav">
      <?php
      page_link(Page::HOME, $page);
      page_link(Page::BIO, $page);
      page_link(Page::RESEARCH, $page);
      page_link(Page::CONTACT, $page);
      ?>
    </div>
    <h2>health policy researcher. doctoral student. social worker.</h2>
  <?php
}

function page_link($link, $current_page) {
    $classes = array("nav-item");
    if ($link == $current_page) {
        $classes[] = "active";
    }
  ?>
  <a href="<?= Page::getUrl($link); ?>"
     class="<?= implode(" ", $classes) ?>"
    ><?= Page::getTitle($link); ?></a>
  <?php
}

function bottom() {
  ?>
  </body>
</html>
  <?php
}
?>
