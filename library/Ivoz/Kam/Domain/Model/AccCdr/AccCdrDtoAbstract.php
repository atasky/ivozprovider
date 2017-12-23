<?php

namespace Ivoz\Kam\Domain\Model\AccCdr;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class AccCdrDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $proxy;

    /**
     * @var \DateTime
     */
    private $startTimeUtc = '2000-01-01 00:00:00';

    /**
     * @var \DateTime
     */
    private $endTimeUtc = 'CURRENT_TIMESTAMP';

    /**
     * @var \DateTime
     */
    private $startTime = '2000-01-01 00:00:00';

    /**
     * @var \DateTime
     */
    private $endTime = '2000-01-01 00:00:00';

    /**
     * @var float
     */
    private $duration = '0.000';

    /**
     * @var string
     */
    private $caller;

    /**
     * @var string
     */
    private $callee;

    /**
     * @var string
     */
    private $referee;

    /**
     * @var string
     */
    private $referrer;

    /**
     * @var string
     */
    private $asiden;

    /**
     * @var string
     */
    private $asaddress;

    /**
     * @var string
     */
    private $callid;

    /**
     * @var string
     */
    private $callidHash;

    /**
     * @var string
     */
    private $xcallid;

    /**
     * @var string
     */
    private $parsed = 'no';

    /**
     * @var string
     */
    private $diversion;

    /**
     * @var string
     */
    private $peeringContractId;

    /**
     * @var string
     */
    private $bounced = 'no';

    /**
     * @var boolean
     */
    private $externallyRated;

    /**
     * @var boolean
     */
    private $metered = '0';

    /**
     * @var \DateTime
     */
    private $meteringDate;

    /**
     * @var string
     */
    private $pricingPlanName;

    /**
     * @var string
     */
    private $targetPatternName;

    /**
     * @var string
     */
    private $price;

    /**
     * @var string
     */
    private $pricingPlanDetails;

    /**
     * @var string
     */
    private $direction;

    /**
     * @var \DateTime
     */
    private $reMeteringDate;

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
    private $invoiceId;

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
    private $pricingPlan;

    /**
     * @var mixed
     */
    private $targetPattern;

    /**
     * @var mixed
     */
    private $invoice;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $company;

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
            'proxy' => $this->getProxy(),
            'startTimeUtc' => $this->getStartTimeUtc(),
            'endTimeUtc' => $this->getEndTimeUtc(),
            'startTime' => $this->getStartTime(),
            'endTime' => $this->getEndTime(),
            'duration' => $this->getDuration(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'referee' => $this->getReferee(),
            'referrer' => $this->getReferrer(),
            'asiden' => $this->getAsiden(),
            'asaddress' => $this->getAsaddress(),
            'callid' => $this->getCallid(),
            'callidHash' => $this->getCallidHash(),
            'xcallid' => $this->getXcallid(),
            'parsed' => $this->getParsed(),
            'diversion' => $this->getDiversion(),
            'peeringContractId' => $this->getPeeringContractId(),
            'bounced' => $this->getBounced(),
            'externallyRated' => $this->getExternallyRated(),
            'metered' => $this->getMetered(),
            'meteringDate' => $this->getMeteringDate(),
            'pricingPlanName' => $this->getPricingPlanName(),
            'targetPatternName' => $this->getTargetPatternName(),
            'price' => $this->getPrice(),
            'pricingPlanDetails' => $this->getPricingPlanDetails(),
            'direction' => $this->getDirection(),
            'reMeteringDate' => $this->getReMeteringDate(),
            'id' => $this->getId(),
            'pricingPlanId' => $this->getPricingPlanId(),
            'targetPatternId' => $this->getTargetPatternId(),
            'invoiceId' => $this->getInvoiceId(),
            'brandId' => $this->getBrandId(),
            'companyId' => $this->getCompanyId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->pricingPlan = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\PricingPlan\\PricingPlan', $this->getPricingPlanId());
        $this->targetPattern = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\TargetPattern\\TargetPattern', $this->getTargetPatternId());
        $this->invoice = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Invoice\\Invoice', $this->getInvoiceId());
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $proxy
     *
     * @return AccCdrDtoAbstract
     */
    public function setProxy($proxy = null)
    {
        $this->proxy = $proxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxy()
    {
        return $this->proxy;
    }

    /**
     * @param \DateTime $startTimeUtc
     *
     * @return AccCdrDtoAbstract
     */
    public function setStartTimeUtc($startTimeUtc)
    {
        $this->startTimeUtc = $startTimeUtc;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTimeUtc()
    {
        return $this->startTimeUtc;
    }

    /**
     * @param \DateTime $endTimeUtc
     *
     * @return AccCdrDtoAbstract
     */
    public function setEndTimeUtc($endTimeUtc)
    {
        $this->endTimeUtc = $endTimeUtc;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTimeUtc()
    {
        return $this->endTimeUtc;
    }

    /**
     * @param \DateTime $startTime
     *
     * @return AccCdrDtoAbstract
     */
    public function setStartTime($startTime)
    {
        $this->startTime = $startTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getStartTime()
    {
        return $this->startTime;
    }

    /**
     * @param \DateTime $endTime
     *
     * @return AccCdrDtoAbstract
     */
    public function setEndTime($endTime)
    {
        $this->endTime = $endTime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getEndTime()
    {
        return $this->endTime;
    }

    /**
     * @param float $duration
     *
     * @return AccCdrDtoAbstract
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $caller
     *
     * @return AccCdrDtoAbstract
     */
    public function setCaller($caller = null)
    {
        $this->caller = $caller;

        return $this;
    }

    /**
     * @return string
     */
    public function getCaller()
    {
        return $this->caller;
    }

    /**
     * @param string $callee
     *
     * @return AccCdrDtoAbstract
     */
    public function setCallee($callee = null)
    {
        $this->callee = $callee;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallee()
    {
        return $this->callee;
    }

    /**
     * @param string $referee
     *
     * @return AccCdrDtoAbstract
     */
    public function setReferee($referee = null)
    {
        $this->referee = $referee;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferee()
    {
        return $this->referee;
    }

    /**
     * @param string $referrer
     *
     * @return AccCdrDtoAbstract
     */
    public function setReferrer($referrer = null)
    {
        $this->referrer = $referrer;

        return $this;
    }

    /**
     * @return string
     */
    public function getReferrer()
    {
        return $this->referrer;
    }

    /**
     * @param string $asiden
     *
     * @return AccCdrDtoAbstract
     */
    public function setAsiden($asiden = null)
    {
        $this->asiden = $asiden;

        return $this;
    }

    /**
     * @return string
     */
    public function getAsiden()
    {
        return $this->asiden;
    }

    /**
     * @param string $asaddress
     *
     * @return AccCdrDtoAbstract
     */
    public function setAsaddress($asaddress = null)
    {
        $this->asaddress = $asaddress;

        return $this;
    }

    /**
     * @return string
     */
    public function getAsaddress()
    {
        return $this->asaddress;
    }

    /**
     * @param string $callid
     *
     * @return AccCdrDtoAbstract
     */
    public function setCallid($callid = null)
    {
        $this->callid = $callid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param string $callidHash
     *
     * @return AccCdrDtoAbstract
     */
    public function setCallidHash($callidHash = null)
    {
        $this->callidHash = $callidHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallidHash()
    {
        return $this->callidHash;
    }

    /**
     * @param string $xcallid
     *
     * @return AccCdrDtoAbstract
     */
    public function setXcallid($xcallid = null)
    {
        $this->xcallid = $xcallid;

        return $this;
    }

    /**
     * @return string
     */
    public function getXcallid()
    {
        return $this->xcallid;
    }

    /**
     * @param string $parsed
     *
     * @return AccCdrDtoAbstract
     */
    public function setParsed($parsed = null)
    {
        $this->parsed = $parsed;

        return $this;
    }

    /**
     * @return string
     */
    public function getParsed()
    {
        return $this->parsed;
    }

    /**
     * @param string $diversion
     *
     * @return AccCdrDtoAbstract
     */
    public function setDiversion($diversion = null)
    {
        $this->diversion = $diversion;

        return $this;
    }

    /**
     * @return string
     */
    public function getDiversion()
    {
        return $this->diversion;
    }

    /**
     * @param string $peeringContractId
     *
     * @return AccCdrDtoAbstract
     */
    public function setPeeringContractId($peeringContractId = null)
    {
        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * @param string $bounced
     *
     * @return AccCdrDtoAbstract
     */
    public function setBounced($bounced)
    {
        $this->bounced = $bounced;

        return $this;
    }

    /**
     * @return string
     */
    public function getBounced()
    {
        return $this->bounced;
    }

    /**
     * @param boolean $externallyRated
     *
     * @return AccCdrDtoAbstract
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
     * @param boolean $metered
     *
     * @return AccCdrDtoAbstract
     */
    public function setMetered($metered = null)
    {
        $this->metered = $metered;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMetered()
    {
        return $this->metered;
    }

    /**
     * @param \DateTime $meteringDate
     *
     * @return AccCdrDtoAbstract
     */
    public function setMeteringDate($meteringDate = null)
    {
        $this->meteringDate = $meteringDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getMeteringDate()
    {
        return $this->meteringDate;
    }

    /**
     * @param string $pricingPlanName
     *
     * @return AccCdrDtoAbstract
     */
    public function setPricingPlanName($pricingPlanName = null)
    {
        $this->pricingPlanName = $pricingPlanName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricingPlanName()
    {
        return $this->pricingPlanName;
    }

    /**
     * @param string $targetPatternName
     *
     * @return AccCdrDtoAbstract
     */
    public function setTargetPatternName($targetPatternName = null)
    {
        $this->targetPatternName = $targetPatternName;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetPatternName()
    {
        return $this->targetPatternName;
    }

    /**
     * @param string $price
     *
     * @return AccCdrDtoAbstract
     */
    public function setPrice($price = null)
    {
        $this->price = $price;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param string $pricingPlanDetails
     *
     * @return AccCdrDtoAbstract
     */
    public function setPricingPlanDetails($pricingPlanDetails = null)
    {
        $this->pricingPlanDetails = $pricingPlanDetails;

        return $this;
    }

    /**
     * @return string
     */
    public function getPricingPlanDetails()
    {
        return $this->pricingPlanDetails;
    }

    /**
     * @param string $direction
     *
     * @return AccCdrDtoAbstract
     */
    public function setDirection($direction = null)
    {
        $this->direction = $direction;

        return $this;
    }

    /**
     * @return string
     */
    public function getDirection()
    {
        return $this->direction;
    }

    /**
     * @param \DateTime $reMeteringDate
     *
     * @return AccCdrDtoAbstract
     */
    public function setReMeteringDate($reMeteringDate = null)
    {
        $this->reMeteringDate = $reMeteringDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getReMeteringDate()
    {
        return $this->reMeteringDate;
    }

    /**
     * @param integer $id
     *
     * @return AccCdrDtoAbstract
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
     * @return AccCdrDtoAbstract
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
     * @return \Ivoz\Provider\Domain\Model\PricingPlan\PricingPlan
     */
    public function getPricingPlan()
    {
        return $this->pricingPlan;
    }

    /**
     * @param integer $targetPatternId
     *
     * @return AccCdrDtoAbstract
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
     * @return \Ivoz\Provider\Domain\Model\TargetPattern\TargetPattern
     */
    public function getTargetPattern()
    {
        return $this->targetPattern;
    }

    /**
     * @param integer $invoiceId
     *
     * @return AccCdrDtoAbstract
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Invoice\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }

    /**
     * @param integer $brandId
     *
     * @return AccCdrDtoAbstract
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
     * @return \Ivoz\Provider\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $companyId
     *
     * @return AccCdrDtoAbstract
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
     * @return \Ivoz\Provider\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}


