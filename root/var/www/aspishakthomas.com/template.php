<?php
function top() {
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
    <title>Amanda Spishak-Thomas</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="/style.css" rel="stylesheet">
  </head>
  <body>
    <h1>Amanda Spishak-Thomas</h1>
    <h2>health policy researcher. doctoral student. social worker.</h2>
    <div>
      <a href="/">Home</a>
      <a href="/bio/">Bio and CV</a>
      <a href="/research/">Research</a>
      <a href="/contact/">Contact</a>
    </div>
  <?php
}

function bottom() {
  ?>
  </body>
</html>
  <?php
}
?>
