<?php

namespace Ivoz\Provider\Domain\Model\ExternalCallFilterRelSchedule;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ExternalCallFilterRelScheduleDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $filterId;

    /**
     * @var mixed
     */
    private $scheduleId;

    /**
     * @var mixed
     */
    private $filter;

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
            'filter' => $this->getFilter(),
            'schedule' => $this->getSchedule()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->filter = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ExternalCallFilter\\ExternalCallFilter', $this->getFilterId());
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
     * @return ExternalCallFilterRelScheduleDtoAbstract
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
     * @param integer $filterId
     *
     * @return ExternalCallFilterRelScheduleDtoAbstract
     */
    public function setFilterId($filterId)
    {
        $this->filterId = $filterId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFilterId()
    {
        return $this->filterId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter $filter
     *
     * @return ExternalCallFilterRelScheduleDtoAbstract
     */
    public function setFilter(\Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param integer $scheduleId
     *
     * @return ExternalCallFilterRelScheduleDtoAbstract
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
     * @return ExternalCallFilterRelScheduleDtoAbstract
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


