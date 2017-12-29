<?php

namespace Ivoz\Provider\Domain\Model\ConditionalRoutesConditionsRelCalendar;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * ConditionalRoutesConditionsRelCalendarAbstract
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionsRelCalendarAbstract
{
    /**
     * @var \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    protected $condition;

    /**
     * @var \Ivoz\Provider\Domain\Model\Calendar\CalendarInterface
     */
    protected $calendar;


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
     * @return ConditionalRoutesConditionsRelCalendarDto
     */
    public static function createDto()
    {
        return new ConditionalRoutesConditionsRelCalendarDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelCalendarDto
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelCalendarDto::class);

        $self = new static();

        $self
            ->setCondition($dto->getCondition())
            ->setCalendar($dto->getCalendar())
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
         * @var $dto ConditionalRoutesConditionsRelCalendarDto
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelCalendarDto::class);

        $this
            ->setCondition($dto->getCondition())
            ->setCalendar($dto->getCalendar());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return ConditionalRoutesConditionsRelCalendarDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setCondition($this->getCondition() ? $this->getCondition()->toDto() : null)
            ->setCalendar($this->getCalendar() ? $this->getCalendar()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'conditionId' => self::getCondition() ? self::getCondition()->getId() : null,
            'calendarId' => self::getCalendar() ? self::getCalendar()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set condition
     *
     * @param \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition
     *
     * @return self
     */
    public function setCondition(\Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition = null)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * Get condition
     *
     * @return \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * Set calendar
     *
     * @param \Ivoz\Provider\Domain\Model\Calendar\CalendarInterface $calendar
     *
     * @return self
     */
    public function setCalendar(\Ivoz\Provider\Domain\Model\Calendar\CalendarInterface $calendar)
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



    // @codeCoverageIgnoreEnd
}

