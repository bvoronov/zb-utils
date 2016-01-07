<?php

return array(
    'service_manager' => array(
        'abstract_factories' => array(
            'Zend\Cache\Service\StorageCacheAbstractServiceFactory',
            'Zend\Db\Adapter\AdapterAbstractServiceFactory',
            'Zend\Log\LoggerAbstractServiceFactory'
        ),
        'factories' => array(
            'Hashids' => 'ZB\\Utils\\Hashids\\HashidsFactory'
        ),
        'invokables' => array(
            'ISODateTimeStrategy' => 'ZB\\Utils\\ISODateTime\\ISODateTimeStrategy',
            'HashidsStrategy' => 'ZB\\Utils\\Hashids\\HashidsStrategy',
        ),
        'aliases' => array(
            'em' => 'Doctrine\\ORM\\EntityManager',
            'CollectionExtract' => 'ZF\\Apigility\\Doctrine\\Server\\Hydrator\\Strategy\\CollectionExtract',
        ),
    ),

    'doctrine' => array(
        'driver' => array(
            'configuration' => array(
                'orm_default' => array(
                    'metadata_cache' => 'apc',
                    'query_cache'    => 'apc',
                    'result_cache'   => 'apc',
                    'string_functions' => array(),
                )
            )
        ),
    ),

    'validators' => array(
        'factories' => array(
            'ZB\\Utils\\Enum\\EnumValidator' => 'ZB\\Utils\\Enum\\EnumValidatorFactory'
        ),
    ),

    'validator_metadata' => array(
        'ZB\\Utils\\Enum\EnumValidator' => array('enum' => 'string')
    ),

    'enum' => array()
);