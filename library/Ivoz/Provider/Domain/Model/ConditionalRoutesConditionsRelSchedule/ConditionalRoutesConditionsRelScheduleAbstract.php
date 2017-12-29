<?php

namespace Ivoz\Provider\Domain\Model\ConditionalRoutesConditionsRelSchedule;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * ConditionalRoutesConditionsRelScheduleAbstract
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionsRelScheduleAbstract
{
    /**
     * @var \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    protected $condition;

    /**
     * @var \Ivoz\Provider\Domain\Model\Schedule\ScheduleInterface
     */
    protected $schedule;


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
     * @return ConditionalRoutesConditionsRelScheduleDto
     */
    public static function createDto()
    {
        return new ConditionalRoutesConditionsRelScheduleDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ConditionalRoutesConditionsRelScheduleDto
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelScheduleDto::class);

        $self = new static();

        $self
            ->setCondition($dto->getCondition())
            ->setSchedule($dto->getSchedule())
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
         * @var $dto ConditionalRoutesConditionsRelScheduleDto
         */
        Assertion::isInstanceOf($dto, ConditionalRoutesConditionsRelScheduleDto::class);

        $this
            ->setCondition($dto->getCondition())
            ->setSchedule($dto->getSchedule());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return ConditionalRoutesConditionsRelScheduleDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setCondition($this->getCondition() ? $this->getCondition()->toDto() : null)
            ->setSchedule($this->getSchedule() ? $this->getSchedule()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'conditionId' => self::getCondition() ? self::getCondition()->getId() : null,
            'scheduleId' => self::getSchedule() ? self::getSchedule()->getId() : null
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
     * Set schedule
     *
     * @param \Ivoz\Provider\Domain\Model\Schedule\ScheduleInterface $schedule
     *
     * @return self
     */
    public function setSchedule(\Ivoz\Provider\Domain\Model\Schedule\ScheduleInterface $schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * Get schedule
     *
     * @return \Ivoz\Provider\Domain\Model\Schedule\ScheduleInterface
     */
    public function getSchedule()
    {
        return $this->schedule;
    }



    // @codeCoverageIgnoreEnd
}

