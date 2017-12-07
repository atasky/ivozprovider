<?php

namespace Ivoz\Provider\Domain\Model\ApplicationServer;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface ApplicationServerInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return ApplicationServerDto
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
     * @return ApplicationServerDto
     */
    public function toDto();

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return self
     */
    public function setIp($ip);

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name = null);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

}

