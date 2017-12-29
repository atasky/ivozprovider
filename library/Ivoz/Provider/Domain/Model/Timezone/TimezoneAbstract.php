<?php

namespace Ivoz\Provider\Domain\Model\Timezone;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * TimezoneAbstract
 * @codeCoverageIgnore
 */
abstract class TimezoneAbstract
{
    /**
     * @var string
     */
    protected $tz;

    /**
     * @var string
     */
    protected $comment = '';

    /**
     * @var Label
     */
    protected $label;

    /**
     * @var \Ivoz\Provider\Domain\Model\Country\CountryInterface
     */
    protected $country;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($tz, Label $label)
    {
        $this->setTz($tz);
        $this->setLabel($label);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return TimezoneDto
     */
    public static function createDto()
    {
        return new TimezoneDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TimezoneDto
         */
        Assertion::isInstanceOf($dto, TimezoneDto::class);

        $label = new Label(
            $dto->getLabelEn(),
            $dto->getLabelEs()
        );

        $self = new static(
            $dto->getTz(),
            $label
        );

        $self
            ->setComment($dto->getComment())
            ->setCountry($dto->getCountry())
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
         * @var $dto TimezoneDto
         */
        Assertion::isInstanceOf($dto, TimezoneDto::class);

        $label = new Label(
            $dto->getLabelEn(),
            $dto->getLabelEs()
        );

        $this
            ->setTz($dto->getTz())
            ->setComment($dto->getComment())
            ->setLabel($label)
            ->setCountry($dto->getCountry());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return TimezoneDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setTz($this->getTz())
            ->setComment($this->getComment())
            ->setLabelEn($this->getLabel()->getEn())
            ->setLabelEs($this->getLabel()->getEs())
            ->setCountry($this->getCountry() ? $this->getCountry()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'tz' => self::getTz(),
            'comment' => self::getComment(),
            'labelEn' => self::getLabel()->getEn(),
            'labelEs' => self::getLabel()->getEs(),
            'countryId' => self::getCountry() ? self::getCountry()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set tz
     *
     * @param string $tz
     *
     * @return self
     */
    public function setTz($tz)
    {
        Assertion::notNull($tz, 'tz value "%s" is null, but non null value was expected.');
        Assertion::maxLength($tz, 255, 'tz value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->tz = $tz;

        return $this;
    }

    /**
     * Get tz
     *
     * @return string
     */
    public function getTz()
    {
        return $this->tz;
    }

    /**
     * Set comment
     *
     * @param string $comment
     *
     * @return self
     */
    public function setComment($comment = null)
    {
        if (!is_null($comment)) {
            Assertion::maxLength($comment, 150, 'comment value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->comment = $comment;

        return $this;
    }

    /**
     * Get comment
     *
     * @return string
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set country
     *
     * @param \Ivoz\Provider\Domain\Model\Country\CountryInterface $country
     *
     * @return self
     */
    public function setCountry(\Ivoz\Provider\Domain\Model\Country\CountryInterface $country = null)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * Get country
     *
     * @return \Ivoz\Provider\Domain\Model\Country\CountryInterface
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Set label
     *
     * @param \Ivoz\Provider\Domain\Model\Timezone\Label $label
     *
     * @return self
     */
    public function setLabel(Label $label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get label
     *
     * @return \Ivoz\Provider\Domain\Model\Timezone\Label
     */
    public function getLabel()
    {
        return $this->label;
    }

    // @codeCoverageIgnoreEnd
}

