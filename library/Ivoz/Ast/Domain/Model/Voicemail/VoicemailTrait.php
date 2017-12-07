<?php

namespace Ivoz\Ast\Domain\Model\Voicemail;

use Ivoz\Core\Application\DataTransferObjectInterface;

/**
 * VoicemailTrait
 * @codeCoverageIgnore
 */
trait VoicemailTrait
{
    /**
     * column: uniqueid
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
     * @return VoicemailDto
     */
    public static function createDto()
    {
        return new VoicemailDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto VoicemailDto
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
         * @var $dto VoicemailDto
         */
        parent::updateFromDto($dto);

        return $this;
    }

    /**
     * @return VoicemailDto
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
            'uniqueid' => self::getId()
        ];
    }


}

