<?php

namespace Ivoz\Provider\Domain\Model\HolidayDate;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class HolidayDateDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var \DateTime
     */
    private $eventDate;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $calendarId;

    /**
     * @var mixed
     */
    private $locutionId;

    /**
     * @var mixed
     */
    private $calendar;

    /**
     * @var mixed
     */
    private $locution;

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return $this->__toArray();
    }

    /**
     * @return void
     */
    public function denormalize(array $data, string $context)
    {
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => $this->getName(),
            'eventDate' => $this->getEventDate(),
            'id' => $this->getId(),
            'calendar' => $this->getCalendar(),
            'locution' => $this->getLocution()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->calendar = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Calendar\\Calendar', $this->getCalendarId());
        $this->locution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getLocutionId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return HolidayDateDtoAbstract
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param \DateTime $eventDate
     *
     * @return HolidayDateDtoAbstract
     */
    public function setEventDate($eventDate)
    {
        $this->eventDate = $eventDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEventDate()
    {
        return $this->eventDate;
    }

    /**
     * @param integer $id
     *
     * @return HolidayDateDtoAbstract
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $calendarId
     *
     * @return HolidayDateDtoAbstract
     */
    public function setCalendarId($calendarId)
    {
        $this->calendarId = $calendarId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCalendarId()
    {
        return $this->calendarId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Calendar\Calendar $calendar
     *
     * @return HolidayDateDtoAbstract
     */
    public function setCalendar(\Ivoz\Provider\Domain\Model\Calendar\Calendar $calendar)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Calendar\Calendar
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @param integer $locutionId
     *
     * @return HolidayDateDtoAbstract
     */
    public function setLocutionId($locutionId)
    {
        $this->locutionId = $locutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLocutionId()
    {
        return $this->locutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $locution
     *
     * @return HolidayDateDtoAbstract
     */
    public function setLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $locution)
    {
        $this->locution = $locution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getLocution()
    {
        return $this->locution;
    }
}


