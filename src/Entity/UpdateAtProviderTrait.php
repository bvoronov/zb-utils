<?php
namespace ZB\Utils\Entity;

/**
 * Class UpdateAtProviderTrait
 *
 * @package ZB\Utils\Entity
 */
trait UpdateAtProviderTrait
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
    public function setUpdateAt(\DateTime $timestamp)
    {
        $this->updatedAt = $timestamp;

        return $this;
    }
}