<?php

namespace Ivoz\Provider\Domain\Model\Language;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * LanguageAbstract
 * @codeCoverageIgnore
 */
abstract class LanguageAbstract
{
    /**
     * @var string
     */
    protected $iden;

    /**
     * @var Name
     */
    protected $name;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($iden, Name $name)
    {
        $this->setIden($iden);
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
     * @return LanguageDto
     */
    public static function createDto()
    {
        return new LanguageDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LanguageDto
         */
        Assertion::isInstanceOf($dto, LanguageDto::class);

        $name = new Name(
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $self = new static(
            $dto->getIden(),
            $name
        );

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
         * @var $dto LanguageDto
         */
        Assertion::isInstanceOf($dto, LanguageDto::class);

        $name = new Name(
            $dto->getNameEn(),
            $dto->getNameEs()
        );

        $this
            ->setIden($dto->getIden())
            ->setName($name);



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return LanguageDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setIden($this->getIden())
            ->setNameEn($this->getName()->getEn())
            ->setNameEs($this->getName()->getEs());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'iden' => self::getIden(),
            'nameEn' => self::getName()->getEn(),
            'nameEs' => self::getName()->getEs()
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
     * @param \Ivoz\Provider\Domain\Model\Language\Name $name
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
     * @return \Ivoz\Provider\Domain\Model\Language\Name
     */
    public function getName()
    {
        return $this->name;
    }

    // @codeCoverageIgnoreEnd
}

