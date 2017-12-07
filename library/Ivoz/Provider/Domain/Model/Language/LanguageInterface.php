<?php

namespace Ivoz\Provider\Domain\Model\Language;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface LanguageInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return LanguageDto
     */
    public static function createDto();

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(\Ivoz\Core\Application\DataTransferObjectInterface $dto);

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(\Ivoz\Core\Application\DataTransferObjectInterface $dto);

    /**
     * @return LanguageDto
     */
    public function toDto();

    /**
     * Set iden
     *
     * @param string $iden
     *
     * @return self
     */
    public function setIden($iden);

    /**
     * Get iden
     *
     * @return string
     */
    public function getIden();

    /**
     * Set name
     *
     * @param \Ivoz\Provider\Domain\Model\Language\Name $name
     *
     * @return self
     */
    public function setName(\Ivoz\Provider\Domain\Model\Language\Name $name);

    /**
     * Get name
     *
     * @return \Ivoz\Provider\Domain\Model\Language\Name
     */
    public function getName();

}

