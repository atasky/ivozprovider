<?php

namespace Ivoz\Provider\Domain\Model\PeeringContract;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class PeeringContractDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $name;

    /**
     * @var boolean
     */
    private $externallyRated = '0';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $transformationRuleSetId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $transformationRuleSet;

    /**
     * @var array|null
     */
    private $outgoingRoutings = null;

    /**
     * @var array|null
     */
    private $peerServers = null;

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
            'description' => $this->getDescription(),
            'name' => $this->getName(),
            'externallyRated' => $this->getExternallyRated(),
            'id' => $this->getId(),
            'brand' => $this->getBrand(),
            'transformationRuleSet' => $this->getTransformationRuleSet(),
            'outgoingRoutings' => $this->getOutgoingRoutings(),
            'peerServers' => $this->getPeerServers()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->transformationRuleSet = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\TransformationRuleSet\\TransformationRuleSet', $this->getTransformationRuleSetId());
        if (!is_null($this->outgoingRoutings)) {
            $items = $this->getOutgoingRoutings();
            $this->outgoingRoutings = [];
            foreach ($items as $item) {
                $this->outgoingRoutings[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\OutgoingRouting\\OutgoingRouting',
                    $item->getId() ?? $item
                );
            }
        }

        if (!is_null($this->peerServers)) {
            $items = $this->getPeerServers();
            $this->peerServers = [];
            foreach ($items as $item) {
                $this->peerServers[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\PeerServer\\PeerServer',
                    $item->getId() ?? $item
                );
            }
        }

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {
        $this->outgoingRoutings = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\OutgoingRouting\\OutgoingRouting',
            $this->outgoingRoutings
        );
        $this->peerServers = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\PeerServer\\PeerServer',
            $this->peerServers
        );
    }

    /**
     * @param string $description
     *
     * @return PeeringContractDtoAbstract
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
     * @param string $name
     *
     * @return PeeringContractDtoAbstract
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param boolean $externallyRated
     *
     * @return PeeringContractDtoAbstract
     */
    public function setExternallyRated($externallyRated = null)
    {
        $this->externallyRated = $externallyRated;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getExternallyRated()
    {
        return $this->externallyRated;
    }

    /**
     * @param integer $id
     *
     * @return PeeringContractDtoAbstract
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
     * @param integer $brandId
     *
     * @return PeeringContractDtoAbstract
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Brand\Brand $brand
     *
     * @return PeeringContractDtoAbstract
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $transformationRuleSetId
     *
     * @return PeeringContractDtoAbstract
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
     * @return PeeringContractDtoAbstract
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

    /**
     * @param array $outgoingRoutings
     *
     * @return PeeringContractDtoAbstract
     */
    public function setOutgoingRoutings($outgoingRoutings)
    {
        $this->outgoingRoutings = $outgoingRoutings;

        return $this;
    }

    /**
     * @return array
     */
    public function getOutgoingRoutings()
    {
        return $this->outgoingRoutings;
    }

    /**
     * @param array $peerServers
     *
     * @return PeeringContractDtoAbstract
     */
    public function setPeerServers($peerServers)
    {
        $this->peerServers = $peerServers;

        return $this;
    }

    /**
     * @return array
     */
    public function getPeerServers()
    {
        return $this->peerServers;
    }
}


