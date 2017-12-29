<?php

namespace Ivoz\Provider\Domain\Model\RoutingPatternGroupsRelPattern;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * RoutingPatternGroupsRelPatternAbstract
 * @codeCoverageIgnore
 */
abstract class RoutingPatternGroupsRelPatternAbstract
{
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
     * @return RoutingPatternGroupsRelPatternDto
     */
    public static function createDto()
    {
        return new RoutingPatternGroupsRelPatternDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto RoutingPatternGroupsRelPatternDto
         */
        Assertion::isInstanceOf($dto, RoutingPatternGroupsRelPatternDto::class);

        $self = new static();

        $self
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
         * @var $dto RoutingPatternGroupsRelPatternDto
         */
        Assertion::isInstanceOf($dto, RoutingPatternGroupsRelPatternDto::class);

        $this
            ->setRoutingPattern($dto->getRoutingPattern())
            ->setRoutingPatternGroup($dto->getRoutingPatternGroup());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return RoutingPatternGroupsRelPatternDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setRoutingPattern($this->getRoutingPattern() ? $this->getRoutingPattern()->toDto() : null)
            ->setRoutingPatternGroup($this->getRoutingPatternGroup() ? $this->getRoutingPatternGroup()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'routingPatternId' => self::getRoutingPattern() ? self::getRoutingPattern()->getId() : null,
            'routingPatternGroupId' => self::getRoutingPatternGroup() ? self::getRoutingPatternGroup()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set routingPattern
     *
     * @param \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return self
     */
    public function setRoutingPattern(\Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern)
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

