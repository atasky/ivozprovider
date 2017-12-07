<?php

namespace Ivoz\Provider\Domain\Model\MediaRelaySet;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface MediaRelaySetInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return MediaRelaySetDto
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
     * @return MediaRelaySetDto
     */
    public function toDto();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set description
     *
     * @param string $description
     *
     * @return self
     */
    public function setDescription($description = null);

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription();

}

