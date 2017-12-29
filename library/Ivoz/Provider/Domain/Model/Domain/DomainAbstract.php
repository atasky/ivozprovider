<?php

namespace Ivoz\Provider\Domain\Model\Domain;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * DomainAbstract
 * @codeCoverageIgnore
 */
abstract class DomainAbstract
{
    /**
     * @var string
     */
    protected $domain;

    /**
     * @var string
     */
    protected $pointsTo = 'proxyusers';

    /**
     * @var string
     */
    protected $description;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($domain, $pointsTo)
    {
        $this->setDomain($domain);
        $this->setPointsTo($pointsTo);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return DomainDto
     */
    public static function createDto()
    {
        return new DomainDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto DomainDto
         */
        Assertion::isInstanceOf($dto, DomainDto::class);

        $self = new static(
            $dto->getDomain(),
            $dto->getPointsTo());

        $self
            ->setDescription($dto->getDescription())
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
         * @var $dto DomainDto
         */
        Assertion::isInstanceOf($dto, DomainDto::class);

        $this
            ->setDomain($dto->getDomain())
            ->setPointsTo($dto->getPointsTo())
            ->setDescription($dto->getDescription());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return DomainDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setDomain($this->getDomain())
            ->setPointsTo($this->getPointsTo())
            ->setDescription($this->getDescription());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'domain' => self::getDomain(),
            'pointsTo' => self::getPointsTo(),
            'description' => self::getDescription()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set domain
     *
     * @param string $domain
     *
     * @return self
     */
    public function setDomain($domain)
    {
        Assertion::notNull($domain, 'domain value "%s" is null, but non null value was expected.');
        Assertion::maxLength($domain, 190, 'domain value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->domain = $domain;

        return $this;
    }

    /**
     * Get domain
     *
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * Set pointsTo
     *
     * @param string $pointsTo
     *
     * @return self
     */
    public function setPointsTo($pointsTo)
    {
        Assertion::notNull($pointsTo, 'pointsTo value "%s" is null, but non null value was expected.');

        $this->pointsTo = $pointsTo;

        return $this;
    }

    /**
     * Get pointsTo
     *
     * @return string
     */
    public function getPointsTo()
    {
        return $this->pointsTo;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null)
    {
        if (!is_null($description)) {
            Assertion::maxLength($description, 500, 'description value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

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



    // @codeCoverageIgnoreEnd
}

