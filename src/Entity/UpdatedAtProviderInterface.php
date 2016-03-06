<?php
namespace ZB\Utils\Entity;

/**
 * Interface UpdatedAtProviderInterface
 *
 * @package ZB\Utils\Entity
 */
interface UpdatedAtProviderInterface
{
    /**
     * @return \DateTime
     */
    public function getUpdatedAt();

    /**
     * @param  \DateTime $timestamp
     * @return \ZB\Utils\Entity\UpdatedAtProviderInterface
     */
    public function setUpdatedAt(\DateTime $timestamp);
} 