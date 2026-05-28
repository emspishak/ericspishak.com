<?php
// Displays the "error page" for the browser of the request for the first request,
// then a random error page for subsequent requests.

$error_pages = [
    "Chrome" => "chrome.html",
    "Firefox" => "firefox.html",
    "Internet Explorer" => "ie.html",
    "Safari" => "safari.html"
];
$last_cookie_name = "last";

function get_random_error_page() {
  global $error_pages;
  $index = rand(0, count($error_pages) - 1);
  return array_keys($error_pages)[$index];
}

if (isset($_COOKIE[$last_cookie_name])) {
  $error_page = get_random_error_page();

  $last_error = $_COOKIE[$last_cookie_name];
  if ($error_page === $last_error) {
    $index = ($index + 1) % count($error_pages);
    $error_page = array_keys($error_pages)[$index];
  }
} else {
  $browser = get_browser();
  $error_page = $browser->browser;
}
setcookie($last_cookie_name, $error_page, 0, "/e/", "ericspishak.com", true, true);

if (!isset($error_pages[$error_page])) {
  $error_page = get_random_error_page();
}

readfile($error_pages[$error_page]);
?>
