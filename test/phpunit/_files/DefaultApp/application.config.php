<?php

use \OldTown\Workflow\ZF2\Engine\PhpUnit\TestData\TestPaths;

return [
    'modules' => [
        'OldTown\\Workflow\\ZF2\\Engine'
    ],
    'module_listener_options' => [
        'module_paths' => [
            'OldTown\\Workflow\\ZF2\\Engine' => TestPaths::getPathToModule()
        ],
        'config_glob_paths' => []
    ]
];