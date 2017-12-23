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


    public function __construct($id = null)
    {
        $this->setId($id);
    }

    /**
     * @inheritdoc
     */
    public function normalize(string $context)
    {
        $response = $this->toArray();
        $contextProperties = $this->getPropertyMap($context);

        return array_filter(
            $response,
            function ($key) use ($contextProperties) {
                return in_array($key, $contextProperties);
            },
            ARRAY_FILTER_USE_KEY
        );
    }

    /**
     * @inheritdoc
     */
    public function denormalize(array $data, string $context)
    {
    }

    /**
     * @inheritdoc
     */
    public static function getPropertyMap(string $context = '')
    {
        if ($context === self::CONTEXT_COLLECTION) {
            return ['id'];
        }

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
         * @param integer $id
         *
         * @return static
         */
        public function setCallAclId($id)
        {
            $value = $id
                ? new \Ivoz\Provider\Domain\Model\CallAcl\CallAclDto($id)
                : null;

            return $this->setCallAcl($value);
        }

        /**
         * @return integer | null
         */
        public function getCallAclId()
        {
            if ($dto = $this->getCallAcl()) {
                return $dto->getId();
            }

            return null;
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

        /**
         * @param integer $id
         *
         * @return static
         */
        public function setMatchListId($id)
        {
            $value = $id
                ? new \Ivoz\Provider\Domain\Model\MatchList\MatchListDto($id)
                : null;

            return $this->setMatchList($value);
        }

        /**
         * @return integer | null
         */
        public function getMatchListId()
        {
            if ($dto = $this->getMatchList()) {
                return $dto->getId();
            }

            return null;
        }
}


