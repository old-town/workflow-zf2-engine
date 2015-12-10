<?php
/**
 * @link    https://github.com/old-town/workflow-zf2-engine
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\ZF2\Engine;

use OldTown\Workflow\ZF2\Engine\Controller\EngineController;

return [
    'controllers' => [
        'invokables' => [
            EngineController::class => EngineController::class
        ]
    ],
];