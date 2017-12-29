<?php

namespace Ivoz\Provider\Domain\Model\FeaturesRelBrand;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * FeaturesRelBrandAbstract
 * @codeCoverageIgnore
 */
abstract class FeaturesRelBrandAbstract
{
    /**
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Provider\Domain\Model\Feature\FeatureInterface
     */
    protected $feature;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct()
    {

    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return FeaturesRelBrandDto
     */
    public static function createDto()
    {
        return new FeaturesRelBrandDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FeaturesRelBrandDto
         */
        Assertion::isInstanceOf($dto, FeaturesRelBrandDto::class);

        $self = new static();

        $self
            ->setBrand($dto->getBrand())
            ->setFeature($dto->getFeature())
        ;

        $self->sanitizeValues();
        $self->initChangelog();

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FeaturesRelBrandDto
         */
        Assertion::isInstanceOf($dto, FeaturesRelBrandDto::class);

        $this
            ->setBrand($dto->getBrand())
            ->setFeature($dto->getFeature());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return FeaturesRelBrandDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setBrand($this->getBrand() ? $this->getBrand()->toDto() : null)
            ->setFeature($this->getFeature() ? $this->getFeature()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'brandId' => self::getBrand() ? self::getBrand()->getId() : null,
            'featureId' => self::getFeature() ? self::getFeature()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set feature
     *
     * @param \Ivoz\Provider\Domain\Model\Feature\FeatureInterface $feature
     *
     * @return self
     */
    public function setFeature(\Ivoz\Provider\Domain\Model\Feature\FeatureInterface $feature)
    {
        $this->feature = $feature;

        return $this;
    }

    /**
     * Get feature
     *
     * @return \Ivoz\Provider\Domain\Model\Feature\FeatureInterface
     */
    public function getFeature()
    {
        return $this->feature;
    }



    // @codeCoverageIgnoreEnd
}

