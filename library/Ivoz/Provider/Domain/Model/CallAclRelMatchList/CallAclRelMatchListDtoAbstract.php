<?php

namespace Ivoz\Provider\Domain\Model\CallAclRelMatchList;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class CallAclRelMatchListDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $priority;

    /**
     * @var string
     */
    private $policy;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ivoz\Provider\Domain\Model\CallAcl\CallAclDto | null
     */
    private $callAcl;

    /**
     * @var \Ivoz\Provider\Domain\Model\MatchList\MatchListDto | null
     */
    private $matchList;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return $this->toArray();
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
    public static function getPropertyMap()
    {
        return [
            'priority',
            'policy',
            'id',
            'callAcl',
            'matchList'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'priority' => $this->getPriority(),
            'policy' => $this->getPolicy(),
            'id' => $this->getId(),
            'callAcl' => $this->getCallAcl(),
            'matchList' => $this->getMatchList()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->callAcl = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\CallAcl\\CallAcl', $this->getCallAclId());
        $this->matchList = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\MatchList\\MatchList', $this->getMatchListId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $priority
     *
     * @return static
     */
    public function setPriority($priority = null)
    {
        $this->priority = $priority;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPriority()
    {
        return $this->priority;
    }

    /**
     * @param string $policy
     *
     * @return static
     */
    public function setPolicy($policy = null)
    {
        $this->policy = $policy;

        return $this;
    }

    /**
     * @return string
     */
    public function getPolicy()
    {
        return $this->policy;
    }

    /**
     * @param integer $id
     *
     * @return static
     */
    public function setId($id = null)
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
     * @param \Ivoz\Provider\Domain\Model\CallAcl\CallAclDto $callAcl
     *
     * @return static
     */
    public function setCallAcl(\Ivoz\Provider\Domain\Model\CallAcl\CallAclDto $callAcl = null)
    {
        $this->callAcl = $callAcl;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\CallAcl\CallAclDto
     */
    public function getCallAcl()
    {
        return $this->callAcl;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchListDto $matchList
     *
     * @return static
     */
    public function setMatchList(\Ivoz\Provider\Domain\Model\MatchList\MatchListDto $matchList = null)
    {
        $this->matchList = $matchList;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchListDto
     */
    public function getMatchList()
    {
        return $this->matchList;
    }
}


