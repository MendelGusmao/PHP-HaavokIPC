<?php

    require '../../Bridge.class.php';
    require dirname(__FILE__) . '/../../phpgr.conf.php';
    
    $bridge = new Bridge(new FilePersistence);
    $bridge->import();
    $bridge->execute_backend();

    function compare_php_version ($version) { return __FUNCTION__ . "() = From $version to " . PHP_VERSION; }
    function describe_array($array) { foreach ($array as $key => $value) $describe[] = "$key=$value"; return implode(",", $describe); }

    class Backend {
        function __construct () {
                echo __CLASS__, " constructed\n";
        }
        function backend_md5 ($input) {
            return __CLASS__ . "->" . __FUNCTION__ . "($input) = " . md5($input);
        }
    }

    class Backend2 {
        private $str;
        function __construct($params) {
            $args = describe_array($params);
            echo __CLASS__, " constructed with parameters {$args}\n";
            $this->str = $params["str"];
        }
        function backend_sha1() { return __CLASS__ . "->" . __FUNCTION__ . "({$this->str}) = " . sha1($this->str); }
        function backend_raw() { return __CLASS__ . "(reused)->" . __FUNCTION__ . "({$this->str}) = " . $this->str; }
    }

    class Backend3 {
        function __construct () { echo __CLASS__, " constructed\n"; }
        static function backend_version() { return __CLASS__ . "::" . __FUNCTION__ . "() = " . "Backend is " . PHP_VERSION; }
    }