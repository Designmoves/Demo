<?php
/**
 * Designmoves (http://www.designmoves.nl)
 *
 * @copyright Copyright (c) 2015, Designmoves (http://www.designmoves.nl)
 * @license   http://code.designmoves.nl/licence/new-bsd New BSD License
 */

return function ($class) {
    static $map;
    if (!$map) {
        $map = include __DIR__ . '/autoload_classmap.php';
    }

    if (!isset($map[$class])) {
        return false;
    }

    return include $map[$class];
};
