<?php

namespace Ivoz\Provider\Domain\Model\BrandService;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * BrandServiceAbstract
 * @codeCoverageIgnore
 */
abstract class BrandServiceAbstract
{
    /**
     * @var string
     */
    protected $code;

    /**
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    protected $brand;

    /**
     * @var \Ivoz\Provider\Domain\Model\Service\ServiceInterface
     */
    protected $service;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($code)
    {
        $this->setCode($code);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return BrandServiceDto
     */
    public static function createDto()
    {
        return new BrandServiceDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandServiceDto
         */
        Assertion::isInstanceOf($dto, BrandServiceDto::class);

        $self = new static(
            $dto->getCode());

        $self
            ->setBrand($dto->getBrand())
            ->setService($dto->getService())
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
         * @var $dto BrandServiceDto
         */
        Assertion::isInstanceOf($dto, BrandServiceDto::class);

        $this
            ->setCode($dto->getCode())
            ->setBrand($dto->getBrand())
            ->setService($dto->getService());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return BrandServiceDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setCode($this->getCode())
            ->setBrand($this->getBrand() ? $this->getBrand()->toDto() : null)
            ->setService($this->getService() ? $this->getService()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'code' => self::getCode(),
            'brandId' => self::getBrand() ? self::getBrand()->getId() : null,
            'serviceId' => self::getService() ? self::getService()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set code
     *
     * @param string $code
     *
     * @return self
     */
    public function setCode($code)
    {
        Assertion::notNull($code, 'code value "%s" is null, but non null value was expected.');
        Assertion::maxLength($code, 3, 'code value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->code = $code;

        return $this;
    }

    /**
     * Get code
     *
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * Set brand
     *
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand
     *
     * @return self
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandInterface $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandInterface
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set service
     *
     * @param \Ivoz\Provider\Domain\Model\Service\ServiceInterface $service
     *
     * @return self
     */
    public function setService(\Ivoz\Provider\Domain\Model\Service\ServiceInterface $service)
    {
        $this->service = $service;

        return $this;
    }

    /**
     * Get service
     *
     * @return \Ivoz\Provider\Domain\Model\Service\ServiceInterface
     */
    public function getService()
    {
        return $this->service;
    }



    // @codeCoverageIgnoreEnd
}

