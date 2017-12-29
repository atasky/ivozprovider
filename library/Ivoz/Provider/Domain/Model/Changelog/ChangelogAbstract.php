<?php

namespace Ivoz\Provider\Domain\Model\Changelog;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * ChangelogAbstract
 * @codeCoverageIgnore
 */
abstract class ChangelogAbstract
{
    /**
     * @var string
     */
    protected $entity;

    /**
     * @var string
     */
    protected $entityId;

    /**
     * @var array
     */
    protected $data;

    /**
     * @var \DateTime
     */
    protected $createdOn;

    /**
     * @var integer
     */
    protected $microtime;

    /**
     * @var \Ivoz\Provider\Domain\Model\Commandlog\CommandlogInterface
     */
    protected $command;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct(
        $entity,
        $entityId,
        $createdOn,
        $microtime
    ) {
        $this->setEntity($entity);
        $this->setEntityId($entityId);
        $this->setCreatedOn($createdOn);
        $this->setMicrotime($microtime);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return ChangelogDto
     */
    public static function createDto()
    {
        return new ChangelogDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ChangelogDto
         */
        Assertion::isInstanceOf($dto, ChangelogDto::class);

        $self = new static(
            $dto->getEntity(),
            $dto->getEntityId(),
            $dto->getCreatedOn(),
            $dto->getMicrotime());

        $self
            ->setData($dto->getData())
            ->setCommand($dto->getCommand())
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
         * @var $dto ChangelogDto
         */
        Assertion::isInstanceOf($dto, ChangelogDto::class);

        $this
            ->setEntity($dto->getEntity())
            ->setEntityId($dto->getEntityId())
            ->setData($dto->getData())
            ->setCreatedOn($dto->getCreatedOn())
            ->setMicrotime($dto->getMicrotime())
            ->setCommand($dto->getCommand());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return ChangelogDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setEntity($this->getEntity())
            ->setEntityId($this->getEntityId())
            ->setData($this->getData())
            ->setCreatedOn($this->getCreatedOn())
            ->setMicrotime($this->getMicrotime())
            ->setCommand($this->getCommand() ? $this->getCommand()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'entity' => self::getEntity(),
            'entityId' => self::getEntityId(),
            'data' => self::getData(),
            'createdOn' => self::getCreatedOn(),
            'microtime' => self::getMicrotime(),
            'commandId' => self::getCommand() ? self::getCommand()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set entity
     *
     * @param string $entity
     *
     * @return self
     */
    public function setEntity($entity)
    {
        Assertion::notNull($entity, 'entity value "%s" is null, but non null value was expected.');
        Assertion::maxLength($entity, 150, 'entity value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->entity = $entity;

        return $this;
    }

    /**
     * Get entity
     *
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * Set entityId
     *
     * @param string $entityId
     *
     * @return self
     */
    public function setEntityId($entityId)
    {
        Assertion::notNull($entityId, 'entityId value "%s" is null, but non null value was expected.');
        Assertion::maxLength($entityId, 36, 'entityId value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->entityId = $entityId;

        return $this;
    }

    /**
     * Get entityId
     *
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * Set data
     *
     * @param array $data
     *
     * @return self
     */
    public function setData($data = null)
    {
        if (!is_null($data)) {
        }

        $this->data = $data;

        return $this;
    }

    /**
     * Get data
     *
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

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
            null
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
     * Set microtime
     *
     * @param integer $microtime
     *
     * @return self
     */
    public function setMicrotime($microtime)
    {
        Assertion::notNull($microtime, 'microtime value "%s" is null, but non null value was expected.');
        Assertion::integerish($microtime, 'microtime value "%s" is not an integer or a number castable to integer.');

        $this->microtime = $microtime;

        return $this;
    }

    /**
     * Get microtime
     *
     * @return integer
     */
    public function getMicrotime()
    {
        return $this->microtime;
    }

    /**
     * Set command
     *
     * @param \Ivoz\Provider\Domain\Model\Commandlog\CommandlogInterface $command
     *
     * @return self
     */
    public function setCommand(\Ivoz\Provider\Domain\Model\Commandlog\CommandlogInterface $command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * Get command
     *
     * @return \Ivoz\Provider\Domain\Model\Commandlog\CommandlogInterface
     */
    public function getCommand()
    {
        return $this->command;
    }



    // @codeCoverageIgnoreEnd
}

