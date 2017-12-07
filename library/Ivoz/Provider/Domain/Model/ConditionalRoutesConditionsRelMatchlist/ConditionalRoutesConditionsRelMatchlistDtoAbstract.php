<?php

namespace Ivoz\Provider\Domain\Model\ConditionalRoutesConditionsRelMatchlist;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionsRelMatchlistDtoAbstract implements DataTransferObjectInterface
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
    private $matchlistId;

    /**
     * @var mixed
     */
    private $condition;

    /**
     * @var mixed
     */
    private $matchlist;

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
            'matchlist' => $this->getMatchlist()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->condition = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesCondition\\ConditionalRoutesCondition', $this->getConditionId());
        $this->matchlist = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\MatchList\\MatchList', $this->getMatchlistId());
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
     * @return ConditionalRoutesConditionsRelMatchlistDtoAbstract
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
     * @return ConditionalRoutesConditionsRelMatchlistDtoAbstract
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
     * @return ConditionalRoutesConditionsRelMatchlistDtoAbstract
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
     * @param integer $matchlistId
     *
     * @return ConditionalRoutesConditionsRelMatchlistDtoAbstract
     */
    public function setMatchlistId($matchlistId)
    {
        $this->matchlistId = $matchlistId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchlistId()
    {
        return $this->matchlistId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchList $matchlist
     *
     * @return ConditionalRoutesConditionsRelMatchlistDtoAbstract
     */
    public function setMatchlist(\Ivoz\Provider\Domain\Model\MatchList\MatchList $matchlist)
    {
        $this->matchlist = $matchlist;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchList
     */
    public function getMatchlist()
    {
        return $this->matchlist;
    }
}


