<?php

namespace Ivoz\Kam\Domain\Model\UsersMissedCall;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class UsersMissedCallDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $method = '';

    /**
     * @var string
     */
    private $fromTag = '';

    /**
     * @var string
     */
    private $toTag = '';

    /**
     * @var string
     */
    private $callid = '';

    /**
     * @var string
     */
    private $sipCode = '';

    /**
     * @var string
     */
    private $sipReason = '';

    /**
     * @var string
     */
    private $srcIp;

    /**
     * @var string
     */
    private $fromUser;

    /**
     * @var string
     */
    private $fromDomain;

    /**
     * @var string
     */
    private $ruriUser;

    /**
     * @var string
     */
    private $ruriDomain;

    /**
     * @var integer
     */
    private $cseq;

    /**
     * @var \DateTime
     */
    private $localtime;

    /**
     * @var string
     */
    private $utctime;

    /**
     * @var integer
     */
    private $id;

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
            'method' => $this->getMethod(),
            'fromTag' => $this->getFromTag(),
            'toTag' => $this->getToTag(),
            'callid' => $this->getCallid(),
            'sipCode' => $this->getSipCode(),
            'sipReason' => $this->getSipReason(),
            'srcIp' => $this->getSrcIp(),
            'fromUser' => $this->getFromUser(),
            'fromDomain' => $this->getFromDomain(),
            'ruriUser' => $this->getRuriUser(),
            'ruriDomain' => $this->getRuriDomain(),
            'cseq' => $this->getCseq(),
            'localtime' => $this->getLocaltime(),
            'utctime' => $this->getUtctime(),
            'id' => $this->getId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $method
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setMethod($method)
    {
        $this->method = $method;

        return $this;
    }

    /**
     * @return string
     */
    public function getMethod()
    {
        return $this->method;
    }

    /**
     * @param string $fromTag
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setFromTag($fromTag)
    {
        $this->fromTag = $fromTag;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromTag()
    {
        return $this->fromTag;
    }

    /**
     * @param string $toTag
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setToTag($toTag)
    {
        $this->toTag = $toTag;

        return $this;
    }

    /**
     * @return string
     */
    public function getToTag()
    {
        return $this->toTag;
    }

    /**
     * @param string $callid
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setCallid($callid)
    {
        $this->callid = $callid;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallid()
    {
        return $this->callid;
    }

    /**
     * @param string $sipCode
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setSipCode($sipCode)
    {
        $this->sipCode = $sipCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getSipCode()
    {
        return $this->sipCode;
    }

    /**
     * @param string $sipReason
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setSipReason($sipReason)
    {
        $this->sipReason = $sipReason;

        return $this;
    }

    /**
     * @return string
     */
    public function getSipReason()
    {
        return $this->sipReason;
    }

    /**
     * @param string $srcIp
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setSrcIp($srcIp = null)
    {
        $this->srcIp = $srcIp;

        return $this;
    }

    /**
     * @return string
     */
    public function getSrcIp()
    {
        return $this->srcIp;
    }

    /**
     * @param string $fromUser
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setFromUser($fromUser = null)
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }

    /**
     * @param string $fromDomain
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setFromDomain($fromDomain = null)
    {
        $this->fromDomain = $fromDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromDomain()
    {
        return $this->fromDomain;
    }

    /**
     * @param string $ruriUser
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setRuriUser($ruriUser = null)
    {
        $this->ruriUser = $ruriUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getRuriUser()
    {
        return $this->ruriUser;
    }

    /**
     * @param string $ruriDomain
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setRuriDomain($ruriDomain = null)
    {
        $this->ruriDomain = $ruriDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getRuriDomain()
    {
        return $this->ruriDomain;
    }

    /**
     * @param integer $cseq
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setCseq($cseq = null)
    {
        $this->cseq = $cseq;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCseq()
    {
        return $this->cseq;
    }

    /**
     * @param \DateTime $localtime
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setLocaltime($localtime)
    {
        $this->localtime = $localtime;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getLocaltime()
    {
        return $this->localtime;
    }

    /**
     * @param string $utctime
     *
     * @return UsersMissedCallDtoAbstract
     */
    public function setUtctime($utctime = null)
    {
        $this->utctime = $utctime;

        return $this;
    }

    /**
     * @return string
     */
    public function getUtctime()
    {
        return $this->utctime;
    }

    /**
     * @param integer $id
     *
     * @return UsersMissedCallDtoAbstract
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
}


