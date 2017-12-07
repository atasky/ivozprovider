<?php

namespace Ivoz\Provider\Domain\Model\FeaturesRelBrand;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface FeaturesRelBrandInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return FeaturesRelBrandDto
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
     * @return FeaturesRelBrandDto
     */
    public function toDto();

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand = null);

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand();

    /**
     * Set feature
     *
     * @param \Ivoz\Provider\Domain\Model\Feature\FeatureInterface $feature
     *
     * @return self
     */
    public function setFeature(\Ivoz\Provider\Domain\Model\Feature\FeatureInterface $feature);

    /**
     * Get feature
     *
     * @return \Ivoz\Provider\Domain\Model\Feature\FeatureInterface
     */
    public function getFeature();

}

