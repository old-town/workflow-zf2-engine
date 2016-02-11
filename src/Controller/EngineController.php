<?php
/**
 * @link    https://github.com/old-town/workflow-zf2-engine
 * @author  Malofeykin Andrey  <and-rey2@yandex.ru>
 */
namespace OldTown\Workflow\ZF2\Engine\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use OldTown\Workflow\ZF2\ServiceEngine\Workflow;
use OldTown\Workflow\ZF2\Engine\ViewRenderer\EmptyModel;

/**
 * Class EngineController
 *
 * @package OldTown\Workflow\ZF2\Controller
 *
 */
class EngineController extends AbstractActionController
{
    /**
     * Создание нового процесса workflow
     *
     * @return EmptyModel
     *
     * @throws \OldTown\Workflow\ZF2\Engine\Controller\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function initializeAction()
    {
        $routeMatch = $this->getEvent()->getRouteMatch();
        $workflowManagerName = $routeMatch->getParam('workflowManagerName', null);
        if (null === $workflowManagerName) {
            $errMsg = 'Param workflowManagerName not found';
            throw new Exception\InvalidArgumentException($errMsg);
        }

        $workflowActionName = $routeMatch->getParam('workflowActionName', null);
        if (null === $workflowActionName) {
            $errMsg = 'Param workflowActionName not found';
            throw new Exception\InvalidArgumentException($errMsg);
        }

        $workflowName = $routeMatch->getParam('workflowName', null);
        if (null === $workflowName) {
            $errMsg = 'Param workflowName not found';
            throw new Exception\InvalidArgumentException($errMsg);
        }

        /** @var Workflow $workflowService */
        $workflowService = $this->getServiceLocator()->get(Workflow::class);

        $workflowService->initialize($workflowManagerName, $workflowName, $workflowActionName);

        $result = new EmptyModel();
        return $result;
    }

    /**
     * Выполнение нового действия
     *
     * @throws \OldTown\Workflow\ZF2\Engine\Controller\Exception\InvalidArgumentException
     * @throws \Zend\ServiceManager\Exception\ServiceNotFoundException
     */
    public function doAction()
    {
        $routeMatch = $this->getEvent()->getRouteMatch();

        $workflowManagerName = $routeMatch->getParam('workflowManagerName', null);
        if (null === $workflowManagerName) {
            $errMsg = 'Param workflowManagerName not found';
            throw new Exception\InvalidArgumentException($errMsg);
        }

        $workflowActionName = $routeMatch->getParam('workflowActionName', null);
        if (null === $workflowActionName) {
            $errMsg = 'Param workflowActionName not found';
            throw new Exception\InvalidArgumentException($errMsg);
        }

        $entryId = $routeMatch->getParam('entryId', null);
        if (null === $entryId) {
            $errMsg = 'Param entryId not found';
            throw new Exception\InvalidArgumentException($errMsg);
        }

        /** @var Workflow $workflowService */
        $workflowService = $this->getServiceLocator()->get(Workflow::class);


        $workflowService->doAction($workflowManagerName, $entryId, $workflowActionName);


        $result = new EmptyModel();
        return $result;
    }
}
