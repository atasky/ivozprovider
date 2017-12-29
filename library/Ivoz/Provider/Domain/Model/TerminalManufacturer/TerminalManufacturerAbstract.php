<?php

namespace Ivoz\Provider\Domain\Model\TerminalManufacturer;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * TerminalManufacturerAbstract
 * @codeCoverageIgnore
 */
abstract class TerminalManufacturerAbstract
{
    /**
     * @var string
     */
    protected $iden;

    /**
     * @var string
     */
    protected $name = '';

    /**
     * @var string
     */
    protected $description = '';


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($iden, $name, $description)
    {
        $this->setIden($iden);
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
     * @return TerminalManufacturerDto
     */
    public static function createDto()
    {
        return new TerminalManufacturerDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TerminalManufacturerDto
         */
        Assertion::isInstanceOf($dto, TerminalManufacturerDto::class);

        $self = new static(
            $dto->getIden(),
            $dto->getName(),
            $dto->getDescription());

        $self;

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
         * @var $dto TerminalManufacturerDto
         */
        Assertion::isInstanceOf($dto, TerminalManufacturerDto::class);

        $this
            ->setIden($dto->getIden())
            ->setName($dto->getName())
            ->setDescription($dto->getDescription());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return TerminalManufacturerDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setIden($this->getIden())
            ->setName($this->getName())
            ->setDescription($this->getDescription());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'iden' => self::getIden(),
            'name' => self::getName(),
            'description' => self::getDescription()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set iden
     *
     * @param string $iden
     *
     * @return self
     */
    public function setIden($iden)
    {
        Assertion::notNull($iden, 'iden value "%s" is null, but non null value was expected.');
        Assertion::maxLength($iden, 100, 'iden value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->iden = $iden;

        return $this;
    }

    /**
     * Get iden
     *
     * @return string
     */
    public function getIden()
    {
        return $this->iden;
    }

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
        Assertion::maxLength($name, 100, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');

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
    public function setDescription($description)
    {
        Assertion::notNull($description, 'description value "%s" is null, but non null value was expected.');
        Assertion::maxLength($description, 500, 'description value "%s" is too long, it should have no more than %d characters, but has %d characters.');

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

