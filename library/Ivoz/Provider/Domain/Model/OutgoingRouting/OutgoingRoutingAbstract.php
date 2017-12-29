<?php

namespace Ivoz\Provider\Domain\Model\OutgoingRouting;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * OutgoingRoutingAbstract
 * @codeCoverageIgnore
 */
abstract class OutgoingRoutingAbstract
{
    /**
     * @var string
     */
    protected $type = 'group';

    /**
     * @var integer
     */
    protected $priority;

    /**
     * @var integer
     */
    protected $weight = '1';

    /**
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractInterface
     */
    protected $peeringContract;

    /**
     * @var \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    protected $routingPattern;

    /**
     * @var \Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    protected $routingPatternGroup;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($priority, $weight)
    {
        $this->setPriority($priority);
        $this->setWeight($weight);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return OutgoingRoutingDto
     */
    public static function createDto()
    {
        return new OutgoingRoutingDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto OutgoingRoutingDto
         */
        Assertion::isInstanceOf($dto, OutgoingRoutingDto::class);

        $self = new static(
            $dto->getPriority(),
            $dto->getWeight());

        $self
            ->setType($dto->getType())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
            ->setPeeringContract($dto->getPeeringContract())
            ->setRoutingPattern($dto->getRoutingPattern())
            ->setRoutingPatternGroup($dto->getRoutingPatternGroup())
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
         * @var $dto OutgoingRoutingDto
         */
        Assertion::isInstanceOf($dto, OutgoingRoutingDto::class);

        $this
            ->setType($dto->getType())
            ->setPriority($dto->getPriority())
            ->setWeight($dto->getWeight())
            ->setBrand($dto->getBrand())
            ->setCompany($dto->getCompany())
            ->setPeeringContract($dto->getPeeringContract())
            ->setRoutingPattern($dto->getRoutingPattern())
            ->setRoutingPatternGroup($dto->getRoutingPatternGroup());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return OutgoingRoutingDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setType($this->getType())
            ->setPriority($this->getPriority())
            ->setWeight($this->getWeight())
            ->setBrand($this->getBrand() ? $this->getBrand()->toDto() : null)
            ->setCompany($this->getCompany() ? $this->getCompany()->toDto() : null)
            ->setPeeringContract($this->getPeeringContract() ? $this->getPeeringContract()->toDto() : null)
            ->setRoutingPattern($this->getRoutingPattern() ? $this->getRoutingPattern()->toDto() : null)
            ->setRoutingPatternGroup($this->getRoutingPatternGroup() ? $this->getRoutingPatternGroup()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'type' => self::getType(),
            'priority' => self::getPriority(),
            'weight' => self::getWeight(),
            'brandId' => self::getBrand() ? self::getBrand()->getId() : null,
            'companyId' => self::getCompany() ? self::getCompany()->getId() : null,
            'peeringContractId' => self::getPeeringContract() ? self::getPeeringContract()->getId() : null,
            'routingPatternId' => self::getRoutingPattern() ? self::getRoutingPattern()->getId() : null,
            'routingPatternGroupId' => self::getRoutingPatternGroup() ? self::getRoutingPatternGroup()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type = null)
    {
        if (!is_null($type)) {
        }

        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority)
    {
        Assertion::notNull($priority, 'priority value "%s" is null, but non null value was expected.');
        Assertion::integerish($priority, 'priority value "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($priority, 0, 'priority provided "%s" is not greater or equal than "%s".');

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set weight
     *
     * @param integer $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        Assertion::notNull($weight, 'weight value "%s" is null, but non null value was expected.');
        Assertion::integerish($weight, 'weight value "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($weight, 0, 'weight provided "%s" is not greater or equal than "%s".');

        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

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
     * Set peeringContract
     *
     * @param \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract
     *
     * @return self
     */
    public function setPeeringContract(\Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractInterface $peeringContract = null)
    {
        $this->peeringContract = $peeringContract;

        return $this;
    }

    /**
     * Get peeringContract
     *
     * @return \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractInterface
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }

    /**
     * Set routingPattern
     *
     * @param \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return self
     */
    public function setRoutingPattern(\Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern = null)
    {
        $this->routingPattern = $routingPattern;

        return $this;
    }

    /**
     * Get routingPattern
     *
     * @return \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * Set routingPatternGroup
     *
     * @param \Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup
     *
     * @return self
     */
    public function setRoutingPatternGroup(\Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup = null)
    {
        $this->routingPatternGroup = $routingPatternGroup;

        return $this;
    }

    /**
     * Get routingPatternGroup
     *
     * @return \Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup()
    {
        return $this->routingPatternGroup;
    }



    // @codeCoverageIgnoreEnd
}

