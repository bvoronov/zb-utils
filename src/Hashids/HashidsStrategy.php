<?php
namespace Zb\Utils\Hashids;

use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Class HashidsStrategy
 *
 * @package Zb\Utils\Hashids
 */
class HashidsStrategy implements StrategyInterface, ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * @inheritdoc
     */
    public function extract($value)
    {
        $value = $this->getServiceLocator()
            ->get('Hashids')
            ->encode($value);

        return $value;
    }

    /**
     * inheritdoc
     */
    public function hydrate($value)
    {
        $value = $this->getServiceLocator()
            ->get('Hashids')
            ->decode($value);

        return array_shift($value);
    }
}