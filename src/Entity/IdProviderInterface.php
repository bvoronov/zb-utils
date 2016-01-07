<?php
namespace ZB\Utils\Entity;

/**
 * Interface IdProviderInterface
 *
 * @package ZB\Utils\Entity
 */
interface IdProviderInterface
{
    /**
     * Returns an unique identifier of an entity
     *
     * @return integer
     */
    public function getId();
} 