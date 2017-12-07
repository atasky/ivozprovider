<?php

namespace Ivoz\Provider\Domain\Model\ConditionalRoute;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ConditionalRouteDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $routetype;

    /**
     * @var string
     */
    private $numbervalue;

    /**
     * @var string
     */
    private $friendvalue;

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
    private $ivrId;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $voicemailUserId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $queueId;

    /**
     * @var mixed
     */
    private $locutionId;

    /**
     * @var mixed
     */
    private $conferenceRoomId;

    /**
     * @var mixed
     */
    private $extensionId;

    /**
     * @var mixed
     */
    private $numberCountryId;

    /**
     * @var mixed
     */
    private $company;

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
    private $voicemailUser;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @var mixed
     */
    private $queue;

    /**
     * @var mixed
     */
    private $locution;

    /**
     * @var mixed
     */
    private $conferenceRoom;

    /**
     * @var mixed
     */
    private $extension;

    /**
     * @var mixed
     */
    private $numberCountry;

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
            'name' => $this->getName(),
            'routetype' => $this->getRoutetype(),
            'numbervalue' => $this->getNumbervalue(),
            'friendvalue' => $this->getFriendvalue(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'ivr' => $this->getIvr(),
            'huntGroup' => $this->getHuntGroup(),
            'voicemailUser' => $this->getVoicemailUser(),
            'user' => $this->getUser(),
            'queue' => $this->getQueue(),
            'locution' => $this->getLocution(),
            'conferenceRoom' => $this->getConferenceRoom(),
            'extension' => $this->getExtension(),
            'numberCountry' => $this->getNumberCountry()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->ivr = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Ivr\\Ivr', $this->getIvrId());
        $this->huntGroup = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->voicemailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getVoicemailUserId());
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
        $this->queue = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
        $this->locution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getLocutionId());
        $this->conferenceRoom = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->extension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getExtensionId());
        $this->numberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getNumberCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return ConditionalRouteDtoAbstract
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
     * @param string $routetype
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setRoutetype($routetype = null)
    {
        $this->routetype = $routetype;

        return $this;
    }

    /**
     * @return string
     */
    public function getRoutetype()
    {
        return $this->routetype;
    }

    /**
     * @param string $numbervalue
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setNumbervalue($numbervalue = null)
    {
        $this->numbervalue = $numbervalue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumbervalue()
    {
        return $this->numbervalue;
    }

    /**
     * @param string $friendvalue
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setFriendvalue($friendvalue = null)
    {
        $this->friendvalue = $friendvalue;

        return $this;
    }

    /**
     * @return string
     */
    public function getFriendvalue()
    {
        return $this->friendvalue;
    }

    /**
     * @param integer $id
     *
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @param integer $ivrId
     *
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @param integer $voicemailUserId
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setVoicemailUserId($voicemailUserId)
    {
        $this->voicemailUserId = $voicemailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getVoicemailUserId()
    {
        return $this->voicemailUserId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $voicemailUser
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setVoicemailUser(\Ivoz\Provider\Domain\Model\User\User $voicemailUser)
    {
        $this->voicemailUser = $voicemailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getVoicemailUser()
    {
        return $this->voicemailUser;
    }

    /**
     * @param integer $userId
     *
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @param integer $queueId
     *
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @param integer $locutionId
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setLocutionId($locutionId)
    {
        $this->locutionId = $locutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLocutionId()
    {
        return $this->locutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $locution
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $locution)
    {
        $this->locution = $locution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getLocution()
    {
        return $this->locution;
    }

    /**
     * @param integer $conferenceRoomId
     *
     * @return ConditionalRouteDtoAbstract
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
     * @return ConditionalRouteDtoAbstract
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
     * @param integer $extensionId
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setExtensionId($extensionId)
    {
        $this->extensionId = $extensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\Extension $extension
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setExtension(\Ivoz\Provider\Domain\Model\Extension\Extension $extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\Extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param integer $numberCountryId
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setNumberCountryId($numberCountryId)
    {
        $this->numberCountryId = $numberCountryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNumberCountryId()
    {
        return $this->numberCountryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $numberCountry
     *
     * @return ConditionalRouteDtoAbstract
     */
    public function setNumberCountry(\Ivoz\Provider\Domain\Model\Country\Country $numberCountry)
    {
        $this->numberCountry = $numberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getNumberCountry()
    {
        return $this->numberCountry;
    }
}


