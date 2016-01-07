<?php
namespace ZB\Utils\Enum;

use Doctrine\DBAL\Types\Type as DoctrineType;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\MutableCreationOptionsInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Stdlib\ArrayUtils;

/**
 * Class EnumValidatorFactory
 *
 * @package ZB\Utils\Enum
 */
class EnumValidatorFactory implements FactoryInterface, MutableCreationOptionsInterface
{
    /**
     * @var array
     */
    protected $options = array();

    /**
     * Create service
     *
     * @param  ServiceLocatorInterface $validators
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $validators)
    {
        if (isset($this->options['enum'])) {
            $this->options['enum'] = DoctrineType::getType($this->options['enum']);
        }

        return new EnumValidator($this->options);
    }

    /**
     * Set creation options
     *
     * @param  array $options
     * @return void
     */
    public function setCreationOptions(array $options)
    {
        $this->options = $options;
    }
}