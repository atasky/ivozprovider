<?php

namespace Ivoz\Provider\Domain\Model\ProxyUser;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface ProxyUserInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return ProxyUserDto
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
     * @return ProxyUserDto
     */
    public function toDto();

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

    /**
     * Set ip
     *
     * @param string $ip
     *
     * @return self
     */
    public function setIp($ip = null);

    /**
     * Get ip
     *
     * @return string
     */
    public function getIp();

}

