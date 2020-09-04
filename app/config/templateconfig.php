<?php

return [
    'template' => [
        'wrapper_start'     => TEMPLATE_PATH . 'wrapperstart.php',
        'header'            => TEMPLATE_PATH . 'header.php',
        'nav'               => TEMPLATE_PATH . 'nav.php',
        ':view'             => ':action_view',
        'wrapper_end'       => TEMPLATE_PATH . 'wrapperend.php'
    ],
    'assets' => [
        ':view'             => ':action_view'
    ],
    'error' => [
        ':view'             => ':action_view'
    ],
    'header_resources' => [
        'css' => [
            'normalize'     => CSS . 'normalize.css',
            'all'           => CSS . 'all.min.css',
            'ggic'          => CSS . 'googleicons.css',
            'main'          => CSS . 'main' . $_SESSION['lang'] . '.css',

        ],
        'js' => [
            'moderinzr'     => JS . 'vendor/modernizr-2.8.3.min.js',
            'chart'         => JS . 'loader.js'
        ]
    ],

    'assets_resources' => [
        'css' => [
            'bootstrap'         => assetsC . 'bootstrap.min.css',
            'owl'               => assetsC . 'owl.carousel.min.css',
            'flaticon'          => assetsC . 'flaticon.css',
            'slicknav'          => assetsC . 'slicknav.css',
            'animate'           => assetsC . 'animate.min.css',
            'magnific'          => assetsC . 'magnific-popup.css',
            'fontawesome'       => assetsC . 'fontawesome-all.min.css',
            'themify'           => assetsC . 'themify-icons.css',
            'slick'             => assetsC . 'slick.css',
            'nice'              => assetsC . 'nice-select.css',
            'style'             => assetsC . 'style.css'

        ]

    ],
    'error_resources' => [
        'css' => [
            'font'         => errorC . 'font-awesome.min.css',
            'style'        => errorC . 'style.css'
        ]
    ],

    'assetsJ_resources' => [
        'modernizr'             => assetsJ . 'vendor/modernizr-3.5.0.min.js',
        'jquery'                => assetsJ . 'vendor/jquery-1.12.4.min.js',
        'popper'                => assetsJ . 'popper.min.js',
        'bootstrap'             => assetsJ . 'bootstrap.min.js',
        'slicknav'              => assetsJ . 'jquery.slicknav.min.js',
        'owl'                   => assetsJ . 'owl.carousel.min.js',
        'slick'                 => assetsJ . 'slick.min.js',
        'wow'                   => assetsJ . 'wow.min.js',
        'animated'              => assetsJ . 'animated.headline.js',
        'scrollUp'              => assetsJ . 'jquery.scrollUp.min.js',
        'nice'                  => assetsJ . 'jquery.nice-select.min.js',
        'sticky'                => assetsJ . 'jquery.sticky.js',
        'magnific'              => assetsJ . 'jquery.magnific-popup.js',
        'contact'               => assetsJ . 'contact.js',
        'form'                  => assetsJ . 'jquery.form.js',
        'validate'              => assetsJ . 'jquery.validate.min.js',
        'mail'                  => assetsJ . 'mail-script.js',
        'ajaxchimp'             => assetsJ . 'jquery.ajaxchimp.min.js',
        'plugins'               => assetsJ . 'plugins.js',
        'main'                  => assetsJ . 'main.js'


    ],
    'footer_resources' => [
        'jquery'            => JS . 'vendor/jquery-1.12.0.min.js',
        'all'               => JS . 'all.min.js',
        'helper'            => JS . 'helper.js',
        'datatables'            => JS . 'datatables' . $_SESSION['lang'] . '.js',
        'main'              => JS . 'main.js'
    ]
];