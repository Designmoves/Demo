<?php
/**
 * Designmoves (http://www.designmoves.nl)
 *
 * @copyright Copyright (c) 2015, Designmoves (http://www.designmoves.nl)
 * @license   http://code.designmoves.nl/licence/new-bsd New BSD License
 */

ini_set('display_errors', 1);
error_reporting(-1);

$dir = __DIR__;
do {
    $file = $dir . '/vendor/autoload.php';
    if (is_file($file)) {
        $loader = require $file;

        break;
    }
} while ($dir = dirname($dir));

if (!isset($loader)) {
    throw new RuntimeException('vendor/autoload.php could not be found. Did you run `php composer.phar install`?');
}

$namespace = 'Designmoves\Demo';

$paths = array(
    $namespace           => __DIR__ . '/../src',
    $namespace . '\Test' => __DIR__,
);

foreach ($paths as $namespace => $path) {
    /* @var $loader \Composer\Autoload\ClassLoader */
    $loader->add($namespace, $path);
}

unset($dir, $file, $loader, $namespace, $paths, $namespace, $path);
