<?php

namespace Ivoz\Provider\Domain\Model\LcrRule;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class LcrRuleDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $lcrId = '1';

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var string
     */
    private $fromUri;

    /**
     * @var string
     */
    private $requestUri;

    /**
     * @var integer
     */
    private $stopper = '0';

    /**
     * @var integer
     */
    private $enabled = '1';

    /**
     * @var string
     */
    private $tag;

    /**
     * @var string
     */
    private $description = '';

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
    private $outgoingRoutingId;

    /**
     * @var mixed
     */
    private $routingPattern;

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
            'prefix' => $this->getPrefix(),
            'fromUri' => $this->getFromUri(),
            'requestUri' => $this->getRequestUri(),
            'stopper' => $this->getStopper(),
            'enabled' => $this->getEnabled(),
            'tag' => $this->getTag(),
            'description' => $this->getDescription(),
            'id' => $this->getId(),
            'routingPattern' => $this->getRoutingPattern(),
            'outgoingRouting' => $this->getOutgoingRouting()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->routingPattern = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\RoutingPattern\\RoutingPattern', $this->getRoutingPatternId());
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
     * @return LcrRuleDtoAbstract
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
     * @param string $prefix
     *
     * @return LcrRuleDtoAbstract
     */
    public function setPrefix($prefix = null)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param string $fromUri
     *
     * @return LcrRuleDtoAbstract
     */
    public function setFromUri($fromUri = null)
    {
        $this->fromUri = $fromUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromUri()
    {
        return $this->fromUri;
    }

    /**
     * @param string $requestUri
     *
     * @return LcrRuleDtoAbstract
     */
    public function setRequestUri($requestUri = null)
    {
        $this->requestUri = $requestUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * @param integer $stopper
     *
     * @return LcrRuleDtoAbstract
     */
    public function setStopper($stopper)
    {
        $this->stopper = $stopper;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStopper()
    {
        return $this->stopper;
    }

    /**
     * @param integer $enabled
     *
     * @return LcrRuleDtoAbstract
     */
    public function setEnabled($enabled)
    {
        $this->enabled = $enabled;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * @param string $tag
     *
     * @return LcrRuleDtoAbstract
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * @param string $description
     *
     * @return LcrRuleDtoAbstract
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
     * @param integer $id
     *
     * @return LcrRuleDtoAbstract
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
     * @return LcrRuleDtoAbstract
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
     * @return LcrRuleDtoAbstract
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
     * @param integer $outgoingRoutingId
     *
     * @return LcrRuleDtoAbstract
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
     * @return LcrRuleDtoAbstract
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


