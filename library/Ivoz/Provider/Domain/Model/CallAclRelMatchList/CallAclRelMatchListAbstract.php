<?php

namespace Ivoz\Provider\Domain\Model\CallAclRelMatchList;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * CallAclRelMatchListAbstract
 * @codeCoverageIgnore
 */
abstract class CallAclRelMatchListAbstract
{
    /**
     * @var integer
     */
    protected $priority;

    /**
     * comment: enum:allow|deny
     * @var string
     */
    protected $policy;

    /**
     * @var \Ivoz\Provider\Domain\Model\CallAcl\CallAclInterface
     */
    protected $callAcl;

    /**
     * @var \Ivoz\Provider\Domain\Model\MatchList\MatchListInterface
     */
    protected $matchList;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($priority, $policy)
    {
        $this->setPriority($priority);
        $this->setPolicy($policy);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return CallAclRelMatchListDto
     */
    public static function createDto()
    {
        return new CallAclRelMatchListDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallAclRelMatchListDto
         */
        Assertion::isInstanceOf($dto, CallAclRelMatchListDto::class);

        $self = new static(
            $dto->getPriority(),
            $dto->getPolicy());

        $self
            ->setCallAcl($dto->getCallAcl())
            ->setMatchList($dto->getMatchList())
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
         * @var $dto CallAclRelMatchListDto
         */
        Assertion::isInstanceOf($dto, CallAclRelMatchListDto::class);

        $this
            ->setPriority($dto->getPriority())
            ->setPolicy($dto->getPolicy())
            ->setCallAcl($dto->getCallAcl())
            ->setMatchList($dto->getMatchList());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return CallAclRelMatchListDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setPriority($this->getPriority())
            ->setPolicy($this->getPolicy())
            ->setCallAcl($this->getCallAcl() ? $this->getCallAcl()->toDto() : null)
            ->setMatchList($this->getMatchList() ? $this->getMatchList()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'priority' => self::getPriority(),
            'policy' => self::getPolicy(),
            'callAclId' => self::getCallAcl() ? self::getCallAcl()->getId() : null,
            'matchListId' => self::getMatchList() ? self::getMatchList()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority)
    {
        Assertion::notNull($priority, 'priority value "%s" is null, but non null value was expected.');
        Assertion::integerish($priority, 'priority value "%s" is not an integer or a number castable to integer.');

        $this->priority = $priority;

        return $this;
    }

    /**
     * Get priority
     *
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * Set policy
     *
     * @param string $policy
     *
     * @return self
     */
    public function setPolicy($policy)
    {
        Assertion::notNull($policy, 'policy value "%s" is null, but non null value was expected.');
        Assertion::maxLength($policy, 25, 'policy value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        Assertion::choice($policy, array (
          0 => 'allow',
          1 => 'deny',
        ), 'policyvalue "%s" is not an element of the valid values: %s');

        $this->policy = $policy;

        return $this;
    }

    /**
     * Get policy
     *
     * @return string
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * Set callAcl
     *
     * @param \Ivoz\Provider\Domain\Model\CallAcl\CallAclInterface $callAcl
     *
     * @return self
     */
    public function setCallAcl(\Ivoz\Provider\Domain\Model\CallAcl\CallAclInterface $callAcl = null)
    {
        $this->callAcl = $callAcl;

        return $this;
    }

    /**
     * Get callAcl
     *
     * @return \Ivoz\Provider\Domain\Model\CallAcl\CallAclInterface
     */
    public function getCallAcl()
    {
        return $this->callAcl;
    }

    /**
     * Set matchList
     *
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchListInterface $matchList
     *
     * @return self
     */
    public function setMatchList(\Ivoz\Provider\Domain\Model\MatchList\MatchListInterface $matchList)
    {
        $this->matchList = $matchList;

        return $this;
    }

    /**
     * Get matchList
     *
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchList()
    {
        return $this->matchList;
    }



    // @codeCoverageIgnoreEnd
}

