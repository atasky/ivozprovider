<?php

namespace Ivoz\Provider\Domain\Model\IvrEntry;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * IvrEntryAbstract
 * @codeCoverageIgnore
 */
abstract class IvrEntryAbstract
{
    /**
     * @var string
     */
    protected $entry;

    /**
     * comment: enum:number|extension|voicemail|conditional
     * @var string
     */
    protected $routeType;

    /**
     * @var string
     */
    protected $numberValue;

    /**
     * @var \Ivoz\Provider\Domain\Model\Ivr\IvrInterface
     */
    protected $ivr;

    /**
     * @var \Ivoz\Provider\Domain\Model\Locution\LocutionInterface
     */
    protected $welcomeLocution;

    /**
     * @var \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface
     */
    protected $extension;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    protected $voiceMailUser;

    /**
     * @var \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRouteInterface
     */
    protected $conditionalRoute;

    /**
     * @var \Ivoz\Provider\Domain\Model\Country\CountryInterface
     */
    protected $numberCountry;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($entry, $routeType)
    {
        $this->setEntry($entry);
        $this->setRouteType($routeType);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return IvrEntryDto
     */
    public static function createDto()
    {
        return new IvrEntryDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IvrEntryDto
         */
        Assertion::isInstanceOf($dto, IvrEntryDto::class);

        $self = new static(
            $dto->getEntry(),
            $dto->getRouteType());

        $self
            ->setNumberValue($dto->getNumberValue())
            ->setIvr($dto->getIvr())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setExtension($dto->getExtension())
            ->setVoiceMailUser($dto->getVoiceMailUser())
            ->setConditionalRoute($dto->getConditionalRoute())
            ->setNumberCountry($dto->getNumberCountry())
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
         * @var $dto IvrEntryDto
         */
        Assertion::isInstanceOf($dto, IvrEntryDto::class);

        $this
            ->setEntry($dto->getEntry())
            ->setRouteType($dto->getRouteType())
            ->setNumberValue($dto->getNumberValue())
            ->setIvr($dto->getIvr())
            ->setWelcomeLocution($dto->getWelcomeLocution())
            ->setExtension($dto->getExtension())
            ->setVoiceMailUser($dto->getVoiceMailUser())
            ->setConditionalRoute($dto->getConditionalRoute())
            ->setNumberCountry($dto->getNumberCountry());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return IvrEntryDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setEntry($this->getEntry())
            ->setRouteType($this->getRouteType())
            ->setNumberValue($this->getNumberValue())
            ->setIvr($this->getIvr() ? $this->getIvr()->toDto() : null)
            ->setWelcomeLocution($this->getWelcomeLocution() ? $this->getWelcomeLocution()->toDto() : null)
            ->setExtension($this->getExtension() ? $this->getExtension()->toDto() : null)
            ->setVoiceMailUser($this->getVoiceMailUser() ? $this->getVoiceMailUser()->toDto() : null)
            ->setConditionalRoute($this->getConditionalRoute() ? $this->getConditionalRoute()->toDto() : null)
            ->setNumberCountry($this->getNumberCountry() ? $this->getNumberCountry()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'entry' => self::getEntry(),
            'routeType' => self::getRouteType(),
            'numberValue' => self::getNumberValue(),
            'ivrId' => self::getIvr() ? self::getIvr()->getId() : null,
            'welcomeLocutionId' => self::getWelcomeLocution() ? self::getWelcomeLocution()->getId() : null,
            'extensionId' => self::getExtension() ? self::getExtension()->getId() : null,
            'voiceMailUserId' => self::getVoiceMailUser() ? self::getVoiceMailUser()->getId() : null,
            'conditionalRouteId' => self::getConditionalRoute() ? self::getConditionalRoute()->getId() : null,
            'numberCountryId' => self::getNumberCountry() ? self::getNumberCountry()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set entry
     *
     * @param string $entry
     *
     * @return self
     */
    public function setEntry($entry)
    {
        Assertion::notNull($entry, 'entry value "%s" is null, but non null value was expected.');
        Assertion::maxLength($entry, 40, 'entry value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->entry = $entry;

        return $this;
    }

    /**
     * Get entry
     *
     * @return string
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * Set routeType
     *
     * @param string $routeType
     *
     * @return self
     */
    public function setRouteType($routeType)
    {
        Assertion::notNull($routeType, 'routeType value "%s" is null, but non null value was expected.');
        Assertion::maxLength($routeType, 25, 'routeType value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        Assertion::choice($routeType, array (
          0 => 'number',
          1 => 'extension',
          2 => 'voicemail',
          3 => 'conditional',
        ), 'routeTypevalue "%s" is not an element of the valid values: %s');

        $this->routeType = $routeType;

        return $this;
    }

    /**
     * Get routeType
     *
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * Set numberValue
     *
     * @param string $numberValue
     *
     * @return self
     */
    public function setNumberValue($numberValue = null)
    {
        if (!is_null($numberValue)) {
            Assertion::maxLength($numberValue, 25, 'numberValue value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * Set ivr
     *
     * @param \Ivoz\Provider\Domain\Model\Ivr\IvrInterface $ivr
     *
     * @return self
     */
    public function setIvr(\Ivoz\Provider\Domain\Model\Ivr\IvrInterface $ivr = null)
    {
        $this->ivr = $ivr;

        return $this;
    }

    /**
     * Get ivr
     *
     * @return \Ivoz\Provider\Domain\Model\Ivr\IvrInterface
     */
    public function getIvr()
    {
        return $this->ivr;
    }

    /**
     * Set welcomeLocution
     *
     * @param \Ivoz\Provider\Domain\Model\Locution\LocutionInterface $welcomeLocution
     *
     * @return self
     */
    public function setWelcomeLocution(\Ivoz\Provider\Domain\Model\Locution\LocutionInterface $welcomeLocution = null)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * Get welcomeLocution
     *
     * @return \Ivoz\Provider\Domain\Model\Locution\LocutionInterface
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * Set extension
     *
     * @param \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return self
     */
    public function setExtension(\Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * Set voiceMailUser
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $voiceMailUser
     *
     * @return self
     */
    public function setVoiceMailUser(\Ivoz\Provider\Domain\Model\User\UserInterface $voiceMailUser = null)
    {
        $this->voiceMailUser = $voiceMailUser;

        return $this;
    }

    /**
     * Get voiceMailUser
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    public function getVoiceMailUser()
    {
        return $this->voiceMailUser;
    }

    /**
     * Set conditionalRoute
     *
     * @param \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute
     *
     * @return self
     */
    public function setConditionalRoute(\Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute = null)
    {
        $this->conditionalRoute = $conditionalRoute;

        return $this;
    }

    /**
     * Get conditionalRoute
     *
     * @return \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRouteInterface
     */
    public function getConditionalRoute()
    {
        return $this->conditionalRoute;
    }

    /**
     * Set numberCountry
     *
     * @param \Ivoz\Provider\Domain\Model\Country\CountryInterface $numberCountry
     *
     * @return self
     */
    public function setNumberCountry(\Ivoz\Provider\Domain\Model\Country\CountryInterface $numberCountry = null)
    {
        $this->numberCountry = $numberCountry;

        return $this;
    }

    /**
     * Get numberCountry
     *
     * @return \Ivoz\Provider\Domain\Model\Country\CountryInterface
     */
    public function getNumberCountry()
    {
        return $this->numberCountry;
    }



    // @codeCoverageIgnoreEnd
}

