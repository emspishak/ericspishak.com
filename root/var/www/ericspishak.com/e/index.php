<?php
// Displays the "error page" for the browser of the request.

$error_pages = [
    "Chrome" => "chrome.html",
    "Firefox" => "firefox.html",
    "Internet Explorer" => "ie.html",
    "Safari" => "safari.html"
];

$browser = get_browser();
$browser_name = $browser->browser;
readfile($error_pages[$browser_name]);
?>
