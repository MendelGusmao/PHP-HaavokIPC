<?php

    function phpgi_trigger_error ($class, $function, $message, $error_level = E_USER_ERROR) {

        $end = PHPGI_IS_BACKEND ? "Backend" : "Frontend";
        $version = PHP_VERSION;

        trigger_error("PHP-Ghetto-IPC ({$end} [{$version}])::{$class}::{$function}: {$message}", $error_level);

    }

?>