<?php
namespace ZB\Utils\Entity;

/**
 * Class CreatedAtProviderTrait
 *
 * @property \DateTime createdAt
 *
 * @package ZB\Utils\Entity
 */
trait CreatedAtProviderTrait
{
    /**
     * @return \DateTime
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }
} 