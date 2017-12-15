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
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandDto | null
     */
    private $brand;

    /**
     * @var \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetDto | null
     */
    private $transformationRuleSet;

    /**
     * @var \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingDto[] | null
     */
    private $outgoingRoutings = null;

    /**
     * @var \Ivoz\Provider\Domain\Model\PeerServer\PeerServerDto[] | null
     */
    private $peerServers = null;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @inheritdoc
     */
    public function normalize(string $context)
    {
        return $this->toArray();
    }

    /**
     * @inheritdoc
     */
    public function denormalize(array $data, string $context)
    {
    }

    /**
     * @inheritdoc
     */
    public static function getPropertyMap(string $context = '')
    {
        if ($context === self::CONTEXT_SIMPLE) {
            return ['id'];
        }

        return [
            'description',
            'name',
            'externallyRated',
            'id',
            'brand',
            'transformationRuleSet',
            'outgoingRoutings',
            'peerServers'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
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
     * @return static
     */
    public function setDescription($description = null)
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
     * @return static
     */
    public function setName($name = null)
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
     * @return static
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
     * @return static
     */
    public function setId($id = null)
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
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandDto $brand
     *
     * @return static
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandDto $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandDto
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetDto $transformationRuleSet
     *
     * @return static
     */
    public function setTransformationRuleSet(\Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetDto $transformationRuleSet = null)
    {
        $this->transformationRuleSet = $transformationRuleSet;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetDto
     */
    public function getTransformationRuleSet()
    {
        return $this->transformationRuleSet;
    }

    /**
     * @param array $outgoingRoutings
     *
     * @return static
     */
    public function setOutgoingRoutings($outgoingRoutings = null)
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
     * @return static
     */
    public function setPeerServers($peerServers = null)
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


