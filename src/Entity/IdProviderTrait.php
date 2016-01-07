<?php
namespace ZB\Utils\Entity;

/**
 * Class IdProviderTrait
 *
 * @package ZB\Utils\Entity
 */
trait IdProviderTrait
{
    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
} 