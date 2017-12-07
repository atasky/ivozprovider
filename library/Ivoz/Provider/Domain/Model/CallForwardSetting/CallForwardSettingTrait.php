<?php

namespace Ivoz\Provider\Domain\Model\CallForwardSetting;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * CallForwardSettingTrait
 * @codeCoverageIgnore
 */
trait CallForwardSettingTrait
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
     * @return CallForwardSettingDto
     */
    public static function createDto()
    {
        return new CallForwardSettingDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto CallForwardSettingDto
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
         * @var $dto CallForwardSettingDto
         */
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return CallForwardSettingDto
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

