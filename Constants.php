<?php

    define("PHPGI_EXPORT_GLOBALS", 1);
    define("PHPGI_EXPORT_REQUEST", 2);
    define("PHPGI_EXPORT_POST", 4);
    define("PHPGI_EXPORT_GET", 8);
    define("PHPGI_EXPORT_SERVER", 16);
    define("PHPGI_EXPORT_COOKIE", 32);
    define("PHPGI_EXPORT_SESSION", 64);
    define("PHPGI_EXPORT_CONSTANTS", 128);
    define("PHPGI_EXPORT_CALLS", 256);
    define("PHPGI_EXPORT_HEADERS", 512);
    define("PHPGI_EXPORT_OUTPUT", 1024);
    define("PHPGI_EXPORT_FORCE_NO_OUTPUT", 2048);

?>
