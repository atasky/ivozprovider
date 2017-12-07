<?php

namespace Ivoz\Provider\Domain\Model\PricingPlansRelTargetPattern;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class PricingPlansRelTargetPatternDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $connectionCharge;

    /**
     * @var integer
     */
    private $periodTime;

    /**
     * @var string
     */
    private $perPeriodCharge;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $pricingPlanId;

    /**
     * @var mixed
     */
    private $targetPatternId;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $pricingPlan;

    /**
     * @var mixed
     */
    private $targetPattern;

    /**
     * @var mixed
     */
    private $brand;

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
            'connectionCharge' => $this->getConnectionCharge(),
            'periodTime' => $this->getPeriodTime(),
            'perPeriodCharge' => $this->getPerPeriodCharge(),
            'id' => $this->getId(),
            'pricingPlan' => $this->getPricingPlan(),
            'targetPattern' => $this->getTargetPattern(),
            'brand' => $this->getBrand()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->pricingPlan = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\PricingPlan\\PricingPlan', $this->getPricingPlanId());
        $this->targetPattern = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\TargetPattern\\TargetPattern', $this->getTargetPatternId());
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $connectionCharge
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
     */
    public function setConnectionCharge($connectionCharge)
    {
        $this->connectionCharge = $connectionCharge;

        return $this;
    }

    /**
     * @return string
     */
    public function getConnectionCharge()
    {
        return $this->connectionCharge;
    }

    /**
     * @param integer $periodTime
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
     */
    public function setPeriodTime($periodTime)
    {
        $this->periodTime = $periodTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriodTime()
    {
        return $this->periodTime;
    }

    /**
     * @param string $perPeriodCharge
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
     */
    public function setPerPeriodCharge($perPeriodCharge)
    {
        $this->perPeriodCharge = $perPeriodCharge;

        return $this;
    }

    /**
     * @return string
     */
    public function getPerPeriodCharge()
    {
        return $this->perPeriodCharge;
    }

    /**
     * @param integer $id
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
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
     * @param integer $pricingPlanId
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
     */
    public function setPricingPlanId($pricingPlanId)
    {
        $this->pricingPlanId = $pricingPlanId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPricingPlanId()
    {
        return $this->pricingPlanId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\PricingPlan\PricingPlan $pricingPlan
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
     */
    public function setPricingPlan(\Ivoz\Provider\Domain\Model\PricingPlan\PricingPlan $pricingPlan)
    {
        $this->pricingPlan = $pricingPlan;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PricingPlan\PricingPlan
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * @param integer $targetPatternId
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
     */
    public function setTargetPatternId($targetPatternId)
    {
        $this->targetPatternId = $targetPatternId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTargetPatternId()
    {
        return $this->targetPatternId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\TargetPattern\TargetPattern $targetPattern
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
     */
    public function setTargetPattern(\Ivoz\Provider\Domain\Model\TargetPattern\TargetPattern $targetPattern)
    {
        $this->targetPattern = $targetPattern;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\TargetPattern\TargetPattern
     */
    public function getTargetPattern()
    {
        return $this->targetPattern;
    }

    /**
     * @param integer $brandId
     *
     * @return PricingPlansRelTargetPatternDtoAbstract
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
     * @return PricingPlansRelTargetPatternDtoAbstract
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
}


