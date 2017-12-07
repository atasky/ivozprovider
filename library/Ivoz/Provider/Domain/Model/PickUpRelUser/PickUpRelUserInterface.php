<?php

namespace Ivoz\Provider\Domain\Model\PickUpRelUser;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface PickUpRelUserInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return PickUpRelUserDto
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
     * @return PickUpRelUserDto
     */
    public function toDto();

    /**
     * Set pickUpGroup
     *
     * @param \Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroupInterface $pickUpGroup
     *
     * @return self
     */
    public function setPickUpGroup(\Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroupInterface $pickUpGroup = null);

    /**
     * Get pickUpGroup
     *
     * @return \Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroupInterface
     */
    public function getPickUpGroup();

    /**
     * Set user
     *
     * @param \Ivoz\Provider\Domain\Model\User\UserInterface $user
     *
     * @return self
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\UserInterface $user = null);

    /**
     * Get user
     *
     * @return \Ivoz\Provider\Domain\Model\User\UserInterface
     */
    public function getUser();

}

