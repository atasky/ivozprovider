<?php

namespace Ivoz\Provider\Domain\Model\FeaturesRelCompany;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * FeaturesRelCompanyAbstract
 * @codeCoverageIgnore
 */
abstract class FeaturesRelCompanyAbstract
{
    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    protected $company;

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
     * @return FeaturesRelCompanyDto
     */
    public static function createDto()
    {
        return new FeaturesRelCompanyDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FeaturesRelCompanyDto
         */
        Assertion::isInstanceOf($dto, FeaturesRelCompanyDto::class);

        $self = new static();

        $self
            ->setCompany($dto->getCompany())
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
         * @var $dto FeaturesRelCompanyDto
         */
        Assertion::isInstanceOf($dto, FeaturesRelCompanyDto::class);

        $this
            ->setCompany($dto->getCompany())
            ->setFeature($dto->getFeature());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return FeaturesRelCompanyDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setCompany($this->getCompany() ? $this->getCompany()->toDto() : null)
            ->setFeature($this->getFeature() ? $this->getFeature()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'companyId' => self::getCompany() ? self::getCompany()->getId() : null,
            'featureId' => self::getFeature() ? self::getFeature()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
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

