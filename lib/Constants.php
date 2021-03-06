<?php

    /**
     * Part of HaavokIPC, a library to execute PHP code between different
     * PHP versions, usually from PHP 4 (called frontend) to 5 (called backend).
     *
     * Basic constants to set what data will be exported
     *
     * @author Mendel Gusmao <mendelsongusmao () gmail.com>
     * @copyright Mendel Gusmao
     * @version 1.4
     *
     */

    define("HIPC_EXPORT_GLOBALS", 1);
    define("HIPC_EXPORT_REQUEST", 2);
    define("HIPC_EXPORT_POST", 4);
    define("HIPC_EXPORT_GET", 8);
    define("HIPC_EXPORT_SERVER", 16);
    define("HIPC_EXPORT_COOKIE", 32);
    define("HIPC_EXPORT_SESSION", 64);
    define("HIPC_EXPORT_CONSTANTS", 128);
    define("HIPC_EXPORT_HEADERS", 256);
    define("HIPC_EXPORT_ENV", 512);
    define("HIPC_EXPORT_FILES", 1024);
    define("HIPC_EXPORT_DEBUG", 2048);
    define("HIPC_EXPORT_OUTPUT", 4096);
    define("HIPC_EXPORT_FORCE_NO_OUTPUT", 8192);

    define("HIPC_EXPORT_WAY_BOTH", 1);
    define("HIPC_EXPORT_WAY_F2B", 2);
    define("HIPC_EXPORT_WAY_B2F", 3);

    define("void", "§\8§\1\1§\22\15\11§\0");
    
?>
