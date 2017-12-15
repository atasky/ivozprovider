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
     * @var \Ivoz\Provider\Domain\Model\Calendar\CalendarDto | null
     */
    private $calendar;

    /**
     * @var \Ivoz\Provider\Domain\Model\Locution\LocutionDto | null
     */
    private $locution;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @inheritdoc
     */
    public function normalize(string $context)
    {
        return $this->toArray();
    }

    /**
     * @inheritdoc
     */
    public function denormalize(array $data, string $context)
    {
    }

    /**
     * @inheritdoc
     */
    public static function getPropertyMap(string $context = '')
    {
        if ($context === self::CONTEXT_SIMPLE) {
            return ['id'];
        }

        return [
            'name',
            'eventDate',
            'id',
            'calendar',
            'locution'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
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
     * @return static
     */
    public function setName($name = null)
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
     * @return static
     */
    public function setEventDate($eventDate = null)
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
     * @return static
     */
    public function setId($id = null)
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
     * @param \Ivoz\Provider\Domain\Model\Calendar\CalendarDto $calendar
     *
     * @return static
     */
    public function setCalendar(\Ivoz\Provider\Domain\Model\Calendar\CalendarDto $calendar = null)
    {
        $this->calendar = $calendar;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Calendar\CalendarDto
     */
    public function getCalendar()
    {
        return $this->calendar;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\LocutionDto $locution
     *
     * @return static
     */
    public function setLocution(\Ivoz\Provider\Domain\Model\Locution\LocutionDto $locution = null)
    {
        $this->locution = $locution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\LocutionDto
     */
    public function getLocution()
    {
        return $this->locution;
    }
}


