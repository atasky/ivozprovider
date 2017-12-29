<?php

namespace Ivoz\Provider\Domain\Model\PricingPlan;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * PricingPlanAbstract
 * @codeCoverageIgnore
 */
abstract class PricingPlanAbstract
{
    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var Name
     */
    protected $name;

    /**
     * @var Description
     */
    protected $description;

    /**
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    protected $brand;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct(
        $createdOn,
        Name $name,
        Description $description
    ) {
        $this->setCreatedOn($createdOn);
        $this->setName($name);
        $this->setDescription($description);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return PricingPlanDto
     */
    public static function createDto()
    {
        return new PricingPlanDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto PricingPlanDto
         */
        Assertion::isInstanceOf($dto, PricingPlanDto::class);

        $name = new Name(
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $self = new static(
            $dto->getCreatedOn(),
            $name,
            $description
        );

        $self
            ->setBrand($dto->getBrand())
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
         * @var $dto PricingPlanDto
         */
        Assertion::isInstanceOf($dto, PricingPlanDto::class);

        $name = new Name(
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $description = new Description(
            $dto->getDescriptionEn(),
            $dto->getDescriptionEs()
        );

        $this
            ->setCreatedOn($dto->getCreatedOn())
            ->setName($name)
            ->setDescription($description)
            ->setBrand($dto->getBrand());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return PricingPlanDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setCreatedOn($this->getCreatedOn())
            ->setNameEn($this->getName()->getEn())
            ->setNameEs($this->getName()->getEs())
            ->setDescriptionEn($this->getDescription()->getEn())
            ->setDescriptionEs($this->getDescription()->getEs())
            ->setBrand($this->getBrand() ? $this->getBrand()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'createdOn' => self::getCreatedOn(),
            'nameEn' => self::getName()->getEn(),
            'nameEs' => self::getName()->getEs(),
            'descriptionEn' => self::getDescription()->getEn(),
            'descriptionEs' => self::getDescription()->getEs(),
            'brandId' => self::getBrand() ? self::getBrand()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set createdOn
     *
     * @param \DateTime $createdOn
     *
     * @return self
     */
    public function setCreatedOn($createdOn)
    {
        Assertion::notNull($createdOn, 'createdOn value "%s" is null, but non null value was expected.');
        $createdOn = \Ivoz\Core\Domain\Model\Helper\DateTimeHelper::createOrFix(
            $createdOn,
            'CURRENT_TIMESTAMP'
        );

        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * Get createdOn
     *
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand)
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
     * Set name
     *
     * @param \Ivoz\Provider\Domain\Model\PricingPlan\Name $name
     *
     * @return self
     */
    public function setName(Name $name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return \Ivoz\Provider\Domain\Model\PricingPlan\Name
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param \Ivoz\Provider\Domain\Model\PricingPlan\Description $description
     *
     * @return self
     */
    public function setDescription(Description $description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return \Ivoz\Provider\Domain\Model\PricingPlan\Description
     */
    public function getDescription()
    {
        return $this->description;
    }

    // @codeCoverageIgnoreEnd
}

