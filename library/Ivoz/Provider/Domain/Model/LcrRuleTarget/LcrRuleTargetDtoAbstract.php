<?php

namespace Ivoz\Provider\Domain\Model\LcrRuleTarget;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class LcrRuleTargetDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $lcrId = '1';

    /**
     * @var integer
     */
    private $priority;

    /**
     * @var integer
     */
    private $weight = '1';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $ruleId;

    /**
     * @var mixed
     */
    private $gwId;

    /**
     * @var mixed
     */
    private $outgoingRoutingId;

    /**
     * @var mixed
     */
    private $rule;

    /**
     * @var mixed
     */
    private $gw;

    /**
     * @var mixed
     */
    private $outgoingRouting;

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
            'lcrId' => $this->getLcrId(),
            'priority' => $this->getPriority(),
            'weight' => $this->getWeight(),
            'id' => $this->getId(),
            'rule' => $this->getRule(),
            'gw' => $this->getGw(),
            'outgoingRouting' => $this->getOutgoingRouting()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->rule = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\LcrRule\\LcrRule', $this->getRuleId());
        $this->gw = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\LcrGateway\\LcrGateway', $this->getGwId());
        $this->outgoingRouting = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\OutgoingRouting\\OutgoingRouting', $this->getOutgoingRoutingId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $lcrId
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setLcrId($lcrId)
    {
        $this->lcrId = $lcrId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLcrId()
    {
        return $this->lcrId;
    }

    /**
     * @param integer $priority
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setPriority($priority)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param integer $weight
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setWeight($weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param integer $id
     *
     * @return LcrRuleTargetDtoAbstract
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
     * @param integer $ruleId
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setRuleId($ruleId)
    {
        $this->ruleId = $ruleId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRuleId()
    {
        return $this->ruleId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\LcrRule\LcrRule $rule
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setRule(\Ivoz\Provider\Domain\Model\LcrRule\LcrRule $rule)
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\LcrRule\LcrRule
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * @param integer $gwId
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setGwId($gwId)
    {
        $this->gwId = $gwId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getGwId()
    {
        return $this->gwId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\LcrGateway\LcrGateway $gw
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setGw(\Ivoz\Provider\Domain\Model\LcrGateway\LcrGateway $gw)
    {
        $this->gw = $gw;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\LcrGateway\LcrGateway
     */
    public function getGw()
    {
        return $this->gw;
    }

    /**
     * @param integer $outgoingRoutingId
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setOutgoingRoutingId($outgoingRoutingId)
    {
        $this->outgoingRoutingId = $outgoingRoutingId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingRoutingId()
    {
        return $this->outgoingRoutingId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRouting $outgoingRouting
     *
     * @return LcrRuleTargetDtoAbstract
     */
    public function setOutgoingRouting(\Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRouting $outgoingRouting)
    {
        $this->outgoingRouting = $outgoingRouting;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRouting
     */
    public function getOutgoingRouting()
    {
        return $this->outgoingRouting;
    }
}


