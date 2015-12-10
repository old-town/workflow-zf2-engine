<?php
/**
 * @link    https://github.com/old-town/workflow-zf2-engine
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\ZF2\Engine;

use OldTown\Workflow\ZF2\Engine\Controller\EngineController;

return [
    'router' => [
        'routes' => [
            'workflow' => [
                'child_routes' => [
                    'engine' => [
                        'type'         => 'segment',
                        'options'      => [
                            'route'       => 'engine/manager/:workflowManagerName/action/:workflowActionName/',
                            'constraints' => [
                                'workflowManagerName' => '[a-zA-Z][a-zA-Z0-9_-]*',
                                'workflowActionName'  => '[a-zA-Z][a-zA-Z0-9_-]*'
                            ]
                        ],
                        'child_routes' => [
                            'doAction'   => [
                                'type'    => 'segment',
                                'options' => [
                                    'route'       => 'entry/:entryId',
                                    'constraints' => [
                                        'entryId' => '\d+'
                                    ],
                                    'defaults'    => [
                                        'controller' => EngineController::class,
                                        'action' => 'do'
                                    ],
                                ],
                            ],
                            'initialize' => [
                                'type'    => 'segment',
                                'options' => [
                                    'route'       => 'name/:workflowName',
                                    'constraints' => [
                                        'workflowName' => '[a-zA-Z][a-zA-Z0-9_-]*'
                                    ],
                                    'defaults'    => [
                                        'controller' => EngineController::class,
                                        'action' => 'initialize'
                                    ],
                                ],
                            ]
                        ]
                    ],
                ],
            ]
        ]
    ]
];