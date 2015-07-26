<?php
function top() {
  ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Mandi &amp; Eric</title>
    <link href="style.css" rel="stylesheet">
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
            <li><a href="/" class="active">Home</a></li>
            <li><a href="/wedding/">Wedding</a></li>
            <li><a href="/photos/">Photos</a></li>
            <li><a href="/registry/">Registry</a></li>
            <li><a href="/accomodations/">Accommodations</a></li>
            <li><a href="/travel/">Travel</a></li>
          </ul>
        </nav>
      </header>
      <main>
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
