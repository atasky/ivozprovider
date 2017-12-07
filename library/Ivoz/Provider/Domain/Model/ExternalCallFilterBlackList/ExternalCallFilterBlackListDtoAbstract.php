<?php

namespace Ivoz\Provider\Domain\Model\ExternalCallFilterBlackList;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ExternalCallFilterBlackListDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $filterId;

    /**
     * @var mixed
     */
    private $matchlistId;

    /**
     * @var mixed
     */
    private $filter;

    /**
     * @var mixed
     */
    private $matchlist;

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return $this->__toArray();
    }

    /**
     * @return void
     */
    public function denormalize(array $data, string $context)
    {
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'id' => $this->getId(),
            'filter' => $this->getFilter(),
            'matchlist' => $this->getMatchlist()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->filter = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ExternalCallFilter\\ExternalCallFilter', $this->getFilterId());
        $this->matchlist = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\MatchList\\MatchList', $this->getMatchlistId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return ExternalCallFilterBlackListDtoAbstract
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param integer $filterId
     *
     * @return ExternalCallFilterBlackListDtoAbstract
     */
    public function setFilterId($filterId)
    {
        $this->filterId = $filterId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFilterId()
    {
        return $this->filterId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter $filter
     *
     * @return ExternalCallFilterBlackListDtoAbstract
     */
    public function setFilter(\Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter $filter)
    {
        $this->filter = $filter;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ExternalCallFilter\ExternalCallFilter
     */
    public function getFilter()
    {
        return $this->filter;
    }

    /**
     * @param integer $matchlistId
     *
     * @return ExternalCallFilterBlackListDtoAbstract
     */
    public function setMatchlistId($matchlistId)
    {
        $this->matchlistId = $matchlistId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchlistId()
    {
        return $this->matchlistId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchList $matchlist
     *
     * @return ExternalCallFilterBlackListDtoAbstract
     */
    public function setMatchlist(\Ivoz\Provider\Domain\Model\MatchList\MatchList $matchlist)
    {
        $this->matchlist = $matchlist;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchList
     */
    public function getMatchlist()
    {
        return $this->matchlist;
    }
}


