<?php

namespace Ivoz\Provider\Domain\Model\CallAcl;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * CallAclAbstract
 * @codeCoverageIgnore
 */
abstract class CallAclAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * comment: enum:allow|deny
     * @var string
     */
    protected $defaultPolicy;

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    protected $company;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($name, $defaultPolicy)
    {
        $this->setName($name);
        $this->setDefaultPolicy($defaultPolicy);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return CallAclDto
     */
    public static function createDto()
    {
        return new CallAclDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallAclDto
         */
        Assertion::isInstanceOf($dto, CallAclDto::class);

        $self = new static(
            $dto->getName(),
            $dto->getDefaultPolicy());

        $self
            ->setCompany($dto->getCompany())
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
         * @var $dto CallAclDto
         */
        Assertion::isInstanceOf($dto, CallAclDto::class);

        $this
            ->setName($dto->getName())
            ->setDefaultPolicy($dto->getDefaultPolicy())
            ->setCompany($dto->getCompany());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return CallAclDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setName($this->getName())
            ->setDefaultPolicy($this->getDefaultPolicy())
            ->setCompany($this->getCompany() ? $this->getCompany()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => self::getName(),
            'defaultPolicy' => self::getDefaultPolicy(),
            'companyId' => self::getCompany() ? self::getCompany()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        Assertion::notNull($name, 'name value "%s" is null, but non null value was expected.');
        Assertion::maxLength($name, 50, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set defaultPolicy
     *
     * @param string $defaultPolicy
     *
     * @return self
     */
    public function setDefaultPolicy($defaultPolicy)
    {
        Assertion::notNull($defaultPolicy, 'defaultPolicy value "%s" is null, but non null value was expected.');
        Assertion::maxLength($defaultPolicy, 10, 'defaultPolicy value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        Assertion::choice($defaultPolicy, array (
          0 => 'allow',
          1 => 'deny',
        ), 'defaultPolicyvalue "%s" is not an element of the valid values: %s');

        $this->defaultPolicy = $defaultPolicy;

        return $this;
    }

    /**
     * Get defaultPolicy
     *
     * @return string
     */
    public function getDefaultPolicy()
    {
        return $this->defaultPolicy;
    }

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany()
    {
        return $this->company;
    }



    // @codeCoverageIgnoreEnd
}

