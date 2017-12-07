<?php

namespace Ivoz\Provider\Domain\Model\RoutingPatternGroupsRelPattern;

use Ivoz\Core\Domain\Model\EntityInterface;

interface RoutingPatternGroupsRelPatternInterface extends EntityInterface
{
    /**
     * @return RoutingPatternGroupsRelPatternDto
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
     * @return RoutingPatternGroupsRelPatternDto
     */
    public function toDto();

    /**
     * Set routingPattern
     *
     * @param \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern
     *
     * @return self
     */
    public function setRoutingPattern(\Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface $routingPattern);

    /**
     * Get routingPattern
     *
     * @return \Ivoz\Provider\Domain\Model\RoutingPattern\RoutingPatternInterface
     */
    public function getRoutingPattern();

    /**
     * Set routingPatternGroup
     *
     * @param \Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup
     *
     * @return self
     */
    public function setRoutingPatternGroup(\Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface $routingPatternGroup = null);

    /**
     * Get routingPatternGroup
     *
     * @return \Ivoz\Provider\Domain\Model\RoutingPatternGroup\RoutingPatternGroupInterface
     */
    public function getRoutingPatternGroup();

}

