<?php
namespace ZB\Utils\Entity;

/**
 * Class CreatedAtProviderTrait
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