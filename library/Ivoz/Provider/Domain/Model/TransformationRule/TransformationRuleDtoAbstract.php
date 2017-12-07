<?php

namespace Ivoz\Provider\Domain\Model\TransformationRule;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class TransformationRuleDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var integer
     */
    private $priority;

    /**
     * @var string
     */
    private $matchExpr;

    /**
     * @var string
     */
    private $replaceExpr;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $transformationRuleSetId;

    /**
     * @var mixed
     */
    private $transformationRuleSet;

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
            'type' => $this->getType(),
            'description' => $this->getDescription(),
            'priority' => $this->getPriority(),
            'matchExpr' => $this->getMatchExpr(),
            'replaceExpr' => $this->getReplaceExpr(),
            'id' => $this->getId(),
            'transformationRuleSet' => $this->getTransformationRuleSet()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->transformationRuleSet = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\TransformationRuleSet\\TransformationRuleSet', $this->getTransformationRuleSetId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $type
     *
     * @return TransformationRuleDtoAbstract
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $description
     *
     * @return TransformationRuleDtoAbstract
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param integer $priority
     *
     * @return TransformationRuleDtoAbstract
     */
    public function setPriority($priority = null)
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
     * @param string $matchExpr
     *
     * @return TransformationRuleDtoAbstract
     */
    public function setMatchExpr($matchExpr = null)
    {
        $this->matchExpr = $matchExpr;

        return $this;
    }

    /**
     * @return string
     */
    public function getMatchExpr()
    {
        return $this->matchExpr;
    }

    /**
     * @param string $replaceExpr
     *
     * @return TransformationRuleDtoAbstract
     */
    public function setReplaceExpr($replaceExpr = null)
    {
        $this->replaceExpr = $replaceExpr;

        return $this;
    }

    /**
     * @return string
     */
    public function getReplaceExpr()
    {
        return $this->replaceExpr;
    }

    /**
     * @param integer $id
     *
     * @return TransformationRuleDtoAbstract
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
     * @param integer $transformationRuleSetId
     *
     * @return TransformationRuleDtoAbstract
     */
    public function setTransformationRuleSetId($transformationRuleSetId)
    {
        $this->transformationRuleSetId = $transformationRuleSetId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTransformationRuleSetId()
    {
        return $this->transformationRuleSetId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSet $transformationRuleSet
     *
     * @return TransformationRuleDtoAbstract
     */
    public function setTransformationRuleSet(\Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSet $transformationRuleSet)
    {
        $this->transformationRuleSet = $transformationRuleSet;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSet
     */
    public function getTransformationRuleSet()
    {
        return $this->transformationRuleSet;
    }
}


