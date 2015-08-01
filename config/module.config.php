<?php
/**
 * Designmoves (http://www.designmoves.nl)
 *
 * @copyright Copyright (c) 2015, Designmoves (http://www.designmoves.nl)
 * @license   http://code.designmoves.nl/licence/new-bsd New BSD License
 */

return array(
    'controllers' => array(
        'invokables' => array(
            'Designmoves\Demo\Controller\Index' => 'Designmoves\Demo\Controller\IndexController',
        ),
    ),

    'router' => array(
        'routes' => array(
            'designmoves-demo' => array(
                'type' => 'literal',
                'options' => array(
                    'route' => '/demo',
                    'defaults' => array(
                        '__NAMESPACE__' => 'Designmoves\Demo\Controller',
                        'controller'    => 'index',
                        'action'        => 'index',
                    ),
                ),
            ),
        ),
    ),

    'view_manager' => array(
        'controller_map' => array(
            'Designmoves\Demo' => true,
        ),
        'template_path_stack' => array(
            'designmoves_demo' => __DIR__ . '/../view',
        ),
    ),
);
