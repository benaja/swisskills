<?php

/** @var Composer\Autoload\ClassLoader $loader */
$loader = require_once(__DIR__ . '/../../../../../vendor/autoload.php');
$loader->add('SM2014\\TOH', __DIR__ . '/../src/');

require_once __DIR__ . '/SM2014/TOH/Game_TestCase.php';
