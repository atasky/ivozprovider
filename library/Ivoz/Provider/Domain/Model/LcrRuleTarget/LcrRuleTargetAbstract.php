<?php

namespace Ivoz\Provider\Domain\Model\LcrRuleTarget;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * LcrRuleTargetAbstract
 * @codeCoverageIgnore
 */
abstract class LcrRuleTargetAbstract
{
    /**
     * column: lcr_id
     * @var integer
     */
    protected $lcrId = '1';

    /**
     * @var integer
     */
    protected $priority;

    /**
     * @var integer
     */
    protected $weight = '1';

    /**
     * @var \Ivoz\Provider\Domain\Model\LcrRule\LcrRuleInterface
     */
    protected $rule;

    /**
     * @var \Ivoz\Provider\Domain\Model\LcrGateway\LcrGatewayInterface
     */
    protected $gw;

    /**
     * @var \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    protected $outgoingRouting;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($lcrId, $priority, $weight)
    {
        $this->setLcrId($lcrId);
        $this->setPriority($priority);
        $this->setWeight($weight);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return LcrRuleTargetDto
     */
    public static function createDto()
    {
        return new LcrRuleTargetDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrRuleTargetDto
         */
        Assertion::isInstanceOf($dto, LcrRuleTargetDto::class);

        $self = new static(
            $dto->getLcrId(),
            $dto->getPriority(),
            $dto->getWeight());

        $self
            ->setRule($dto->getRule())
            ->setGw($dto->getGw())
            ->setOutgoingRouting($dto->getOutgoingRouting())
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
         * @var $dto LcrRuleTargetDto
         */
        Assertion::isInstanceOf($dto, LcrRuleTargetDto::class);

        $this
            ->setLcrId($dto->getLcrId())
            ->setPriority($dto->getPriority())
            ->setWeight($dto->getWeight())
            ->setRule($dto->getRule())
            ->setGw($dto->getGw())
            ->setOutgoingRouting($dto->getOutgoingRouting());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return LcrRuleTargetDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setLcrId($this->getLcrId())
            ->setPriority($this->getPriority())
            ->setWeight($this->getWeight())
            ->setRule($this->getRule() ? $this->getRule()->toDto() : null)
            ->setGw($this->getGw() ? $this->getGw()->toDto() : null)
            ->setOutgoingRouting($this->getOutgoingRouting() ? $this->getOutgoingRouting()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'lcr_id' => self::getLcrId(),
            'priority' => self::getPriority(),
            'weight' => self::getWeight(),
            'ruleId' => self::getRule() ? self::getRule()->getId() : null,
            'gwId' => self::getGw() ? self::getGw()->getId() : null,
            'outgoingRoutingId' => self::getOutgoingRouting() ? self::getOutgoingRouting()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set lcrId
     *
     * @param integer $lcrId
     *
     * @return self
     */
    public function setLcrId($lcrId)
    {
        Assertion::notNull($lcrId, 'lcrId value "%s" is null, but non null value was expected.');
        Assertion::integerish($lcrId, 'lcrId value "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($lcrId, 0, 'lcrId provided "%s" is not greater or equal than "%s".');

        $this->lcrId = $lcrId;

        return $this;
    }

    /**
     * Get lcrId
     *
     * @return integer
     */
    public function getLcrId()
    {
        return $this->lcrId;
    }

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
        Assertion::greaterOrEqualThan($priority, 0, 'priority provided "%s" is not greater or equal than "%s".');

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
     * Set weight
     *
     * @param integer $weight
     *
     * @return self
     */
    public function setWeight($weight)
    {
        Assertion::notNull($weight, 'weight value "%s" is null, but non null value was expected.');
        Assertion::integerish($weight, 'weight value "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($weight, 0, 'weight provided "%s" is not greater or equal than "%s".');

        $this->weight = $weight;

        return $this;
    }

    /**
     * Get weight
     *
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * Set rule
     *
     * @param \Ivoz\Provider\Domain\Model\LcrRule\LcrRuleInterface $rule
     *
     * @return self
     */
    public function setRule(\Ivoz\Provider\Domain\Model\LcrRule\LcrRuleInterface $rule)
    {
        $this->rule = $rule;

        return $this;
    }

    /**
     * Get rule
     *
     * @return \Ivoz\Provider\Domain\Model\LcrRule\LcrRuleInterface
     */
    public function getRule()
    {
        return $this->rule;
    }

    /**
     * Set gw
     *
     * @param \Ivoz\Provider\Domain\Model\LcrGateway\LcrGatewayInterface $gw
     *
     * @return self
     */
    public function setGw(\Ivoz\Provider\Domain\Model\LcrGateway\LcrGatewayInterface $gw)
    {
        $this->gw = $gw;

        return $this;
    }

    /**
     * Get gw
     *
     * @return \Ivoz\Provider\Domain\Model\LcrGateway\LcrGatewayInterface
     */
    public function getGw()
    {
        return $this->gw;
    }

    /**
     * Set outgoingRouting
     *
     * @param \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return self
     */
    public function setOutgoingRouting(\Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting)
    {
        $this->outgoingRouting = $outgoingRouting;

        return $this;
    }

    /**
     * Get outgoingRouting
     *
     * @return \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    public function getOutgoingRouting()
    {
        return $this->outgoingRouting;
    }



    // @codeCoverageIgnoreEnd
}

