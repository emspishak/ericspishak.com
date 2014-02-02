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

if (isset($_COOKIE[$last_cookie_name])) {
  $index = rand(0, count($error_pages) - 1);
  $error_page = array_keys($error_pages)[$index];
} else {
  $browser = get_browser();
  $error_page = $browser->browser;
}
setcookie($last_cookie_name, $error_page, 0, "/e/", "ericspishak.com", true, true);

readfile($error_pages[$error_page]);
?>
