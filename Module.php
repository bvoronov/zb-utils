<?php
namespace ZB\Utils;

use Zend\Mvc\ModuleRouteListener;
use Zend\Mvc\MvcEvent;
use Zend\ServiceManager\ServiceLocatorInterface;
use Doctrine\DBAL\Types\Type as DoctrineType;

class Module
{
    public function onBootstrap(MvcEvent $e)
    {
        $serviceManager = $e->getApplication()->getServiceManager();
        $eventManager = $e->getApplication()->getEventManager();
        $moduleRouteListener = new ModuleRouteListener();
        $moduleRouteListener->attach($eventManager);

        $this->registerEnum($serviceManager);
    }

    /**
     * @param  ServiceLocatorInterface $serviceManager
     * @throws \Doctrine\DBAL\DBALException
     */
    public function registerEnum($serviceManager)
    {
        /** @var $em \Doctrine\ORM\EntityManager */
        $platform = $serviceManager->get('em')
            ->getConnection()
            ->getDatabasePlatform();
        $platform->registerDoctrineTypeMapping('enum', 'string');

        // register enums in doctrine
        $config = $serviceManager->get('Config');
        $enums = $config['zb-utils']['enum'];
        foreach ($enums as $code => $class) {
            DoctrineType::addType($code, $class);
        }
    }

    /**
     * Retrieve autoloader configuration
     *
     * @return array
     */
    public function getAutoloaderConfig()
    {
        return array(
            'Zend\Loader\StandardAutoloader' => array(
                'namespaces' => array(
                    __NAMESPACE__ => __DIR__ . '/src/',
                ),
            ),
        );
    }

    /**
     * Retrieve module configuration
     *
     * @return array
     */
    public function getConfig()
    {
        return include __DIR__ . '/config/module.config.php';
    }
}
