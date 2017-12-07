<?php

namespace Ivoz\Provider\Domain\Model\OutgoingDdiRulesPattern;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class OutgoingDdiRulesPatternDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $action;

    /**
     * @var integer
     */
    private $priority = '1';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $outgoingDdiRuleId;

    /**
     * @var mixed
     */
    private $matchListId;

    /**
     * @var mixed
     */
    private $forcedDdiId;

    /**
     * @var mixed
     */
    private $outgoingDdiRule;

    /**
     * @var mixed
     */
    private $matchList;

    /**
     * @var mixed
     */
    private $forcedDdi;

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
            'action' => $this->getAction(),
            'priority' => $this->getPriority(),
            'id' => $this->getId(),
            'outgoingDdiRule' => $this->getOutgoingDdiRule(),
            'matchList' => $this->getMatchList(),
            'forcedDdi' => $this->getForcedDdi()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->outgoingDdiRule = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\OutgoingDdiRule\\OutgoingDdiRule', $this->getOutgoingDdiRuleId());
        $this->matchList = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\MatchList\\MatchList', $this->getMatchListId());
        $this->forcedDdi = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Ddi\\Ddi', $this->getForcedDdiId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $action
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
     */
    public function setAction($action)
    {
        $this->action = $action;

        return $this;
    }

    /**
     * @return string
     */
    public function getAction()
    {
        return $this->action;
    }

    /**
     * @param integer $priority
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
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
     * @param integer $id
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
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
     * @param integer $outgoingDdiRuleId
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
     */
    public function setOutgoingDdiRuleId($outgoingDdiRuleId)
    {
        $this->outgoingDdiRuleId = $outgoingDdiRuleId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingDdiRuleId()
    {
        return $this->outgoingDdiRuleId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRule $outgoingDdiRule
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
     */
    public function setOutgoingDdiRule(\Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRule $outgoingDdiRule)
    {
        $this->outgoingDdiRule = $outgoingDdiRule;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\OutgoingDdiRule\OutgoingDdiRule
     */
    public function getOutgoingDdiRule()
    {
        return $this->outgoingDdiRule;
    }

    /**
     * @param integer $matchListId
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
     */
    public function setMatchListId($matchListId)
    {
        $this->matchListId = $matchListId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchListId()
    {
        return $this->matchListId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchList $matchList
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
     */
    public function setMatchList(\Ivoz\Provider\Domain\Model\MatchList\MatchList $matchList)
    {
        $this->matchList = $matchList;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchList
     */
    public function getMatchList()
    {
        return $this->matchList;
    }

    /**
     * @param integer $forcedDdiId
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
     */
    public function setForcedDdiId($forcedDdiId)
    {
        $this->forcedDdiId = $forcedDdiId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getForcedDdiId()
    {
        return $this->forcedDdiId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Ddi\Ddi $forcedDdi
     *
     * @return OutgoingDdiRulesPatternDtoAbstract
     */
    public function setForcedDdi(\Ivoz\Provider\Domain\Model\Ddi\Ddi $forcedDdi)
    {
        $this->forcedDdi = $forcedDdi;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Ddi\Ddi
     */
    public function getForcedDdi()
    {
        return $this->forcedDdi;
    }
}


