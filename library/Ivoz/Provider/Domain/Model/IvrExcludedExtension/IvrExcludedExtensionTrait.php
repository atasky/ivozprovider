<?php

namespace Ivoz\Provider\Domain\Model\IvrExcludedExtension;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * IvrExcludedExtensionTrait
 * @codeCoverageIgnore
 */
trait IvrExcludedExtensionTrait
{
    /**
     * @var integer
     */
    protected $id;


    /**
     * Constructor
     */
    protected function __construct()
    {
        parent::__construct(...func_get_args());

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
        $self = parent::fromDto($dto);

        if ($dto->getId()) {
            $self->id = $dto->getId();
            $self->initChangelog();
        }

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
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return IvrExcludedExtensionDto
     */
    public function toDto()
    {
        $dto = parent::toDto();
        return $dto
            ->setId($this->getId());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return parent::__toArray() + [
            'id' => self::getId()
        ];
    }


}

