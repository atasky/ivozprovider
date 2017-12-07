<?php

namespace Ivoz\Provider\Domain\Model\ExternalCallFilterRelSchedule;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * ExternalCallFilterRelScheduleTrait
 * @codeCoverageIgnore
 */
trait ExternalCallFilterRelScheduleTrait
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
     * @return ExternalCallFilterRelScheduleDto
     */
    public static function createDto()
    {
        return new ExternalCallFilterRelScheduleDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto ExternalCallFilterRelScheduleDto
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
         * @var $dto ExternalCallFilterRelScheduleDto
         */
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return ExternalCallFilterRelScheduleDto
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

