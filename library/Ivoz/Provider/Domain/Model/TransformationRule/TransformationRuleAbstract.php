<?php

namespace Ivoz\Provider\Domain\Model\TransformationRule;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * TransformationRuleAbstract
 * @codeCoverageIgnore
 */
abstract class TransformationRuleAbstract
{
    /**
     * comment: enum:callerin|calleein|callerout|calleeout
     * @var string
     */
    protected $type;

    /**
     * @var string
     */
    protected $description = '';

    /**
     * @var integer
     */
    protected $priority;

    /**
     * @var string
     */
    protected $matchExpr;

    /**
     * @var string
     */
    protected $replaceExpr;

    /**
     * @var \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface
     */
    protected $transformationRuleSet;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($type, $description)
    {
        $this->setType($type);
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
     * @return TransformationRuleDto
     */
    public static function createDto()
    {
        return new TransformationRuleDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TransformationRuleDto
         */
        Assertion::isInstanceOf($dto, TransformationRuleDto::class);

        $self = new static(
            $dto->getType(),
            $dto->getDescription());

        $self
            ->setPriority($dto->getPriority())
            ->setMatchExpr($dto->getMatchExpr())
            ->setReplaceExpr($dto->getReplaceExpr())
            ->setTransformationRuleSet($dto->getTransformationRuleSet())
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
         * @var $dto TransformationRuleDto
         */
        Assertion::isInstanceOf($dto, TransformationRuleDto::class);

        $this
            ->setType($dto->getType())
            ->setDescription($dto->getDescription())
            ->setPriority($dto->getPriority())
            ->setMatchExpr($dto->getMatchExpr())
            ->setReplaceExpr($dto->getReplaceExpr())
            ->setTransformationRuleSet($dto->getTransformationRuleSet());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return TransformationRuleDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setType($this->getType())
            ->setDescription($this->getDescription())
            ->setPriority($this->getPriority())
            ->setMatchExpr($this->getMatchExpr())
            ->setReplaceExpr($this->getReplaceExpr())
            ->setTransformationRuleSet($this->getTransformationRuleSet() ? $this->getTransformationRuleSet()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'type' => self::getType(),
            'description' => self::getDescription(),
            'priority' => self::getPriority(),
            'matchExpr' => self::getMatchExpr(),
            'replaceExpr' => self::getReplaceExpr(),
            'transformationRuleSetId' => self::getTransformationRuleSet() ? self::getTransformationRuleSet()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set type
     *
     * @param string $type
     *
     * @return self
     */
    public function setType($type)
    {
        Assertion::notNull($type, 'type value "%s" is null, but non null value was expected.');
        Assertion::maxLength($type, 10, 'type value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        Assertion::choice($type, array (
          0 => 'callerin',
          1 => 'calleein',
          2 => 'callerout',
          3 => 'calleeout',
        ), 'typevalue "%s" is not an element of the valid values: %s');

        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
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
        Assertion::maxLength($description, 64, 'description value "%s" is too long, it should have no more than %d characters, but has %d characters.');

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
     * Set priority
     *
     * @param integer $priority
     *
     * @return self
     */
    public function setPriority($priority = null)
    {
        if (!is_null($priority)) {
            if (!is_null($priority)) {
                Assertion::integerish($priority, 'priority value "%s" is not an integer or a number castable to integer.');
                Assertion::greaterOrEqualThan($priority, 0, 'priority provided "%s" is not greater or equal than "%s".');
            }
        }

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
     * Set matchExpr
     *
     * @param string $matchExpr
     *
     * @return self
     */
    public function setMatchExpr($matchExpr = null)
    {
        if (!is_null($matchExpr)) {
            Assertion::maxLength($matchExpr, 128, 'matchExpr value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->matchExpr = $matchExpr;

        return $this;
    }

    /**
     * Get matchExpr
     *
     * @return string
     */
    public function getMatchExpr()
    {
        return $this->matchExpr;
    }

    /**
     * Set replaceExpr
     *
     * @param string $replaceExpr
     *
     * @return self
     */
    public function setReplaceExpr($replaceExpr = null)
    {
        if (!is_null($replaceExpr)) {
            Assertion::maxLength($replaceExpr, 128, 'replaceExpr value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->replaceExpr = $replaceExpr;

        return $this;
    }

    /**
     * Get replaceExpr
     *
     * @return string
     */
    public function getReplaceExpr()
    {
        return $this->replaceExpr;
    }

    /**
     * Set transformationRuleSet
     *
     * @param \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface $transformationRuleSet
     *
     * @return self
     */
    public function setTransformationRuleSet(\Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface $transformationRuleSet = null)
    {
        $this->transformationRuleSet = $transformationRuleSet;

        return $this;
    }

    /**
     * Get transformationRuleSet
     *
     * @return \Ivoz\Provider\Domain\Model\TransformationRuleSet\TransformationRuleSetInterface
     */
    public function getTransformationRuleSet()
    {
        return $this->transformationRuleSet;
    }



    // @codeCoverageIgnoreEnd
}

