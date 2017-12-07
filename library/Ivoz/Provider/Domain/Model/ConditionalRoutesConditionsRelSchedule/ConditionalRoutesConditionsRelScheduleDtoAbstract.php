<?php

namespace Ivoz\Provider\Domain\Model\ConditionalRoutesConditionsRelSchedule;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionsRelScheduleDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $conditionId;

    /**
     * @var mixed
     */
    private $scheduleId;

    /**
     * @var mixed
     */
    private $condition;

    /**
     * @var mixed
     */
    private $schedule;

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
            'id' => $this->getId(),
            'condition' => $this->getCondition(),
            'schedule' => $this->getSchedule()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->condition = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesCondition\\ConditionalRoutesCondition', $this->getConditionId());
        $this->schedule = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Schedule\\Schedule', $this->getScheduleId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ConditionalRoutesConditionsRelScheduleDtoAbstract
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
     * @param integer $conditionId
     *
     * @return ConditionalRoutesConditionsRelScheduleDtoAbstract
     */
    public function setConditionId($conditionId)
    {
        $this->conditionId = $conditionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConditionId()
    {
        return $this->conditionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesCondition $condition
     *
     * @return ConditionalRoutesConditionsRelScheduleDtoAbstract
     */
    public function setCondition(\Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesCondition $condition)
    {
        $this->condition = $condition;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesCondition
     */
    public function getCondition()
    {
        return $this->condition;
    }

    /**
     * @param integer $scheduleId
     *
     * @return ConditionalRoutesConditionsRelScheduleDtoAbstract
     */
    public function setScheduleId($scheduleId)
    {
        $this->scheduleId = $scheduleId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getScheduleId()
    {
        return $this->scheduleId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Schedule\Schedule $schedule
     *
     * @return ConditionalRoutesConditionsRelScheduleDtoAbstract
     */
    public function setSchedule(\Ivoz\Provider\Domain\Model\Schedule\Schedule $schedule)
    {
        $this->schedule = $schedule;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Schedule\Schedule
     */
    public function getSchedule()
    {
        return $this->schedule;
    }
}


