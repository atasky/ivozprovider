<?php

namespace Ivoz\Provider\Domain\Model\QueueMember;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * QueueMemberAbstract
 * @codeCoverageIgnore
 */
abstract class QueueMemberAbstract
{
    /**
     * @var integer
     */
    protected $penalty;

    /**
     * @var \Ivoz\Provider\Domain\Model\Queue\QueueInterface
     */
    protected $queue;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    protected $user;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct()
    {

    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return QueueMemberDto
     */
    public static function createDto()
    {
        return new QueueMemberDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueMemberDto
         */
        Assertion::isInstanceOf($dto, QueueMemberDto::class);

        $self = new static();

        $self
            ->setPenalty($dto->getPenalty())
            ->setQueue($dto->getQueue())
            ->setUser($dto->getUser())
        ;

        $self->sanitizeValues();
        $self->initChangelog();

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto QueueMemberDto
         */
        Assertion::isInstanceOf($dto, QueueMemberDto::class);

        $this
            ->setPenalty($dto->getPenalty())
            ->setQueue($dto->getQueue())
            ->setUser($dto->getUser());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return QueueMemberDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setPenalty($this->getPenalty())
            ->setQueue($this->getQueue() ? $this->getQueue()->toDto() : null)
            ->setUser($this->getUser() ? $this->getUser()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'penalty' => self::getPenalty(),
            'queueId' => self::getQueue() ? self::getQueue()->getId() : null,
            'userId' => self::getUser() ? self::getUser()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set penalty
     *
     * @param integer $penalty
     *
     * @return self
     */
    public function setPenalty($penalty = null)
    {
        if (!is_null($penalty)) {
            if (!is_null($penalty)) {
                Assertion::integerish($penalty, 'penalty value "%s" is not an integer or a number castable to integer.');
            }
        }

        $this->penalty = $penalty;

        return $this;
    }

    /**
     * Get penalty
     *
     * @return integer
     */
    public function getPenalty()
    {
        return $this->penalty;
    }

    /**
     * Set queue
     *
     * @param \Ivoz\Provider\Domain\Model\Queue\QueueInterface $queue
     *
     * @return self
     */
    public function setQueue(\Ivoz\Provider\Domain\Model\Queue\QueueInterface $queue = null)
    {
        $this->queue = $queue;

        return $this;
    }

    /**
     * Get queue
     *
     * @return \Ivoz\Provider\Domain\Model\Queue\QueueInterface
     */
    public function getQueue()
    {
        return $this->queue;
    }

    /**
     * Set user
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\UserInterface $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }



    // @codeCoverageIgnoreEnd
}

