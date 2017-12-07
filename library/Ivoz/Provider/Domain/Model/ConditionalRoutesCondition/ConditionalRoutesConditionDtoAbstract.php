<?php

namespace Ivoz\Provider\Domain\Model\ConditionalRoutesCondition;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ConditionalRoutesConditionDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $priority = '1';

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
    private $conditionalRouteId;

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
    private $conditionalRoute;

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
     * @var array|null
     */
    private $matchlists = null;

    /**
     * @var array|null
     */
    private $schedules = null;

    /**
     * @var array|null
     */
    private $calendars = null;

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
            'priority' => $this->getPriority(),
            'routeType' => $this->getRouteType(),
            'numberValue' => $this->getNumberValue(),
            'friendValue' => $this->getFriendValue(),
            'id' => $this->getId(),
            'conditionalRoute' => $this->getConditionalRoute(),
            'ivr' => $this->getIvr(),
            'huntGroup' => $this->getHuntGroup(),
            'voicemailUser' => $this->getVoicemailUser(),
            'user' => $this->getUser(),
            'queue' => $this->getQueue(),
            'locution' => $this->getLocution(),
            'conferenceRoom' => $this->getConferenceRoom(),
            'extension' => $this->getExtension(),
            'numberCountry' => $this->getNumberCountry(),
            'matchlists' => $this->getMatchlists(),
            'schedules' => $this->getSchedules(),
            'calendars' => $this->getCalendars()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->conditionalRoute = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConditionalRoute\\ConditionalRoute', $this->getConditionalRouteId());
        $this->ivr = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Ivr\\Ivr', $this->getIvrId());
        $this->huntGroup = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->voicemailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getVoicemailUserId());
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
        $this->queue = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
        $this->locution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getLocutionId());
        $this->conferenceRoom = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConferenceRoom\\ConferenceRoom', $this->getConferenceRoomId());
        $this->extension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getExtensionId());
        $this->numberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getNumberCountryId());
        if (!is_null($this->matchlists)) {
            $items = $this->getMatchlists();
            $this->matchlists = [];
            foreach ($items as $item) {
                $this->matchlists[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesConditionsRelMatchlist\\ConditionalRoutesConditionsRelMatchlist',
                    $item->getId() ?? $item
                );
            }
        }

        if (!is_null($this->schedules)) {
            $items = $this->getSchedules();
            $this->schedules = [];
            foreach ($items as $item) {
                $this->schedules[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesConditionsRelSchedule\\ConditionalRoutesConditionsRelSchedule',
                    $item->getId() ?? $item
                );
            }
        }

        if (!is_null($this->calendars)) {
            $items = $this->getCalendars();
            $this->calendars = [];
            foreach ($items as $item) {
                $this->calendars[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesConditionsRelCalendar\\ConditionalRoutesConditionsRelCalendar',
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
        $this->matchlists = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesConditionsRelMatchlist\\ConditionalRoutesConditionsRelMatchlist',
            $this->matchlists
        );
        $this->schedules = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesConditionsRelSchedule\\ConditionalRoutesConditionsRelSchedule',
            $this->schedules
        );
        $this->calendars = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\ConditionalRoutesConditionsRelCalendar\\ConditionalRoutesConditionsRelCalendar',
            $this->calendars
        );
    }

    /**
     * @param integer $priority
     *
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @param string $routeType
     *
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @param integer $conditionalRouteId
     *
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @param integer $ivrId
     *
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @return ConditionalRoutesConditionDtoAbstract
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
     * @param array $matchlists
     *
     * @return ConditionalRoutesConditionDtoAbstract
     */
    public function setMatchlists($matchlists)
    {
        $this->matchlists = $matchlists;

        return $this;
    }

    /**
     * @return array
     */
    public function getMatchlists()
    {
        return $this->matchlists;
    }

    /**
     * @param array $schedules
     *
     * @return ConditionalRoutesConditionDtoAbstract
     */
    public function setSchedules($schedules)
    {
        $this->schedules = $schedules;

        return $this;
    }

    /**
     * @return array
     */
    public function getSchedules()
    {
        return $this->schedules;
    }

    /**
     * @param array $calendars
     *
     * @return ConditionalRoutesConditionDtoAbstract
     */
    public function setCalendars($calendars)
    {
        $this->calendars = $calendars;

        return $this;
    }

    /**
     * @return array
     */
    public function getCalendars()
    {
        return $this->calendars;
    }
}


