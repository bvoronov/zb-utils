<?php
namespace ZB\Utils\Enum;

use Zend\Validator\AbstractValidator;
use Zend\Validator\Exception;
use ZB\Utils\Enum\Enum as EnumAbstract;

/**
 * Class EnumValue
 *
 * @package ZB\Utils\Enum
 */
class EnumValidator extends AbstractValidator
{
    const UNDEFINED = 'undefinedEnumValue';

    /**
     * @var array
     */
    protected $messageTemplates = array(
        self::UNDEFINED => 'Undefined enum value'
    );

    /**
     * @var \ZB\Utils\Enum\Enum
     */
    protected $enum;

    /**
     * Constructor
     *
     * @param array $options required keys are `enum`, which must be an instance of
     *                       ZB\Utils\Enum\Enum
     * @throws \Zend\Validator\Exception\InvalidArgumentException
     */
    public function __construct(array $options)
    {
        if (!isset($options['enum']) || !$options['enum'] instanceof EnumAbstract) {
            if (!array_key_exists('enum', $options)) {
                $provided = 'nothing';
            } else if (is_object($options['enum'])) {
                $provided = get_class($options['enum']);
            } else {
                $provided = getType($options['enum']);
            }

            throw new Exception\InvalidArgumentException(
                sprintf('Option "enum" is required and must be an instance of ZB\Utils\Enum\Enum, %s given', $provided)
            );
        }

        $this->enum = $options['enum'];
        parent::__construct($options);
    }

    /**
     * @param  string $value
     * @return boolean FALSE if value is missed in enum
     */
    public function isValid($value, $context = null)
    {
        $available = $this->enum->getValues();
        if (!in_array($value, $available)) {
            $this->error(self::UNDEFINED);
            return false;
        }

        return true;
    }
}