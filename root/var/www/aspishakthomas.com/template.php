<?php
abstract class Page {
    const HOME = 0;
    const BIO = 1;
    const RESEARCH = 2;
    const CONTACT = 3;
    const TEACHING = 4;
    const ORGANIZING = 5;

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
            case Page::TEACHING:
                return "Teaching";
            case Page::ORGANIZING:
                return "Organizing";
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
            case Page::TEACHING:
                return "/teaching/";
            case Page::ORGANIZING:
                return "/organizing/";
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
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-C5D2MVMPBY"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'G-C5D2MVMPBY');
    </script>
    <title><?= $page == PAGE::HOME ? "" : Page::getTitle($page) . " - " ?>Amanda Spishak-Thomas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/style.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Karma:400,700&display=swap" rel="stylesheet">
  </head>
  <body>
    <div class="header">
      <div class="name">
        <h1>Amanda Spishak&#8209;Thomas</h1>
        <h2>medicaid researcher. phd. social worker.</h2>
      </div>
      <div class="nav">
        <?php
        page_link(Page::HOME, $page);
        page_link(Page::BIO, $page);
        page_link(Page::RESEARCH, $page);
        page_link(Page::TEACHING, $page);
        page_link(Page::ORGANIZING, $page);
        page_link(Page::CONTACT, $page);
        ?>
      </div>
    </div>
    <div class="content">
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
    </div>
  </body>
</html>
  <?php
}
?>
