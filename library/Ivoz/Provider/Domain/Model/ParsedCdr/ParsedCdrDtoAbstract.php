<?php

namespace Ivoz\Provider\Domain\Model\ParsedCdr;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ParsedCdrDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $statId;

    /**
     * @var integer
     */
    private $xstatId;

    /**
     * @var string
     */
    private $statType;

    /**
     * @var string
     */
    private $initialLeg;

    /**
     * @var string
     */
    private $initialLegHash;

    /**
     * @var string
     */
    private $cid;

    /**
     * @var string
     */
    private $cidHash;

    /**
     * @var string
     */
    private $xcid;

    /**
     * @var string
     */
    private $xcidHash;

    /**
     * @var string
     */
    private $proxies;

    /**
     * @var string
     */
    private $type;

    /**
     * @var string
     */
    private $subtype;

    /**
     * @var \DateTime
     */
    private $calldate = 'CURRENT_TIMESTAMP';

    /**
     * @var integer
     */
    private $duration;

    /**
     * @var string
     */
    private $aParty;

    /**
     * @var string
     */
    private $bParty;

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
    private $xCaller;

    /**
     * @var string
     */
    private $xCallee;

    /**
     * @var string
     */
    private $initialReferrer;

    /**
     * @var string
     */
    private $referrer;

    /**
     * @var string
     */
    private $referee;

    /**
     * @var string
     */
    private $lastForwarder;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandDto | null
     */
    private $brand;

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyDto | null
     */
    private $company;

    /**
     * @var \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractDto | null
     */
    private $peeringContract;


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
            'statId',
            'xstatId',
            'statType',
            'initialLeg',
            'initialLegHash',
            'cid',
            'cidHash',
            'xcid',
            'xcidHash',
            'proxies',
            'type',
            'subtype',
            'calldate',
            'duration',
            'aParty',
            'bParty',
            'caller',
            'callee',
            'xCaller',
            'xCallee',
            'initialReferrer',
            'referrer',
            'referee',
            'lastForwarder',
            'id',
            'brand',
            'company',
            'peeringContract'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'statId' => $this->getStatId(),
            'xstatId' => $this->getXstatId(),
            'statType' => $this->getStatType(),
            'initialLeg' => $this->getInitialLeg(),
            'initialLegHash' => $this->getInitialLegHash(),
            'cid' => $this->getCid(),
            'cidHash' => $this->getCidHash(),
            'xcid' => $this->getXcid(),
            'xcidHash' => $this->getXcidHash(),
            'proxies' => $this->getProxies(),
            'type' => $this->getType(),
            'subtype' => $this->getSubtype(),
            'calldate' => $this->getCalldate(),
            'duration' => $this->getDuration(),
            'aParty' => $this->getAParty(),
            'bParty' => $this->getBParty(),
            'caller' => $this->getCaller(),
            'callee' => $this->getCallee(),
            'xCaller' => $this->getXCaller(),
            'xCallee' => $this->getXCallee(),
            'initialReferrer' => $this->getInitialReferrer(),
            'referrer' => $this->getReferrer(),
            'referee' => $this->getReferee(),
            'lastForwarder' => $this->getLastForwarder(),
            'id' => $this->getId(),
            'brand' => $this->getBrand(),
            'company' => $this->getCompany(),
            'peeringContract' => $this->getPeeringContract()
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
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $statId
     *
     * @return static
     */
    public function setStatId($statId = null)
    {
        $this->statId = $statId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getStatId()
    {
        return $this->statId;
    }

    /**
     * @param integer $xstatId
     *
     * @return static
     */
    public function setXstatId($xstatId = null)
    {
        $this->xstatId = $xstatId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getXstatId()
    {
        return $this->xstatId;
    }

    /**
     * @param string $statType
     *
     * @return static
     */
    public function setStatType($statType = null)
    {
        $this->statType = $statType;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatType()
    {
        return $this->statType;
    }

    /**
     * @param string $initialLeg
     *
     * @return static
     */
    public function setInitialLeg($initialLeg = null)
    {
        $this->initialLeg = $initialLeg;

        return $this;
    }

    /**
     * @return string
     */
    public function getInitialLeg()
    {
        return $this->initialLeg;
    }

    /**
     * @param string $initialLegHash
     *
     * @return static
     */
    public function setInitialLegHash($initialLegHash = null)
    {
        $this->initialLegHash = $initialLegHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getInitialLegHash()
    {
        return $this->initialLegHash;
    }

    /**
     * @param string $cid
     *
     * @return static
     */
    public function setCid($cid = null)
    {
        $this->cid = $cid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCid()
    {
        return $this->cid;
    }

    /**
     * @param string $cidHash
     *
     * @return static
     */
    public function setCidHash($cidHash = null)
    {
        $this->cidHash = $cidHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getCidHash()
    {
        return $this->cidHash;
    }

    /**
     * @param string $xcid
     *
     * @return static
     */
    public function setXcid($xcid = null)
    {
        $this->xcid = $xcid;

        return $this;
    }

    /**
     * @return string
     */
    public function getXcid()
    {
        return $this->xcid;
    }

    /**
     * @param string $xcidHash
     *
     * @return static
     */
    public function setXcidHash($xcidHash = null)
    {
        $this->xcidHash = $xcidHash;

        return $this;
    }

    /**
     * @return string
     */
    public function getXcidHash()
    {
        return $this->xcidHash;
    }

    /**
     * @param string $proxies
     *
     * @return static
     */
    public function setProxies($proxies = null)
    {
        $this->proxies = $proxies;

        return $this;
    }

    /**
     * @return string
     */
    public function getProxies()
    {
        return $this->proxies;
    }

    /**
     * @param string $type
     *
     * @return static
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
     * @param string $subtype
     *
     * @return static
     */
    public function setSubtype($subtype = null)
    {
        $this->subtype = $subtype;

        return $this;
    }

    /**
     * @return string
     */
    public function getSubtype()
    {
        return $this->subtype;
    }

    /**
     * @param \DateTime $calldate
     *
     * @return static
     */
    public function setCalldate($calldate = null)
    {
        $this->calldate = $calldate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * @param integer $duration
     *
     * @return static
     */
    public function setDuration($duration = null)
    {
        $this->duration = $duration;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param string $aParty
     *
     * @return static
     */
    public function setAParty($aParty = null)
    {
        $this->aParty = $aParty;

        return $this;
    }

    /**
     * @return string
     */
    public function getAParty()
    {
        return $this->aParty;
    }

    /**
     * @param string $bParty
     *
     * @return static
     */
    public function setBParty($bParty = null)
    {
        $this->bParty = $bParty;

        return $this;
    }

    /**
     * @return string
     */
    public function getBParty()
    {
        return $this->bParty;
    }

    /**
     * @param string $caller
     *
     * @return static
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
     * @return static
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
     * @param string $xCaller
     *
     * @return static
     */
    public function setXCaller($xCaller = null)
    {
        $this->xCaller = $xCaller;

        return $this;
    }

    /**
     * @return string
     */
    public function getXCaller()
    {
        return $this->xCaller;
    }

    /**
     * @param string $xCallee
     *
     * @return static
     */
    public function setXCallee($xCallee = null)
    {
        $this->xCallee = $xCallee;

        return $this;
    }

    /**
     * @return string
     */
    public function getXCallee()
    {
        return $this->xCallee;
    }

    /**
     * @param string $initialReferrer
     *
     * @return static
     */
    public function setInitialReferrer($initialReferrer = null)
    {
        $this->initialReferrer = $initialReferrer;

        return $this;
    }

    /**
     * @return string
     */
    public function getInitialReferrer()
    {
        return $this->initialReferrer;
    }

    /**
     * @param string $referrer
     *
     * @return static
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
     * @param string $referee
     *
     * @return static
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
     * @param string $lastForwarder
     *
     * @return static
     */
    public function setLastForwarder($lastForwarder = null)
    {
        $this->lastForwarder = $lastForwarder;

        return $this;
    }

    /**
     * @return string
     */
    public function getLastForwarder()
    {
        return $this->lastForwarder;
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
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyDto $company
     *
     * @return static
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyDto $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyDto
     */
    public function getCompany()
    {
        return $this->company;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractDto $peeringContract
     *
     * @return static
     */
    public function setPeeringContract(\Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractDto $peeringContract = null)
    {
        $this->peeringContract = $peeringContract;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContractDto
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }
}


