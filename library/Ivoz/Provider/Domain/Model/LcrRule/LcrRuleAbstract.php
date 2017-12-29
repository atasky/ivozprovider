<?php

namespace Ivoz\Provider\Domain\Model\LcrRule;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * LcrRuleAbstract
 * @codeCoverageIgnore
 */
abstract class LcrRuleAbstract
{
    /**
     * column: lcr_id
     * @var integer
     */
    protected $lcrId = '1';

    /**
     * @var string
     */
    protected $prefix;

    /**
     * column: from_uri
     * @var string
     */
    protected $fromUri;

    /**
     * column: request_uri
     * @var string
     */
    protected $requestUri;

    /**
     * @var integer
     */
    protected $stopper = '0';

    /**
     * @var integer
     */
    protected $enabled = '1';

    /**
     * @var string
     */
    protected $tag;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    protected $routingPattern;

    /**
     * @var \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface
     */
    protected $outgoingRouting;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct(
        $lcrId,
        $stopper,
        $enabled,
        $tag,
        $description
    ) {
        $this->setLcrId($lcrId);
        $this->setStopper($stopper);
        $this->setEnabled($enabled);
        $this->setTag($tag);
        $this->setDescription($description);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return LcrRuleDto
     */
    public static function createDto()
    {
        return new LcrRuleDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrRuleDto
         */
        Assertion::isInstanceOf($dto, LcrRuleDto::class);

        $self = new static(
            $dto->getLcrId(),
            $dto->getStopper(),
            $dto->getEnabled(),
            $dto->getTag(),
            $dto->getDescription());

        $self
            ->setPrefix($dto->getPrefix())
            ->setFromUri($dto->getFromUri())
            ->setRequestUri($dto->getRequestUri())
            ->setRoutingPattern($dto->getRoutingPattern())
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
         * @var $dto LcrRuleDto
         */
        Assertion::isInstanceOf($dto, LcrRuleDto::class);

        $this
            ->setLcrId($dto->getLcrId())
            ->setPrefix($dto->getPrefix())
            ->setFromUri($dto->getFromUri())
            ->setRequestUri($dto->getRequestUri())
            ->setStopper($dto->getStopper())
            ->setEnabled($dto->getEnabled())
            ->setTag($dto->getTag())
            ->setDescription($dto->getDescription())
            ->setRoutingPattern($dto->getRoutingPattern())
            ->setOutgoingRouting($dto->getOutgoingRouting());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return LcrRuleDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setLcrId($this->getLcrId())
            ->setPrefix($this->getPrefix())
            ->setFromUri($this->getFromUri())
            ->setRequestUri($this->getRequestUri())
            ->setStopper($this->getStopper())
            ->setEnabled($this->getEnabled())
            ->setTag($this->getTag())
            ->setDescription($this->getDescription())
            ->setRoutingPattern($this->getRoutingPattern() ? $this->getRoutingPattern()->toDto() : null)
            ->setOutgoingRouting($this->getOutgoingRouting() ? $this->getOutgoingRouting()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'lcr_id' => self::getLcrId(),
            'prefix' => self::getPrefix(),
            'from_uri' => self::getFromUri(),
            'request_uri' => self::getRequestUri(),
            'stopper' => self::getStopper(),
            'enabled' => self::getEnabled(),
            'tag' => self::getTag(),
            'description' => self::getDescription(),
            'routingPatternId' => self::getRoutingPattern() ? self::getRoutingPattern()->getId() : null,
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
     * Set prefix
     *
     * @param string $prefix
     *
     * @return self
     */
    public function setPrefix($prefix = null)
    {
        if (!is_null($prefix)) {
            Assertion::maxLength($prefix, 100, 'prefix value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->prefix = $prefix;

        return $this;
    }

    /**
     * Get prefix
     *
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * Set fromUri
     *
     * @param string $fromUri
     *
     * @return self
     */
    public function setFromUri($fromUri = null)
    {
        if (!is_null($fromUri)) {
            Assertion::maxLength($fromUri, 255, 'fromUri value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->fromUri = $fromUri;

        return $this;
    }

    /**
     * Get fromUri
     *
     * @return string
     */
    public function getFromUri()
    {
        return $this->fromUri;
    }

    /**
     * Set requestUri
     *
     * @param string $requestUri
     *
     * @return self
     */
    public function setRequestUri($requestUri = null)
    {
        if (!is_null($requestUri)) {
            Assertion::maxLength($requestUri, 100, 'requestUri value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->requestUri = $requestUri;

        return $this;
    }

    /**
     * Get requestUri
     *
     * @return string
     */
    public function getRequestUri()
    {
        return $this->requestUri;
    }

    /**
     * Set stopper
     *
     * @param integer $stopper
     *
     * @return self
     */
    public function setStopper($stopper)
    {
        Assertion::notNull($stopper, 'stopper value "%s" is null, but non null value was expected.');
        Assertion::integerish($stopper, 'stopper value "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($stopper, 0, 'stopper provided "%s" is not greater or equal than "%s".');

        $this->stopper = $stopper;

        return $this;
    }

    /**
     * Get stopper
     *
     * @return integer
     */
    public function getStopper()
    {
        return $this->stopper;
    }

    /**
     * Set enabled
     *
     * @param integer $enabled
     *
     * @return self
     */
    public function setEnabled($enabled)
    {
        Assertion::notNull($enabled, 'enabled value "%s" is null, but non null value was expected.');
        Assertion::integerish($enabled, 'enabled value "%s" is not an integer or a number castable to integer.');
        Assertion::greaterOrEqualThan($enabled, 0, 'enabled provided "%s" is not greater or equal than "%s".');

        $this->enabled = $enabled;

        return $this;
    }

    /**
     * Get enabled
     *
     * @return integer
     */
    public function getEnabled()
    {
        return $this->enabled;
    }

    /**
     * Set tag
     *
     * @param string $tag
     *
     * @return self
     */
    public function setTag($tag)
    {
        Assertion::notNull($tag, 'tag value "%s" is null, but non null value was expected.');
        Assertion::maxLength($tag, 55, 'tag value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->tag = $tag;

        return $this;
    }

    /**
     * Get tag
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description)
    {
        Assertion::notNull($description, 'description value "%s" is null, but non null value was expected.');
        Assertion::maxLength($description, 500, 'description value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set routingPattern
     *
     * @param \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return self
     */
    public function setRoutingPattern(\Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern = null)
    {
        $this->routingPattern = $routingPattern;

        return $this;
    }

    /**
     * Get routingPattern
     *
     * @return \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern()
    {
        return $this->routingPattern;
    }

    /**
     * Set outgoingRouting
     *
     * @param \Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting
     *
     * @return self
     */
    public function setOutgoingRouting(\Ivoz\Provider\Domain\Model\OutgoingRouting\OutgoingRoutingInterface $outgoingRouting = null)
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

