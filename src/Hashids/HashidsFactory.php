<?php
namespace Zb\Utils\Hashids;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

/**
 * Class HashidsFactory
 *
 * @package Zb\Utils\Hashids
 */
class HashidsFactory implements FactoryInterface
{
    const SALT   = 'Salt for the Hashids service';
    const LENGTH = 8;

    /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        $hashids = new \Hashids\Hashids(self::SALT, self::LENGTH);

        return $hashids;
    }
}