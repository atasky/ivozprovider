<?php

namespace Ivoz\Provider\Domain\Model\HolidayDate;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * HolidayDateAbstract
 * @codeCoverageIgnore
 */
abstract class HolidayDateAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var \DateTime
     */
    protected $eventDate;

    /**
     * @var \Ivoz\Provider\Domain\Model\Calendar\CalendarInterface
     */
    protected $calendar;

    /**
     * @var \Ivoz\Provider\Domain\Model\Locution\LocutionInterface
     */
    protected $locution;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($name, $eventDate)
    {
        $this->setName($name);
        $this->setEventDate($eventDate);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return HolidayDateDto
     */
    public static function createDto()
    {
        return new HolidayDateDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto HolidayDateDto
         */
        Assertion::isInstanceOf($dto, HolidayDateDto::class);

        $self = new static(
            $dto->getName(),
            $dto->getEventDate());

        $self
            ->setCalendar($dto->getCalendar())
            ->setLocution($dto->getLocution())
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
         * @var $dto HolidayDateDto
         */
        Assertion::isInstanceOf($dto, HolidayDateDto::class);

        $this
            ->setName($dto->getName())
            ->setEventDate($dto->getEventDate())
            ->setCalendar($dto->getCalendar())
            ->setLocution($dto->getLocution());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return HolidayDateDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setName($this->getName())
            ->setEventDate($this->getEventDate())
            ->setCalendar($this->getCalendar() ? $this->getCalendar()->toDto() : null)
            ->setLocution($this->getLocution() ? $this->getLocution()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => self::getName(),
            'eventDate' => self::getEventDate(),
            'calendarId' => self::getCalendar() ? self::getCalendar()->getId() : null,
            'locutionId' => self::getLocution() ? self::getLocution()->getId() : null
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
        Assertion::maxLength($name, 50, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');

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
     * Set eventDate
     *
     * @param \DateTime $eventDate
     *
     * @return self
     */
    public function setEventDate($eventDate)
    {
        Assertion::notNull($eventDate, 'eventDate value "%s" is null, but non null value was expected.');

        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * Get eventDate
     *
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * Set calendar
     *
     * @param \Ivoz\Provider\Domain\Model\Calendar\CalendarInterface $calendar
     *
     * @return self
     */
    public function setCalendar(\Ivoz\Provider\Domain\Model\Calendar\CalendarInterface $calendar = null)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * Get calendar
     *
     * @return \Ivoz\Provider\Domain\Model\Calendar\CalendarInterface
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * Set locution
     *
     * @param \Ivoz\Provider\Domain\Model\Locution\LocutionInterface $locution
     *
     * @return self
     */
    public function setLocution(\Ivoz\Provider\Domain\Model\Locution\LocutionInterface $locution = null)
    {
        $this->locution = $locution;

        return $this;
    }

    /**
     * Get locution
     *
     * @return \Ivoz\Provider\Domain\Model\Locution\LocutionInterface
     */
    public function getLocution()
    {
        return $this->locution;
    }



    // @codeCoverageIgnoreEnd
}

