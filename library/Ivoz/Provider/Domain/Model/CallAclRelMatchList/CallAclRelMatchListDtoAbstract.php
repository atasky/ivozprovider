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
     * @var mixed
     */
    private $callAclId;

    /**
     * @var mixed
     */
    private $matchListId;

    /**
     * @var mixed
     */
    private $callAcl;

    /**
     * @var mixed
     */
    private $matchList;

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
     * @return CallAclRelMatchListDtoAbstract
     */
    public function setPriority($priority)
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
     * @return CallAclRelMatchListDtoAbstract
     */
    public function setPolicy($policy)
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
     * @return CallAclRelMatchListDtoAbstract
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
     * @param integer $callAclId
     *
     * @return CallAclRelMatchListDtoAbstract
     */
    public function setCallAclId($callAclId)
    {
        $this->callAclId = $callAclId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCallAclId()
    {
        return $this->callAclId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\CallAcl\CallAcl $callAcl
     *
     * @return CallAclRelMatchListDtoAbstract
     */
    public function setCallAcl(\Ivoz\Provider\Domain\Model\CallAcl\CallAcl $callAcl)
    {
        $this->callAcl = $callAcl;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\CallAcl\CallAcl
     */
    public function getCallAcl()
    {
        return $this->callAcl;
    }

    /**
     * @param integer $matchListId
     *
     * @return CallAclRelMatchListDtoAbstract
     */
    public function setMatchListId($matchListId)
    {
        $this->matchListId = $matchListId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMatchListId()
    {
        return $this->matchListId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\MatchList\MatchList $matchList
     *
     * @return CallAclRelMatchListDtoAbstract
     */
    public function setMatchList(\Ivoz\Provider\Domain\Model\MatchList\MatchList $matchList)
    {
        $this->matchList = $matchList;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\MatchList\MatchList
     */
    public function getMatchList()
    {
        return $this->matchList;
    }
}


