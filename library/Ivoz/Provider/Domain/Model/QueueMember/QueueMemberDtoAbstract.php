<?php

namespace Ivoz\Provider\Domain\Model\QueueMember;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class QueueMemberDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $penalty;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $queueId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $queue;

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
            'penalty' => $this->getPenalty(),
            'id' => $this->getId(),
            'queue' => $this->getQueue(),
            'user' => $this->getUser()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->queue = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Queue\\Queue', $this->getQueueId());
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $penalty
     *
     * @return QueueMemberDtoAbstract
     */
    public function setPenalty($penalty = null)
    {
        $this->penalty = $penalty;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * @param integer $id
     *
     * @return QueueMemberDtoAbstract
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
     * @param integer $queueId
     *
     * @return QueueMemberDtoAbstract
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
     * @return QueueMemberDtoAbstract
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
     * @param integer $userId
     *
     * @return QueueMemberDtoAbstract
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
     * @return QueueMemberDtoAbstract
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


