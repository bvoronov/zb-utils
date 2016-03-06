<?php
namespace ZB\Utils\Entity;

/**
 * Interface CreatedAtProviderInterface
 *
 * @package ZB\Utils\Entity
 */
interface CreatedAtProviderInterface
{
    /**
     * Returns the creation date of the entity
     *
     * @return \DateTime
     */
    public function getCreatedAt();
}