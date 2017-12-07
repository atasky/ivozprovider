<?php

namespace Ivoz\Provider\Domain\Model\Feature;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface FeatureInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return FeatureDto
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
     * @return FeatureDto
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
     * @param \Ivoz\Provider\Domain\Model\Feature\Name $name
     *
     * @return self
     */
    public function setName(\Ivoz\Provider\Domain\Model\Feature\Name $name);

    /**
     * Get name
     *
     * @return \Ivoz\Provider\Domain\Model\Feature\Name
     */
    public function getName();

}

