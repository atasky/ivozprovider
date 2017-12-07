<?php

namespace Ivoz\Provider\Domain\Model\LcrGateway;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * LcrGatewayTrait
 * @codeCoverageIgnore
 */
trait LcrGatewayTrait
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
     * @return LcrGatewayDto
     */
    public static function createDto()
    {
        return new LcrGatewayDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto LcrGatewayDto
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
         * @var $dto LcrGatewayDto
         */
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return LcrGatewayDto
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

