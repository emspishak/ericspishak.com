<?php
abstract class Page {
  const HOME = "Home";
  const WEDDING = "Wedding";
  const PHOTOS = "Photos";
  const REGISTRY = "Registry";
  const ACCOMMODATIONS = "Accommodations";
  const TRAVEL = "Travel";
}

function top($page) {
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mandi &amp; Eric</title>
    <link href="/style.css" rel="stylesheet">
    <link href="//fonts.googleapis.com/css?family=Josefin+Sans|Poiret+One" rel="stylesheet">
    <meta name=viewport content="width=device-width, initial-scale=1">
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-65602681-1', 'auto');
      ga('send', 'pageview');
    </script>
  </head>
  <body>
    <div class="content">
      <header>
        <h1>Mandi &amp; Eric</h1>
        <nav>
          <ul>
            <?php
            page_link(Page::HOME, $page);
            page_link(Page::WEDDING, $page);
            page_link(Page::PHOTOS, $page);
            page_link(Page::REGISTRY, $page);
            page_link(Page::ACCOMMODATIONS, $page);
            page_link(Page::TRAVEL, $page);
            ?>
          </ul>
        </nav>
      </header>
      <main>
  <?php
}

function page_link($link, $current_page) {
  if ($link == Page::HOME) {
    $href = "/";
  } else {
    $href = "/" . strtolower($link) . "/";
  }
  ?>
  <li>
    <a href="<?= $href; ?>"
        <?php
        if ($link == $current_page) {
          echo "class=\"active\"";
        }
        ?>>
      <?= $link; ?>
    </a>
  </li>
  <?php
}

function footer() {
  ?>
      </main>
    </div>
  </body>
</html>
  <?php
}
?>
