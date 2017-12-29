<?php

namespace Ivoz\Provider\Domain\Model\IvrExcludedExtension;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * IvrExcludedExtensionAbstract
 * @codeCoverageIgnore
 */
abstract class IvrExcludedExtensionAbstract
{
    /**
     * @var \Ivoz\Provider\Domain\Model\Ivr\IvrInterface
     */
    protected $ivr;

    /**
     * @var \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface
     */
    protected $extension;


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
     * @return IvrExcludedExtensionDto
     */
    public static function createDto()
    {
        return new IvrExcludedExtensionDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto IvrExcludedExtensionDto
         */
        Assertion::isInstanceOf($dto, IvrExcludedExtensionDto::class);

        $self = new static();

        $self
            ->setIvr($dto->getIvr())
            ->setExtension($dto->getExtension())
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
         * @var $dto IvrExcludedExtensionDto
         */
        Assertion::isInstanceOf($dto, IvrExcludedExtensionDto::class);

        $this
            ->setIvr($dto->getIvr())
            ->setExtension($dto->getExtension());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return IvrExcludedExtensionDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setIvr($this->getIvr() ? $this->getIvr()->toDto() : null)
            ->setExtension($this->getExtension() ? $this->getExtension()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'ivrId' => self::getIvr() ? self::getIvr()->getId() : null,
            'extensionId' => self::getExtension() ? self::getExtension()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set ivr
     *
     * @param \Ivoz\Provider\Domain\Model\Ivr\IvrInterface $ivr
     *
     * @return self
     */
    public function setIvr(\Ivoz\Provider\Domain\Model\Ivr\IvrInterface $ivr = null)
    {
        $this->ivr = $ivr;

        return $this;
    }

    /**
     * Get ivr
     *
     * @return \Ivoz\Provider\Domain\Model\Ivr\IvrInterface
     */
    public function getIvr()
    {
        return $this->ivr;
    }

    /**
     * Set extension
     *
     * @param \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension
     *
     * @return self
     */
    public function setExtension(\Ivoz\Provider\Domain\Model\Extension\ExtensionInterface $extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * Get extension
     *
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionInterface
     */
    public function getExtension()
    {
        return $this->extension;
    }



    // @codeCoverageIgnoreEnd
}

