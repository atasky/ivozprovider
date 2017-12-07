<?php

namespace Ivoz\Provider\Domain\Model\HuntGroupsRelUser;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class HuntGroupsRelUserDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $timeoutTime;

    /**
     * @var integer
     */
    private $priority;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $huntGroupId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $huntGroup;

    /**
     * @var mixed
     */
    private $user;

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
            'timeoutTime' => $this->getTimeoutTime(),
            'priority' => $this->getPriority(),
            'id' => $this->getId(),
            'huntGroup' => $this->getHuntGroup(),
            'user' => $this->getUser()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->huntGroup = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\HuntGroup\\HuntGroup', $this->getHuntGroupId());
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $timeoutTime
     *
     * @return HuntGroupsRelUserDtoAbstract
     */
    public function setTimeoutTime($timeoutTime = null)
    {
        $this->timeoutTime = $timeoutTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutTime()
    {
        return $this->timeoutTime;
    }

    /**
     * @param integer $priority
     *
     * @return HuntGroupsRelUserDtoAbstract
     */
    public function setPriority($priority = null)
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
     * @param integer $id
     *
     * @return HuntGroupsRelUserDtoAbstract
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
     * @param integer $huntGroupId
     *
     * @return HuntGroupsRelUserDtoAbstract
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
     * @return HuntGroupsRelUserDtoAbstract
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
     * @param integer $userId
     *
     * @return HuntGroupsRelUserDtoAbstract
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
     * @return HuntGroupsRelUserDtoAbstract
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
}


