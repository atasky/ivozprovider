<?php

namespace Ivoz\Kam\Domain\Model\TrunksHtable;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * TrunksHtableTrait
 * @codeCoverageIgnore
 */
trait TrunksHtableTrait
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
     * @return TrunksHtableDto
     */
    public static function createDto()
    {
        return new TrunksHtableDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto TrunksHtableDto
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
         * @var $dto TrunksHtableDto
         */
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return TrunksHtableDto
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

