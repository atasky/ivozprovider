<?php

namespace Ivoz\Provider\Domain\Model\PricingPlan;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface PricingPlanInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return PricingPlanDto
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
     * @return PricingPlanDto
     */
    public function toDto();

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return self
     */
    public function setCreatedOn($createdOn);

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn();

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

    /**
     * Set name
     *
     * @param \Ivoz\Provider\Domain\Model\PricingPlan\Name $name
     *
     * @return self
     */
    public function setName(\Ivoz\Provider\Domain\Model\PricingPlan\Name $name);

    /**
     * Get name
     *
     * @return \Ivoz\Provider\Domain\Model\PricingPlan\Name
     */
    public function getName();

    /**
     * Set description
     *
     * @param \Ivoz\Provider\Domain\Model\PricingPlan\Description $description
     *
     * @return self
     */
    public function setDescription(\Ivoz\Provider\Domain\Model\PricingPlan\Description $description);

    /**
     * Get description
     *
     * @return \Ivoz\Provider\Domain\Model\PricingPlan\Description
     */
    public function getDescription();

}

