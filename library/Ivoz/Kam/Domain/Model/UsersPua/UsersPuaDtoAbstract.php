<?php

namespace Ivoz\Kam\Domain\Model\UsersPua;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class UsersPuaDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $presUri;

    /**
     * @var string
     */
    private $presId;

    /**
     * @var integer
     */
    private $event;

    /**
     * @var integer
     */
    private $expires;

    /**
     * @var integer
     */
    private $desiredExpires;

    /**
     * @var integer
     */
    private $flag;

    /**
     * @var string
     */
    private $etag;

    /**
     * @var string
     */
    private $tupleId;

    /**
     * @var string
     */
    private $watcherUri;

    /**
     * @var string
     */
    private $callId;

    /**
     * @var string
     */
    private $toTag;

    /**
     * @var string
     */
    private $fromTag;

    /**
     * @var integer
     */
    private $cseq;

    /**
     * @var string
     */
    private $recordRoute;

    /**
     * @var string
     */
    private $contact;

    /**
     * @var string
     */
    private $remoteContact;

    /**
     * @var integer
     */
    private $version;

    /**
     * @var string
     */
    private $extraHeaders;

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
            'presUri' => $this->getPresUri(),
            'presId' => $this->getPresId(),
            'event' => $this->getEvent(),
            'expires' => $this->getExpires(),
            'desiredExpires' => $this->getDesiredExpires(),
            'flag' => $this->getFlag(),
            'etag' => $this->getEtag(),
            'tupleId' => $this->getTupleId(),
            'watcherUri' => $this->getWatcherUri(),
            'callId' => $this->getCallId(),
            'toTag' => $this->getToTag(),
            'fromTag' => $this->getFromTag(),
            'cseq' => $this->getCseq(),
            'recordRoute' => $this->getRecordRoute(),
            'contact' => $this->getContact(),
            'remoteContact' => $this->getRemoteContact(),
            'version' => $this->getVersion(),
            'extraHeaders' => $this->getExtraHeaders(),
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
     * @param string $presUri
     *
     * @return UsersPuaDtoAbstract
     */
    public function setPresUri($presUri)
    {
        $this->presUri = $presUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getPresUri()
    {
        return $this->presUri;
    }

    /**
     * @param string $presId
     *
     * @return UsersPuaDtoAbstract
     */
    public function setPresId($presId)
    {
        $this->presId = $presId;

        return $this;
    }

    /**
     * @return string
     */
    public function getPresId()
    {
        return $this->presId;
    }

    /**
     * @param integer $event
     *
     * @return UsersPuaDtoAbstract
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param integer $expires
     *
     * @return UsersPuaDtoAbstract
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param integer $desiredExpires
     *
     * @return UsersPuaDtoAbstract
     */
    public function setDesiredExpires($desiredExpires)
    {
        $this->desiredExpires = $desiredExpires;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDesiredExpires()
    {
        return $this->desiredExpires;
    }

    /**
     * @param integer $flag
     *
     * @return UsersPuaDtoAbstract
     */
    public function setFlag($flag)
    {
        $this->flag = $flag;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlag()
    {
        return $this->flag;
    }

    /**
     * @param string $etag
     *
     * @return UsersPuaDtoAbstract
     */
    public function setEtag($etag)
    {
        $this->etag = $etag;

        return $this;
    }

    /**
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * @param string $tupleId
     *
     * @return UsersPuaDtoAbstract
     */
    public function setTupleId($tupleId = null)
    {
        $this->tupleId = $tupleId;

        return $this;
    }

    /**
     * @return string
     */
    public function getTupleId()
    {
        return $this->tupleId;
    }

    /**
     * @param string $watcherUri
     *
     * @return UsersPuaDtoAbstract
     */
    public function setWatcherUri($watcherUri)
    {
        $this->watcherUri = $watcherUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getWatcherUri()
    {
        return $this->watcherUri;
    }

    /**
     * @param string $callId
     *
     * @return UsersPuaDtoAbstract
     */
    public function setCallId($callId)
    {
        $this->callId = $callId;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallId()
    {
        return $this->callId;
    }

    /**
     * @param string $toTag
     *
     * @return UsersPuaDtoAbstract
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
     * @param string $fromTag
     *
     * @return UsersPuaDtoAbstract
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
     * @param integer $cseq
     *
     * @return UsersPuaDtoAbstract
     */
    public function setCseq($cseq)
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
     * @param string $recordRoute
     *
     * @return UsersPuaDtoAbstract
     */
    public function setRecordRoute($recordRoute = null)
    {
        $this->recordRoute = $recordRoute;

        return $this;
    }

    /**
     * @return string
     */
    public function getRecordRoute()
    {
        return $this->recordRoute;
    }

    /**
     * @param string $contact
     *
     * @return UsersPuaDtoAbstract
     */
    public function setContact($contact)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * @return string
     */
    public function getContact()
    {
        return $this->contact;
    }

    /**
     * @param string $remoteContact
     *
     * @return UsersPuaDtoAbstract
     */
    public function setRemoteContact($remoteContact)
    {
        $this->remoteContact = $remoteContact;

        return $this;
    }

    /**
     * @return string
     */
    public function getRemoteContact()
    {
        return $this->remoteContact;
    }

    /**
     * @param integer $version
     *
     * @return UsersPuaDtoAbstract
     */
    public function setVersion($version)
    {
        $this->version = $version;

        return $this;
    }

    /**
     * @return integer
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * @param string $extraHeaders
     *
     * @return UsersPuaDtoAbstract
     */
    public function setExtraHeaders($extraHeaders)
    {
        $this->extraHeaders = $extraHeaders;

        return $this;
    }

    /**
     * @return string
     */
    public function getExtraHeaders()
    {
        return $this->extraHeaders;
    }

    /**
     * @param integer $id
     *
     * @return UsersPuaDtoAbstract
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


