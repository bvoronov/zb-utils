<?php
namespace ZB\Utils\Apigility;

use ZB\Utils\Entity\IdProviderInterface;
use ZF\Hal\Plugin\Hal as HalPlugin;
use ZF\Hal\Entity as HalEntity;
use ZF\Hal\Link\Link as HalLink;

/**
 * Class ConvertToHalEntityTrait
 *
 * @package ZB\Utils\Apigility
 */
trait ConvertToHalEntityTrait
{
    /**
     * @param  \ZB\Utils\Entity\IdProviderInterface $idProvider
     * @param  \ZF\Hal\Plugin\Hal $halPlugin
     * @return \ZF\Hal\Entity
     */
    public function convertToHalEntity(IdProviderInterface $idProvider, HalPlugin $halPlugin)
    {
        $halMetadata = $halPlugin->getMetadataMap()
            ->get($idProvider);
        $halEntity = new HalEntity($idProvider);
        $halEntity->getLinks()->add(HalLink::factory(array(
            'rel'   => 'self',
            'route' => array(
                'name'    => $halMetadata->getRoute(),
                'options' => $halMetadata->getRouteOptions(),
                'params'  => array_merge($halMetadata->getRouteParams(), array(
                    $halMetadata->getRouteIdentifierName() => $idProvider->getId()
                ))
            ),
        )));

        return $halEntity;
    }
} 