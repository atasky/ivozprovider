<?php

namespace Ivoz\Provider\Domain\Model\ProxyUser;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * ProxyUserAbstract
 * @codeCoverageIgnore
 */
abstract class ProxyUserAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $ip;


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
     * @return ProxyUserDto
     */
    public static function createDto()
    {
        return new ProxyUserDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ProxyUserDto
         */
        Assertion::isInstanceOf($dto, ProxyUserDto::class);

        $self = new static();

        $self
            ->setName($dto->getName())
            ->setIp($dto->getIp())
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
         * @var $dto ProxyUserDto
         */
        Assertion::isInstanceOf($dto, ProxyUserDto::class);

        $this
            ->setName($dto->getName())
            ->setIp($dto->getIp());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return ProxyUserDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setName($this->getName())
            ->setIp($this->getIp());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => self::getName(),
            'ip' => self::getIp()
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
    public function setName($name = null)
    {
        if (!is_null($name)) {
            Assertion::maxLength($name, 100, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');
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

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return self
     */
    public function setIp($ip = null)
    {
        if (!is_null($ip)) {
            Assertion::maxLength($ip, 50, 'ip value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

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



    // @codeCoverageIgnoreEnd
}

