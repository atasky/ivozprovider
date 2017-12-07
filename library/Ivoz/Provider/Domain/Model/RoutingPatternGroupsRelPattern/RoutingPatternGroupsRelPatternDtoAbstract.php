<?php

namespace Ivoz\Provider\Domain\Model\RoutingPatternGroupsRelPattern;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class RoutingPatternGroupsRelPatternDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $routingPatternId;

    /**
     * @var mixed
     */
    private $routingPatternGroupId;

    /**
     * @var mixed
     */
    private $routingPattern;

    /**
     * @var mixed
     */
    private $routingPatternGroup;

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
            'routingPattern' => $this->getRoutingPattern(),
            'routingPatternGroup' => $this->getRoutingPatternGroup()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->routingPattern = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\RoutingPattern\\RoutingPattern', $this->getRoutingPatternId());
        $this->routingPatternGroup = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\RoutingPatternGroup\\RoutingPatternGroup', $this->getRoutingPatternGroupId());
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
     * @return RoutingPatternGroupsRelPatternDtoAbstract
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
     * @param integer $routingPatternId
     *
     * @return RoutingPatternGroupsRelPatternDtoAbstract
     */
    public function setRoutingPatternId($routingPatternId)
    {
        $this->routingPatternId = $routingPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRoutingPatternId()
    {
        return $this->routingPatternId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPattern $routingPattern
     *
     * @return RoutingPatternGroupsRelPatternDtoAbstract
     */
    public function setRoutingPattern(\Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPattern $routingPattern)
    {
        $this->routingPattern = $routingPattern;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPattern
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * @param integer $routingPatternGroupId
     *
     * @return RoutingPatternGroupsRelPatternDtoAbstract
     */
    public function setRoutingPatternGroupId($routingPatternGroupId)
    {
        $this->routingPatternGroupId = $routingPatternGroupId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRoutingPatternGroupId()
    {
        return $this->routingPatternGroupId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroup $routingPatternGroup
     *
     * @return RoutingPatternGroupsRelPatternDtoAbstract
     */
    public function setRoutingPatternGroup(\Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroup $routingPatternGroup)
    {
        $this->routingPatternGroup = $routingPatternGroup;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroup
     */
    public function getRoutingPatternGroup()
    {
        return $this->routingPatternGroup;
    }
}


