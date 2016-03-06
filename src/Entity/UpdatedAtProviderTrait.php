<?php
namespace ZB\Utils\Entity;

/**
 * Class UpdatedAtProviderTrait
 *
 * @package ZB\Utils\Entity
 */
trait UpdatedAtProviderTrait
{
    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param  \DateTime $timestamp
     * @return \ZB\Utils\Entity\UpdatedAtProviderInterface
     */
    public function setUpdatedAt(\DateTime $timestamp)
    {
        $this->updatedAt = $timestamp;

        return $this;
    }
}