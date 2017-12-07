<?php

namespace Ivoz\Provider\Domain\Model\BrandUrl;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * BrandUrlTrait
 * @codeCoverageIgnore
 */
trait BrandUrlTrait
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
     * @return BrandUrlDto
     */
    public static function createDto()
    {
        return new BrandUrlDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto BrandUrlDto
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
         * @var $dto BrandUrlDto
         */
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return BrandUrlDto
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

