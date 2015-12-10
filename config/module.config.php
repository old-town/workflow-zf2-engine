<?php
/**
 * @link    https://github.com/old-town/workflow-zf2-engine
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\ZF2\Engine;

use OldTown\Workflow\ZF2\Engine\Listener\WorkflowDispatchListenerFactory;
use OldTown\Workflow\ZF2\Engine\Options\ModuleOptions;
use OldTown\Workflow\ZF2\Engine\Options\ModuleOptionsFactory;
use OldTown\Workflow\ZF2\Engine\Listener\WorkflowDispatchListener;

$config = [
    'service_manager'           => [
        'invokables' => [

        ],
        'factories'          => [
            ModuleOptions::class => ModuleOptionsFactory::class,
            WorkflowDispatchListener::class => WorkflowDispatchListenerFactory::class
        ],
        'abstract_factories' => [

        ]
    ],
    'workflow_zf2_engine'         => [
    ]
];


return array_merge_recursive(
    include __DIR__ . '/router.config.php',
    $config
);