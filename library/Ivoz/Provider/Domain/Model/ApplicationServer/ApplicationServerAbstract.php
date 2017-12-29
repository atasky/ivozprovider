<?php

namespace Ivoz\Provider\Domain\Model\ApplicationServer;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * ApplicationServerAbstract
 * @codeCoverageIgnore
 */
abstract class ApplicationServerAbstract
{
    /**
     * @var string
     */
    protected $ip;

    /**
     * @var string
     */
    protected $name;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($ip)
    {
        $this->setIp($ip);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return ApplicationServerDto
     */
    public static function createDto()
    {
        return new ApplicationServerDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ApplicationServerDto
         */
        Assertion::isInstanceOf($dto, ApplicationServerDto::class);

        $self = new static(
            $dto->getIp());

        $self
            ->setName($dto->getName())
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
         * @var $dto ApplicationServerDto
         */
        Assertion::isInstanceOf($dto, ApplicationServerDto::class);

        $this
            ->setIp($dto->getIp())
            ->setName($dto->getName());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return ApplicationServerDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setIp($this->getIp())
            ->setName($this->getName());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'ip' => self::getIp(),
            'name' => self::getName()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return self
     */
    public function setIp($ip)
    {
        Assertion::notNull($ip, 'ip value "%s" is null, but non null value was expected.');
        Assertion::maxLength($ip, 50, 'ip value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->ip = $ip;

        return $this;
    }

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null)
    {
        if (!is_null($name)) {
            Assertion::maxLength($name, 64, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

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



    // @codeCoverageIgnoreEnd
}

