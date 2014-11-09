<?php

require_once __DIR__.'/src/symfony/ClassLoader/UniversalClassLoader.php';

use Symfony\Component\ClassLoader\UniversalClassLoader;

$loader = new UniversalClassLoader();
$loader->registerNamespace('whs', __DIR__.'/src/');
$loader->register();
