<?php

namespace Ivoz\Provider\Domain\Model\Extension;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ExtensionDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $routeType;

    /**
     * @var string
     */
    private $numberValue;

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
    private $ivrId;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $conferenceRoomId;

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
    private $conditionalRouteId;

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
    private $conferenceRoom;

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
    private $conditionalRoute;

    /**
     * @var mixed
     */
    private $numberCountry;

    /**
     * @var array|null
     */
    private $users = null;

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
            'number' => $this->getNumber(),
            'routeType' => $this->getRouteType(),
            'numberValue' => $this->getNumberValue(),
            'friendValue' => $this->getFriendValue(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'ivr' => $this->getIvr(),
            'huntGroup' => $this->getHuntGroup(),
            'conferenceRoom' => $this->getConferenceRoom(),
            'user' => $this->getUser(),
            'queue' => $this->getQueue(),
            'conditionalRoute' => $this->getConditionalRoute(),
            'numberCountry' => $this->getNumberCountry(),
            'users' => $this->getUsers()
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
        $this->conferenceRoom = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
        $this->queue = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
        $this->conditionalRoute = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConditionalRoute\\ConditionalRoute', $this->getConditionalRouteId());
        $this->numberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getNumberCountryId());
        if (!is_null($this->users)) {
            $items = $this->getUsers();
            $this->users = [];
            foreach ($items as $item) {
                $this->users[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\User\\User',
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
        $this->users = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\User\\User',
            $this->users
        );
    }

    /**
     * @param string $number
     *
     * @return ExtensionDtoAbstract
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param string $routeType
     *
     * @return ExtensionDtoAbstract
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
     * @param string $numberValue
     *
     * @return ExtensionDtoAbstract
     */
    public function setNumberValue($numberValue = null)
    {
        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * @param string $friendValue
     *
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @param integer $conferenceRoomId
     *
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @param integer $userId
     *
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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
     * @param integer $conditionalRouteId
     *
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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

    /**
     * @param integer $numberCountryId
     *
     * @return ExtensionDtoAbstract
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
     * @return ExtensionDtoAbstract
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

    /**
     * @param array $users
     *
     * @return ExtensionDtoAbstract
     */
    public function setUsers($users)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * @return array
     */
    public function getUsers()
    {
        return $this->users;
    }
}


