<?php

namespace Ivoz\Provider\Domain\Model\MediaRelaySet;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * MediaRelaySetAbstract
 * @codeCoverageIgnore
 */
abstract class MediaRelaySetAbstract
{
    /**
     * @var string
     */
    protected $name = '0';

    /**
     * @var string
     */
    protected $description;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($name)
    {
        $this->setName($name);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return MediaRelaySetDto
     */
    public static function createDto()
    {
        return new MediaRelaySetDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto MediaRelaySetDto
         */
        Assertion::isInstanceOf($dto, MediaRelaySetDto::class);

        $self = new static(
            $dto->getName());

        $self
            ->setDescription($dto->getDescription())
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
         * @var $dto MediaRelaySetDto
         */
        Assertion::isInstanceOf($dto, MediaRelaySetDto::class);

        $this
            ->setName($dto->getName())
            ->setDescription($dto->getDescription());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return MediaRelaySetDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setName($this->getName())
            ->setDescription($this->getDescription());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => self::getName(),
            'description' => self::getDescription()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        Assertion::notNull($name, 'name value "%s" is null, but non null value was expected.');
        Assertion::maxLength($name, 32, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 200, 'description value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }



    // @codeCoverageIgnoreEnd
}

