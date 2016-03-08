<?php
namespace ZB\Utils\ISODateTime;

use Zend\Stdlib\Hydrator\Strategy\StrategyInterface;

/**
 * Class ISODateTime
 *
 * @package ZB\Utils\ISODateTime
 */
class ISODateTimeStrategy implements StrategyInterface
{
    /**
     * Converts the given value so that it can be extracted by the hydrator.
     *
     * @param  mixed $value The original value.
     * @param  object $object (optional) The original object for context.
     * @return mixed Returns the value that should be extracted.
     * @throws \RuntimeException If object os not a User
     */
    public function extract($value, $object = null)
    {
        if ($value instanceof \DateTime) {
            return $value->format(\DateTime::ISO8601);
        }

        return null;
    }

    /**
     * Converts the given value so that it can be hydrated by the hydrator.
     *
     * @param  mixed $value The original value.
     * @return mixed Returns the value that should be hydrated.
     * @throws \InvalidArgumentException
     */
    public function hydrate($value)
    {
        if (null === $value) {
            return $value;
        }

        if (!$value instanceof \DateTime) {
            throw new \InvalidArgumentException('Expected DateTime object');
        }
        // change timezone to server timezone
        $timezone = new \DateTimeZone(date_default_timezone_get());
        $value->setTimezone($timezone);

        return $value;
    }
}