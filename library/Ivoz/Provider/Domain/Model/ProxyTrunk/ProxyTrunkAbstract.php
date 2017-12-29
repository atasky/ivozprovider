<?php

namespace Ivoz\Provider\Domain\Model\ProxyTrunk;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * ProxyTrunkAbstract
 * @codeCoverageIgnore
 */
abstract class ProxyTrunkAbstract
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
     * @return ProxyTrunkDto
     */
    public static function createDto()
    {
        return new ProxyTrunkDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ProxyTrunkDto
         */
        Assertion::isInstanceOf($dto, ProxyTrunkDto::class);

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
         * @var $dto ProxyTrunkDto
         */
        Assertion::isInstanceOf($dto, ProxyTrunkDto::class);

        $this
            ->setName($dto->getName())
            ->setIp($dto->getIp());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return ProxyTrunkDto
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



    // @codeCoverageIgnoreEnd
}

