<?php
namespace ZB\Utils\Entity;

/**
 * Class IdProviderTrait
 *
 * @property integer id
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