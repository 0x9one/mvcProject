<?php


namespace PHPMVC\LIB\Template;

class Template
{
    use TemplateHelper;
    private $_templateParts;
    private $_action_view;
    private $_data;
    private $_registry;

    public function __get($key)
    {
        return $this->_registry->$key;
    }

    public function __construct(array $parts)
    {
        $this->_templateParts = $parts;
    }

    public function setActionViewFile($actionViewPath) {
        $this->_action_view= $actionViewPath;
    }

    public function setAppData($data) {
        $this->_data = $data;
    }

    // TODO: implement a better solution
    public function swapTemplate($template)
    {
        $this->_templateParts['template'] = $template;
    }


    public function setRegistry($registry)
    {
        $this->_registry = $registry;
    }

    private function renderTemplateHeaderStart() {
        require_once TEMPLATE_PATH . 'templateheaderstart.php';
    }

    private function renderTemplateHeaderEnd() {
        require_once TEMPLATE_PATH . 'templateheaderend.php';
    }

    private function renderTemplateFooter() {
        require_once TEMPLATE_PATH . 'templatefooter.php';
    }

    private function assetsTemplateHeaderStart() {
        require_once ASSETS_PATH . 'templateheaderstart.php';
    }

    private function assetsTemplateHeaderEnd() {
        require_once ASSETS_PATH . 'templateheaderend.php';
    }

    private function assetsTemplateFooter() {
        require_once ASSETS_PATH . 'templatefooter.php';
    }

    private function errorTemplateHeaderStart() {
        require_once ERRORS_PATH . 'templateheaderstart.php';
    }

    private function errorTemplateHeaderEnd() {
        require_once ERRORS_PATH . 'templateheaderend.php';
    }

    private function errorTemplateFooter() {
        require_once ERRORS_PATH . 'templatefooter.php';
    }

    private function assetsTemplateBlocks() {
        if (!array_key_exists('assets', $this->_templateParts)) {
            trigger_error('يجب عليك التحقق من الطلب', E_USER_WARNING);
        } else {
            $parts = $this->_templateParts['assets'];
            if (!empty($parts)) {
                extract($this->_data);
                foreach ($parts as $partKey => $file) {
                    if ($partKey == ':view') {
                        require_once $this->_action_view;
                    } else {
                        require_once $file;
                    }
                }
            }
        }
    }

    private function renderTemplateBlocks() {
        if (!array_key_exists('template', $this->_templateParts)) {
            trigger_error('يجب عليك التحقق من الطلب', E_USER_WARNING);
        } else {
            $parts = $this->_templateParts['template'];
            if (!empty($parts)) {
                extract($this->_data);
                foreach ($parts as $partKey => $file) {
                    if ($partKey == ':view') {
                        require_once $this->_action_view;
                    } else {
                        require_once $file;
                    }
                }
            }
        }
    }

    private function errorTemplateBlocks() {
        if (!array_key_exists('error', $this->_templateParts)) {
            trigger_error('يجب عليك التحقق من الطلب', E_USER_WARNING);
        } else {
            $parts = $this->_templateParts['error'];
            if (!empty($parts)) {
                extract($this->_data);
                foreach ($parts as $partKey => $file) {
                    if ($partKey == ':view') {
                        require_once $this->_action_view;
                    } else {
                        require_once $file;
                    }
                }
            }
        }
    }

    private function renderHeaderResources() {
        $output = '';
        if (!array_key_exists('header_resources', $this->_templateParts)) {
            trigger_error('Header Resources Error', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['header_resources'];

            // Generate Css links
            $css = $resources['css'];
            if (!empty($css)) {
                foreach ($css as $cssKey => $path) {
                    $output .= '<link rel="stylesheet" href="'.$path.'" />';
                }
            }
            // Generate Js Script
            $js = $resources['js'];
            if (!empty($js)) {
                foreach ($js as $jsKey => $path) {
                    $output .= '<script src="'. $path .'"></script>';
                }
            }
        }
        echo $output;
    }

    private function renderErrorResources() {
        $output = '';
        if (!array_key_exists('error_resources', $this->_templateParts)) {
            trigger_error('Header Resources Error', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['error_resources'];

            // Generate Css links
            $css = $resources['css'];
            if (!empty($css)) {
                foreach ($css as $cssKey => $path) {
                    $output .= '<link rel="stylesheet" href="'.$path.'" />';
                }
            }
        }
        echo $output;
    }

    private function renderAsstesResources() {
        $output = '';
        if (!array_key_exists('assets_resources', $this->_templateParts)) {
            trigger_error('Asstes Resources Error', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['assets_resources'];

            // Generate Css links
            $css = $resources['css'];
            if (!empty($css)) {
                foreach ($css as $cssKey => $path) {
                    $output .= '<link rel="stylesheet" href="'.$path.'" />';
                }
            }
        }
        echo $output;
    }

    private function renderFooterResources() {
        $output = '';
        if (!array_key_exists('footer_resources', $this->_templateParts)) {
            trigger_error('Footer Resources Error', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['footer_resources'];
            if (!empty($resources)) {
                foreach ($resources as $resourceKey => $path) {
                    $output .= '<script src="'. $path .'"></script>';
                }
            }
        }
        echo $output;
    }

    private function assetsFooterResources() {
        $output = '';
        if (!array_key_exists('assetsJ_resources', $this->_templateParts)) {
            trigger_error('assetsJ Resources Error', E_USER_WARNING);
        } else {
            $resources = $this->_templateParts['assetsJ_resources'];
            if (!empty($resources)) {
                foreach ($resources as $resourceKey => $path) {
                    $output .= '<script src="'. $path .'"></script>';
                }
            }
        }
        echo $output;
    }

    public function renderApp() {
        $this->renderTemplateHeaderStart();
        $this->renderHeaderResources();
        $this->renderTemplateHeaderEnd();
        $this->renderTemplateBlocks();
        $this->renderFooterResources();
        $this->renderTemplateFooter();
    }

    public function assetsApp() {
        $this->assetsTemplateHeaderStart();
        $this->renderAsstesResources();
        $this->assetsTemplateHeaderEnd();
        $this->assetsTemplateBlocks();
        $this->assetsFooterResources();
        $this->assetsTemplateFooter();
    }

    public function errorApp() {
        $this->errorTemplateHeaderStart();
        $this->renderErrorResources();
        $this->errorTemplateHeaderEnd();
        $this->errorTemplateBlocks();
        $this->errorTemplateFooter();
    }
}