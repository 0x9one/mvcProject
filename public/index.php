<?php

namespace PHPMVC;
use PHPMVC\LIB\Authentication;
use PHPMVC\LIB\Home;
use PHPMVC\LIB\Messenger;
use PHPMVC\LIB\FrontController;
use PHPMVC\LIB\Registry;
use PHPMVC\LIB\Language;
use PHPMVC\LIB\SessionManager;
use PHPMVC\LIB\Template\Template;

session_start();

if (!defined('DS')) {
    define('DS', DIRECTORY_SEPARATOR);
}

require_once '..' . DS . 'app' . DS . 'config' . DS . 'config.php';
require_once APP_PATH . DS  . 'lib' . DS . 'autoload.php';

$session = new SessionManager();
$session->start();

if (!isset($session->lang)) {
    $session->lang = APP_DEFAULT_LANG;
}

$template_parts = require_once '..' . DS . 'app' . DS . 'config' . DS . 'templateconfig.php';
$template = new Template($template_parts);
$language = new Language();
$messenger = Messenger::getInstance($session);
$home = Home::getInstance($session);
$authentication = Authentication::getInstance($session);


$registry = Registry::getInstance();
$registry->session = $session;
$registry->language = $language;
$registry->messenger = $messenger;

$controller = new FrontController($template, $registry, $authentication, $home );
$controller->dispatch();
