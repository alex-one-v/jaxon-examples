<?php

$directory = rtrim(APPPATH, '/') . '/jaxon/app';

$config['app'] = [
    'directories' => [
        $directory => [
            'namespace' => '\\Jaxon\\App',
            // 'separator' => '', // '.' or '_'
            // 'protected.' => [],
        ],
    ],
];
$config['lib'] = [
    'core' => [
        'language' => 'en',
        'encoding' => 'UTF-8',
        'request' => [
            'uri' => 'jaxon/process',
        ],
        'prefix' => [
            'class' => '',
        ],
        'debug' => [
            'on' => false,
            'verbose' => false,
        ],
        'error' => [
            'handle' => false,
        ],
    ],
    'js' => [
        'lib' => [
            // 'uri' => '',
        ],
        'app' => [
            // 'uri' => '',
            // 'dir' => '',
            'export' => false,
            'minify' => false,
            'options' => '',
        ],
    ],
    'dialogs' => [
        'libraries' => ['pgwjs'],
        'default' => [
            'modal' => 'bootstrap',
            'alert' => 'toastr',
        ],
        'toastr' => [
            'options' => [
                'closeButton' => true,
                'positionClass' => 'toast-top-center'
            ],
        ],
        'assets' => [
            'include' => [
                'all' => true,
            ],
        ],
    ],
];
