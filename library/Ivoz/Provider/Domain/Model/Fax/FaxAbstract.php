<?php

namespace Ivoz\Provider\Domain\Model\Fax;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * FaxAbstract
 * @codeCoverageIgnore
 */
abstract class FaxAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $email;

    /**
     * @var boolean
     */
    protected $sendByEmail = '1';

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    protected $company;

    /**
     * @var \Ivoz\Provider\Domain\Model\Ddi\DdiInterface
     */
    protected $outgoingDdi;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($name, $sendByEmail)
    {
        $this->setName($name);
        $this->setSendByEmail($sendByEmail);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return FaxDto
     */
    public static function createDto()
    {
        return new FaxDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FaxDto
         */
        Assertion::isInstanceOf($dto, FaxDto::class);

        $self = new static(
            $dto->getName(),
            $dto->getSendByEmail());

        $self
            ->setEmail($dto->getEmail())
            ->setCompany($dto->getCompany())
            ->setOutgoingDdi($dto->getOutgoingDdi())
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
         * @var $dto FaxDto
         */
        Assertion::isInstanceOf($dto, FaxDto::class);

        $this
            ->setName($dto->getName())
            ->setEmail($dto->getEmail())
            ->setSendByEmail($dto->getSendByEmail())
            ->setCompany($dto->getCompany())
            ->setOutgoingDdi($dto->getOutgoingDdi());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return FaxDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setName($this->getName())
            ->setEmail($this->getEmail())
            ->setSendByEmail($this->getSendByEmail())
            ->setCompany($this->getCompany() ? $this->getCompany()->toDto() : null)
            ->setOutgoingDdi($this->getOutgoingDdi() ? $this->getOutgoingDdi()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => self::getName(),
            'email' => self::getEmail(),
            'sendByEmail' => self::getSendByEmail(),
            'companyId' => self::getCompany() ? self::getCompany()->getId() : null,
            'outgoingDdiId' => self::getOutgoingDdi() ? self::getOutgoingDdi()->getId() : null
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
     * Set email
     *
     * @param string $email
     *
     * @return self
     */
    public function setEmail($email = null)
    {
        if (!is_null($email)) {
            Assertion::maxLength($email, 255, 'email value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set sendByEmail
     *
     * @param boolean $sendByEmail
     *
     * @return self
     */
    public function setSendByEmail($sendByEmail)
    {
        Assertion::notNull($sendByEmail, 'sendByEmail value "%s" is null, but non null value was expected.');
        Assertion::between(intval($sendByEmail), 0, 1, 'sendByEmail provided "%s" is not a valid boolean value.');

        $this->sendByEmail = $sendByEmail;

        return $this;
    }

    /**
     * Get sendByEmail
     *
     * @return boolean
     */
    public function getSendByEmail()
    {
        return $this->sendByEmail;
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

    /**
     * Set outgoingDdi
     *
     * @param \Ivoz\Provider\Domain\Model\Ddi\DdiInterface $outgoingDdi
     *
     * @return self
     */
    public function setOutgoingDdi(\Ivoz\Provider\Domain\Model\Ddi\DdiInterface $outgoingDdi = null)
    {
        $this->outgoingDdi = $outgoingDdi;

        return $this;
    }

    /**
     * Get outgoingDdi
     *
     * @return \Ivoz\Provider\Domain\Model\Ddi\DdiInterface
     */
    public function getOutgoingDdi()
    {
        return $this->outgoingDdi;
    }



    // @codeCoverageIgnoreEnd
}

