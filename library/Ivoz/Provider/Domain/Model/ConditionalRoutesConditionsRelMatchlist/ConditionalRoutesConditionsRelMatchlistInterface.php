<?php

namespace Ivoz\Provider\Domain\Model\ConditionalRoutesConditionsRelMatchlist;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface ConditionalRoutesConditionsRelMatchlistInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return ConditionalRoutesConditionsRelMatchlistDto
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
     * @return ConditionalRoutesConditionsRelMatchlistDto
     */
    public function toDto();

    /**
     * Set condition
     *
     * @param \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition
     *
     * @return self
     */
    public function setCondition(\Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface $condition = null);

    /**
     * Get condition
     *
     * @return \Ivoz\Provider\Domain\Model\ConditionalRoutesCondition\ConditionalRoutesConditionInterface
     */
    public function getCondition();

    /**
     * Set matchlist
     *
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchListInterface $matchlist
     *
     * @return self
     */
    public function setMatchlist(\Ivoz\Provider\Domain\Model\MatchList\MatchListInterface $matchlist);

    /**
     * Get matchlist
     *
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchListInterface
     */
    public function getMatchlist();

}

