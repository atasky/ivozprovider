<?php

namespace Ivoz\Provider\Domain\Model\Extension;

use Ivoz\Core\Domain\Model\EntityInterface;

interface ExtensionInterface extends EntityInterface
{
    public function toArrayPortal();

    /**
     * Set number
     *
     * @param string $number
     *
     * @return self
     */
    public function setNumber($number);

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber();

    /**
     * Set routeType
     *
     * @param string $routeType
     *
     * @return self
     */
    public function setRouteType($routeType = null);

    /**
     * Get routeType
     *
     * @return string
     */
    public function getRouteType();

    /**
     * Set numberValue
     *
     * @param string $numberValue
     *
     * @return self
     */
    public function setNumberValue($numberValue = null);

    /**
     * Get numberValue
     *
     * @return string
     */
    public function getNumberValue();

    /**
     * Set friendValue
     *
     * @param string $friendValue
     *
     * @return self
     */
    public function setFriendValue($friendValue = null);

    /**
     * Get friendValue
     *
     * @return string
     */
    public function getFriendValue();

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company = null);

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();

    /**
     * Set ivrCommon
     *
     * @param \Ivoz\Provider\Domain\Model\IvrCommon\IvrCommonInterface $ivrCommon
     *
     * @return self
     */
    public function setIvrCommon(\Ivoz\Provider\Domain\Model\IvrCommon\IvrCommonInterface $ivrCommon = null);

    /**
     * Get ivrCommon
     *
     * @return \Ivoz\Provider\Domain\Model\IvrCommon\IvrCommonInterface
     */
    public function getIvrCommon();

    /**
     * Set ivrCustom
     *
     * @param \Ivoz\Provider\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom
     *
     * @return self
     */
    public function setIvrCustom(\Ivoz\Provider\Domain\Model\IvrCustom\IvrCustomInterface $ivrCustom = null);

    /**
     * Get ivrCustom
     *
     * @return \Ivoz\Provider\Domain\Model\IvrCustom\IvrCustomInterface
     */
    public function getIvrCustom();

    /**
     * Set huntGroup
     *
     * @param \Ivoz\Provider\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup
     *
     * @return self
     */
    public function setHuntGroup(\Ivoz\Provider\Domain\Model\HuntGroup\HuntGroupInterface $huntGroup = null);

    /**
     * Get huntGroup
     *
     * @return \Ivoz\Provider\Domain\Model\HuntGroup\HuntGroupInterface
     */
    public function getHuntGroup();

    /**
     * Set conferenceRoom
     *
     * @param \Ivoz\Provider\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom
     *
     * @return self
     */
    public function setConferenceRoom(\Ivoz\Provider\Domain\Model\ConferenceRoom\ConferenceRoomInterface $conferenceRoom = null);

    /**
     * Get conferenceRoom
     *
     * @return \Ivoz\Provider\Domain\Model\ConferenceRoom\ConferenceRoomInterface
     */
    public function getConferenceRoom();

    /**
     * Set user
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\UserInterface $user = null);

    /**
     * Get user
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    public function getUser();

    /**
     * Set queue
     *
     * @param \Ivoz\Provider\Domain\Model\Queue\QueueInterface $queue
     *
     * @return self
     */
    public function setQueue(\Ivoz\Provider\Domain\Model\Queue\QueueInterface $queue = null);

    /**
     * Get queue
     *
     * @return \Ivoz\Provider\Domain\Model\Queue\QueueInterface
     */
    public function getQueue();

    /**
     * Set conditionalRoute
     *
     * @param \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute
     *
     * @return self
     */
    public function setConditionalRoute(\Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRouteInterface $conditionalRoute = null);

    /**
     * Get conditionalRoute
     *
     * @return \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRouteInterface
     */
    public function getConditionalRoute();

}
