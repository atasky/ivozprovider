<?php

namespace Ivoz\Provider\Domain\Model\OutgoingRouting;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class OutgoingRoutingDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $type = 'group';

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
    private $brandId;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $peeringContractId;

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
    private $brand;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $peeringContract;

    /**
     * @var mixed
     */
    private $routingPattern;

    /**
     * @var mixed
     */
    private $routingPatternGroup;

    /**
     * @var array|null
     */
    private $lcrRules = null;

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
            'priority' => $this->getPriority(),
            'weight' => $this->getWeight(),
            'id' => $this->getId(),
            'brand' => $this->getBrand(),
            'company' => $this->getCompany(),
            'peeringContract' => $this->getPeeringContract(),
            'routingPattern' => $this->getRoutingPattern(),
            'routingPatternGroup' => $this->getRoutingPatternGroup(),
            'lcrRules' => $this->getLcrRules()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->peeringContract = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
        $this->routingPattern = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\RoutingPattern\\RoutingPattern', $this->getRoutingPatternId());
        $this->routingPatternGroup = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\RoutingPatternGroup\\RoutingPatternGroup', $this->getRoutingPatternGroupId());
        if (!is_null($this->lcrRules)) {
            $items = $this->getLcrRules();
            $this->lcrRules = [];
            foreach ($items as $item) {
                $this->lcrRules[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\LcrRule\\LcrRule',
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
        $this->lcrRules = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\LcrRule\\LcrRule',
            $this->lcrRules
        );
    }

    /**
     * @param string $type
     *
     * @return OutgoingRoutingDtoAbstract
     */
    public function setType($type = null)
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
     * @param integer $priority
     *
     * @return OutgoingRoutingDtoAbstract
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
     * @return OutgoingRoutingDtoAbstract
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
     * @return OutgoingRoutingDtoAbstract
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
     * @return OutgoingRoutingDtoAbstract
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
     * @return OutgoingRoutingDtoAbstract
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
     * @param integer $companyId
     *
     * @return OutgoingRoutingDtoAbstract
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Company\Company $company
     *
     * @return OutgoingRoutingDtoAbstract
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return OutgoingRoutingDtoAbstract
     */
    public function setPeeringContractId($peeringContractId)
    {
        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContract $peeringContract
     *
     * @return OutgoingRoutingDtoAbstract
     */
    public function setPeeringContract(\Ivoz\Provider\Domain\Model\PeeringContract\PeeringContract $peeringContract)
    {
        $this->peeringContract = $peeringContract;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }

    /**
     * @param integer $routingPatternId
     *
     * @return OutgoingRoutingDtoAbstract
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
     * @return OutgoingRoutingDtoAbstract
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
     * @return OutgoingRoutingDtoAbstract
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
     * @return OutgoingRoutingDtoAbstract
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

    /**
     * @param array $lcrRules
     *
     * @return OutgoingRoutingDtoAbstract
     */
    public function setLcrRules($lcrRules)
    {
        $this->lcrRules = $lcrRules;

        return $this;
    }

    /**
     * @return array
     */
    public function getLcrRules()
    {
        return $this->lcrRules;
    }
}


