<?php

require(__DIR__ . '/../../vendor/autoload.php');

use Jaxon\Jaxon;
use Jaxon\Response\Response;

$jaxon = jaxon();

// $jaxon->setOption('core.debug.on', true);
$jaxon->setOption('core.prefix.class', '');

// Dialog options
$jaxon->setOption('dialogs.default.modal', 'bootstrap');
$jaxon->setOption('dialogs.default.alert', 'toastr');
$jaxon->setOption('dialogs.libraries', array('pgwjs'));
$jaxon->setOption('dialogs.toastr.options.closeButton', true);
$jaxon->setOption('dialogs.toastr.options.positionClass', 'toast-top-center');

// Request processing URI
$jaxon->setOption('core.request.uri', 'ajax.php');

// Disable autoload
$jaxon->disableAutoload();

// Register the namespaces with a third-party autoloader
$loader = new Keradus\Psr4Autoloader;
$loader->register();
$loader->addNamespace('App', __DIR__ . '/../../classes/namespace/app');
$loader->addNamespace('Ext', __DIR__ . '/../../classes/namespace/ext');

// Add class dirs with namespaces
$jaxon->addClassDir(__DIR__ . '/../../classes/namespace/app', 'App');
$jaxon->addClassDir(__DIR__ . '/../../classes/namespace/ext', 'Ext');
