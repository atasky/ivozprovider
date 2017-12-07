<?php

namespace Ivoz\Kam\Domain\Model\UsersPua;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * UsersPuaTrait
 * @codeCoverageIgnore
 */
trait UsersPuaTrait
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
     * @return UsersPuaDto
     */
    public static function createDto()
    {
        return new UsersPuaDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto UsersPuaDto
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
         * @var $dto UsersPuaDto
         */
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return UsersPuaDto
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

