<?php

namespace Ivoz\Provider\Domain\Model\Ddi;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class DdiDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $ddi;

    /**
     * @var string
     */
    private $ddie164;

    /**
     * @var string
     */
    private $recordCalls = 'none';

    /**
     * @var string
     */
    private $displayName;

    /**
     * @var string
     */
    private $routeType;

    /**
     * @var boolean
     */
    private $billInboundCalls = '0';

    /**
     * @var string
     */
    private $friendValue;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $conferenceRoomId;

    /**
     * @var mixed
     */
    private $languageId;

    /**
     * @var mixed
     */
    private $queueId;

    /**
     * @var mixed
     */
    private $externalCallFilterId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $ivrId;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $faxId;

    /**
     * @var mixed
     */
    private $peeringContractId;

    /**
     * @var mixed
     */
    private $countryId;

    /**
     * @var mixed
     */
    private $retailAccountId;

    /**
     * @var mixed
     */
    private $conditionalRouteId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $conferenceRoom;

    /**
     * @var mixed
     */
    private $language;

    /**
     * @var mixed
     */
    private $queue;

    /**
     * @var mixed
     */
    private $externalCallFilter;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @var mixed
     */
    private $ivr;

    /**
     * @var mixed
     */
    private $huntGroup;

    /**
     * @var mixed
     */
    private $fax;

    /**
     * @var mixed
     */
    private $peeringContract;

    /**
     * @var mixed
     */
    private $country;

    /**
     * @var mixed
     */
    private $retailAccount;

    /**
     * @var mixed
     */
    private $conditionalRoute;

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
            'ddi' => $this->getDdi(),
            'ddie164' => $this->getDdie164(),
            'recordCalls' => $this->getRecordCalls(),
            'displayName' => $this->getDisplayName(),
            'routeType' => $this->getRouteType(),
            'billInboundCalls' => $this->getBillInboundCalls(),
            'friendValue' => $this->getFriendValue(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'brand' => $this->getBrand(),
            'conferenceRoom' => $this->getConferenceRoom(),
            'language' => $this->getLanguage(),
            'queue' => $this->getQueue(),
            'externalCallFilter' => $this->getExternalCallFilter(),
            'user' => $this->getUser(),
            'ivr' => $this->getIvr(),
            'huntGroup' => $this->getHuntGroup(),
            'fax' => $this->getFax(),
            'peeringContract' => $this->getPeeringContract(),
            'country' => $this->getCountry(),
            'retailAccount' => $this->getRetailAccount(),
            'conditionalRoute' => $this->getConditionalRoute()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->conferenceRoom = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->language = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Language\\Language', $this->getLanguageId());
        $this->queue = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
        $this->externalCallFilter = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ExternalCallFilter\\ExternalCallFilter', $this->getExternalCallFilterId());
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
        $this->ivr = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Ivr\\Ivr', $this->getIvrId());
        $this->huntGroup = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->fax = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Fax\\Fax', $this->getFaxId());
        $this->peeringContract = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
        $this->country = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getCountryId());
        $this->retailAccount = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\RetailAccount\\RetailAccount', $this->getRetailAccountId());
        $this->conditionalRoute = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConditionalRoute\\ConditionalRoute', $this->getConditionalRouteId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $ddi
     *
     * @return DdiDtoAbstract
     */
    public function setDdi($ddi)
    {
        $this->ddi = $ddi;

        return $this;
    }

    /**
     * @return string
     */
    public function getDdi()
    {
        return $this->ddi;
    }

    /**
     * @param string $ddie164
     *
     * @return DdiDtoAbstract
     */
    public function setDdie164($ddie164 = null)
    {
        $this->ddie164 = $ddie164;

        return $this;
    }

    /**
     * @return string
     */
    public function getDdie164()
    {
        return $this->ddie164;
    }

    /**
     * @param string $recordCalls
     *
     * @return DdiDtoAbstract
     */
    public function setRecordCalls($recordCalls)
    {
        $this->recordCalls = $recordCalls;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordCalls()
    {
        return $this->recordCalls;
    }

    /**
     * @param string $displayName
     *
     * @return DdiDtoAbstract
     */
    public function setDisplayName($displayName = null)
    {
        $this->displayName = $displayName;

        return $this;
    }

    /**
     * @return string
     */
    public function getDisplayName()
    {
        return $this->displayName;
    }

    /**
     * @param string $routeType
     *
     * @return DdiDtoAbstract
     */
    public function setRouteType($routeType = null)
    {
        $this->routeType = $routeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * @param boolean $billInboundCalls
     *
     * @return DdiDtoAbstract
     */
    public function setBillInboundCalls($billInboundCalls)
    {
        $this->billInboundCalls = $billInboundCalls;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getBillInboundCalls()
    {
        return $this->billInboundCalls;
    }

    /**
     * @param string $friendValue
     *
     * @return DdiDtoAbstract
     */
    public function setFriendValue($friendValue = null)
    {
        $this->friendValue = $friendValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getFriendValue()
    {
        return $this->friendValue;
    }

    /**
     * @param integer $id
     *
     * @return DdiDtoAbstract
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
     * @param integer $companyId
     *
     * @return DdiDtoAbstract
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
     * @return DdiDtoAbstract
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
     * @param integer $brandId
     *
     * @return DdiDtoAbstract
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
     * @return DdiDtoAbstract
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
     * @param integer $conferenceRoomId
     *
     * @return DdiDtoAbstract
     */
    public function setConferenceRoomId($conferenceRoomId)
    {
        $this->conferenceRoomId = $conferenceRoomId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConferenceRoomId()
    {
        return $this->conferenceRoomId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\ConferenceRoom\ConferenceRoom $conferenceRoom
     *
     * @return DdiDtoAbstract
     */
    public function setConferenceRoom(\Ivoz\Provider\Domain\Model\ConferenceRoom\ConferenceRoom $conferenceRoom)
    {
        $this->conferenceRoom = $conferenceRoom;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ConferenceRoom\ConferenceRoom
     */
    public function getConferenceRoom()
    {
        return $this->conferenceRoom;
    }

    /**
     * @param integer $languageId
     *
     * @return DdiDtoAbstract
     */
    public function setLanguageId($languageId)
    {
        $this->languageId = $languageId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLanguageId()
    {
        return $this->languageId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Language\Language $language
     *
     * @return DdiDtoAbstract
     */
    public function setLanguage(\Ivoz\Provider\Domain\Model\Language\Language $language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Language\Language
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * @param integer $queueId
     *
     * @return DdiDtoAbstract
     */
    public function setQueueId($queueId)
    {
        $this->queueId = $queueId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQueueId()
    {
        return $this->queueId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Queue\Queue $queue
     *
     * @return DdiDtoAbstract
     */
    public function setQueue(\Ivoz\Provider\Domain\Model\Queue\Queue $queue)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Queue\Queue
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * @param integer $externalCallFilterId
     *
     * @return DdiDtoAbstract
     */
    public function setExternalCallFilterId($externalCallFilterId)
    {
        $this->externalCallFilterId = $externalCallFilterId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExternalCallFilterId()
    {
        return $this->externalCallFilterId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter $externalCallFilter
     *
     * @return DdiDtoAbstract
     */
    public function setExternalCallFilter(\Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter $externalCallFilter)
    {
        $this->externalCallFilter = $externalCallFilter;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getExternalCallFilter()
    {
        return $this->externalCallFilter;
    }

    /**
     * @param integer $userId
     *
     * @return DdiDtoAbstract
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $user
     *
     * @return DdiDtoAbstract
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param integer $ivrId
     *
     * @return DdiDtoAbstract
     */
    public function setIvrId($ivrId)
    {
        $this->ivrId = $ivrId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIvrId()
    {
        return $this->ivrId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Ivr\Ivr $ivr
     *
     * @return DdiDtoAbstract
     */
    public function setIvr(\Ivoz\Provider\Domain\Model\Ivr\Ivr $ivr)
    {
        $this->ivr = $ivr;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Ivr\Ivr
     */
    public function getIvr()
    {
        return $this->ivr;
    }

    /**
     * @param integer $huntGroupId
     *
     * @return DdiDtoAbstract
     */
    public function setHuntGroupId($huntGroupId)
    {
        $this->huntGroupId = $huntGroupId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHuntGroupId()
    {
        return $this->huntGroupId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\HuntGroup\HuntGroup $huntGroup
     *
     * @return DdiDtoAbstract
     */
    public function setHuntGroup(\Ivoz\Provider\Domain\Model\HuntGroup\HuntGroup $huntGroup)
    {
        $this->huntGroup = $huntGroup;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\HuntGroup\HuntGroup
     */
    public function getHuntGroup()
    {
        return $this->huntGroup;
    }

    /**
     * @param integer $faxId
     *
     * @return DdiDtoAbstract
     */
    public function setFaxId($faxId)
    {
        $this->faxId = $faxId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFaxId()
    {
        return $this->faxId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Fax\Fax $fax
     *
     * @return DdiDtoAbstract
     */
    public function setFax(\Ivoz\Provider\Domain\Model\Fax\Fax $fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Fax\Fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return DdiDtoAbstract
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
     * @return DdiDtoAbstract
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
     * @param integer $countryId
     *
     * @return DdiDtoAbstract
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $country
     *
     * @return DdiDtoAbstract
     */
    public function setCountry(\Ivoz\Provider\Domain\Model\Country\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param integer $retailAccountId
     *
     * @return DdiDtoAbstract
     */
    public function setRetailAccountId($retailAccountId)
    {
        $this->retailAccountId = $retailAccountId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRetailAccountId()
    {
        return $this->retailAccountId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccount $retailAccount
     *
     * @return DdiDtoAbstract
     */
    public function setRetailAccount(\Ivoz\Provider\Domain\Model\RetailAccount\RetailAccount $retailAccount)
    {
        $this->retailAccount = $retailAccount;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\RetailAccount\RetailAccount
     */
    public function getRetailAccount()
    {
        return $this->retailAccount;
    }

    /**
     * @param integer $conditionalRouteId
     *
     * @return DdiDtoAbstract
     */
    public function setConditionalRouteId($conditionalRouteId)
    {
        $this->conditionalRouteId = $conditionalRouteId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConditionalRouteId()
    {
        return $this->conditionalRouteId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRoute $conditionalRoute
     *
     * @return DdiDtoAbstract
     */
    public function setConditionalRoute(\Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRoute $conditionalRoute)
    {
        $this->conditionalRoute = $conditionalRoute;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRoute
     */
    public function getConditionalRoute()
    {
        return $this->conditionalRoute;
    }
}


