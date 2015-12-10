<?php
/**
 * @link    https://github.com/old-town/workflow-zf2-engine
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\ZF2\Engine\PhpUnit\Test;

use OldTown\Workflow\ZF2\Engine\PhpUnit\TestData\TestPaths;
use Zend\Test\PHPUnit\Controller\AbstractHttpControllerTestCase;


/**
 * Class ModuleTest
 *
 * @package OldTown\Workflow\ZF2\Engine\PhpUnit\Test
 */
class ModuleTest extends AbstractHttpControllerTestCase
{
    /**
     *
     * @return void
     */
    public function testLoadModule()
    {
        /** @noinspection PhpIncludeInspection */
        $this->setApplicationConfig(
            include TestPaths::getPathToDefaultAppConfig()
        );
        $this->assertModulesLoaded(['OldTown\Workflow\ZF2\Engine']);
    }
}
