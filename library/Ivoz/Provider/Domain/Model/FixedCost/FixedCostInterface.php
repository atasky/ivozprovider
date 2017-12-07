<?php

namespace Ivoz\Provider\Domain\Model\FixedCost;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface FixedCostInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return FixedCostDto
     */
    public static function createDto();

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(\Ivoz\Core\Application\DataTransferObjectInterface $dto);

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(\Ivoz\Core\Application\DataTransferObjectInterface $dto);

    /**
     * @return FixedCostDto
     */
    public function toDto();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

    /**
     * Set cost
     *
     * @param string $cost
     *
     * @return self
     */
    public function setCost($cost = null);

    /**
     * Get cost
     *
     * @return string
     */
    public function getCost();

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand);

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

}

