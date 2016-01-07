<?php
namespace ZB\Utils\Apigility;

use Zend\ServiceManager\ServiceLocatorAwareInterface;

/**
 * Class AttachHalEventTrait
 *
 * @package ZB\Utils\Apigility
 */
trait AttachHalEventTrait
{
    protected function attachHalEvent($event, $callback)
    {
        $this->_getHalEventManager()
            ->attach($event, $callback);
    }

    /**
     * @return \Zend\EventManager\EventManagerInterface
     */
    protected function _getHalEventManager()
    {
        return $this->_getHalPlugin()
            ->getEventManager();
    }

    /**
     * @return \ZF\Hal\Plugin\Hal
     */
    protected function _getHalPlugin()
    {
        if (!$this instanceof ServiceLocatorAwareInterface) {
            throw new \LogicException('To use AttachHalEventTrait class should implement Zend\ServiceManager\ServiceLocatorAwareInterface');
        }

        $serviceManager = $this->getServiceLocator();
        $viewHelperManager = $serviceManager->get('ViewHelperManager');
        /** @var $halPlugin \ZF\Hal\Plugin\Hal */
        $halPlugin = $viewHelperManager->get('Hal');

        return $halPlugin;
    }
}