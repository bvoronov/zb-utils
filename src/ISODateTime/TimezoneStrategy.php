<?php
namespace ZB\Utils\ISODateTime\ISODateTimeStrategy;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Class TimezoneStrategy
 *
 * @package ZB\Utils\ISODateTime\ISODateTimeStrategy
 */
class TimezoneStrategy implements StrategyInterface
{
    /**
     * @param  mixed  $value The original value.
     * @param  object $object (optional) The original object for context.
     * @return mixed Returns the value that should be extracted.
     * @throws \RuntimeException If object os not a User
     */
    public function extract($value, $object = null)
    {
        if (!$value instanceof \DateTimeZone) {
            return null;
        }

        return $value->getName();
    }

    /**
     * @param  mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     * @throws \InvalidArgumentException
     */
    public function hydrate($value)
    {
        if ($value === '' || $value === null) {
            return null;
        }

        return new \DateTimeZone($value);
    }
} 