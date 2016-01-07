<?php
namespace Zb\Utils\Hashids;

use Hashids\Hashids;
use Zend\Mvc\Router\Http\RouteMatch;
use Zend\Mvc\Router\Http\Segment;
use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorAwareTrait;
use Zend\Stdlib\RequestInterface as Request;

/**
 * Class HashidsRouter
 *
 * @package Zb\Utils\Hashids
 */
class HashidsRouter extends Segment
    implements ServiceLocatorAwareInterface
{
    use ServiceLocatorAwareTrait;

    /**
     * @var array
     */
    protected $_hashidsParams = array();

    /**
     * Overridden to handle special options
     *
     * @inheritdoc
     */
    public static function factory($options = array())
    {
        /** @var $instance \Zb\Utils\Hashids\HashidsRouter */
        $instance = parent::factory($options);
        if (isset($options['hashids']) && is_array($options['hashids']) && !empty($options['hashids'])) {
            $instance->setHashidsParams($options['hashids']);
        }

        return $instance;
    }

    /**
     * @inheritdoc
     */
    public function match(Request $request, $pathOffset = null, array $options = array())
    {
        $routeMatch = parent::match($request, $pathOffset, $options);
        if (!$routeMatch instanceof RouteMatch) {
            return $routeMatch;
        }

        $params = $routeMatch->getParams();
        foreach ($params as $key => $value) {
            if (in_array($key, $this->_hashidsParams)) {
                $routeMatch->setParam($key, $this->_decode($value));
            }
        }

        return $routeMatch;
    }

    /**
     * @inheritdoc
     */
    public function assemble(array $params = array(), array $options = array())
    {
        foreach ($params as $key => &$value) {
            if (in_array($key, $this->_hashidsParams)) {
                $value = $this->_encode($value);
            }
        }

        return parent::assemble($params, $options);
    }

    /**
     * @param  array $params
     * @return HashidsRouter
     */
    public function setHashidsParams(array $params)
    {
        $this->_hashidsParams = $params;

        return $this;
    }

    /**
     * @return array
     */
    public function getHashidsParams()
    {
        return $this->_hashidsParams;
    }

    /**
     * @param  integer $value
     * @return string
     */
    protected function _encode($value)
    {
        // encode only integers
        if (!ctype_digit((string) $value)) {
            return $value;
        }

        return $this->_getHashidsService()
            ->encode($value);
    }

    /**
     * @param  string $value
     * @return integer
     */
    protected function _decode($value)
    {
        $value = $this->_getHashidsService()
            ->decode($value);
        $value = array_shift($value);
        if (empty($value)) {
            // undefined
            $value = -1;
        }

        return $value;
    }

    /**
     * @return Hashids
     */
    protected function _getHashidsService()
    {
        return $this->getServiceLocator()
            ->getServiceLocator()
            ->get('Hashids');
    }
}