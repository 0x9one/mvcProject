<?php
namespace PHPMVC\LIB;

class Autoload {
    public static function autoload($className) {

        // Remove main namespace
        $className = str_replace('PHPMVC' , '' , $className);
        $className = str_replace('\\' , '/', $className);
        // Lowercase  namespace

        $className = $className  . '.php';
        $className = strtolower($className);
        if (file_exists(APP_PATH . $className)) {
            require_once APP_PATH . $className;
        }
    }
}

spl_autoload_register(__NAMESPACE__. '\Autoload::autoload');