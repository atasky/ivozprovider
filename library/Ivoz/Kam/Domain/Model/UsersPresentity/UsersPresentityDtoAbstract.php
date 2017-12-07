<?php

namespace Ivoz\Kam\Domain\Model\UsersPresentity;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class UsersPresentityDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $username;

    /**
     * @var string
     */
    private $domain;

    /**
     * @var string
     */
    private $event;

    /**
     * @var string
     */
    private $etag;

    /**
     * @var integer
     */
    private $expires;

    /**
     * @var integer
     */
    private $receivedTime;

    /**
     * @var string
     */
    private $body;

    /**
     * @var string
     */
    private $sender;

    /**
     * @var integer
     */
    private $priority = '0';

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
            'username' => $this->getUsername(),
            'domain' => $this->getDomain(),
            'event' => $this->getEvent(),
            'etag' => $this->getEtag(),
            'expires' => $this->getExpires(),
            'receivedTime' => $this->getReceivedTime(),
            'body' => $this->getBody(),
            'sender' => $this->getSender(),
            'priority' => $this->getPriority(),
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
     * @param string $username
     *
     * @return UsersPresentityDtoAbstract
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * @return string
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param string $domain
     *
     * @return UsersPresentityDtoAbstract
     */
    public function setDomain($domain)
    {
        $this->domain = $domain;

        return $this;
    }

    /**
     * @return string
     */
    public function getDomain()
    {
        return $this->domain;
    }

    /**
     * @param string $event
     *
     * @return UsersPresentityDtoAbstract
     */
    public function setEvent($event)
    {
        $this->event = $event;

        return $this;
    }

    /**
     * @return string
     */
    public function getEvent()
    {
        return $this->event;
    }

    /**
     * @param string $etag
     *
     * @return UsersPresentityDtoAbstract
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
     * @param integer $expires
     *
     * @return UsersPresentityDtoAbstract
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
     * @param integer $receivedTime
     *
     * @return UsersPresentityDtoAbstract
     */
    public function setReceivedTime($receivedTime)
    {
        $this->receivedTime = $receivedTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getReceivedTime()
    {
        return $this->receivedTime;
    }

    /**
     * @param string $body
     *
     * @return UsersPresentityDtoAbstract
     */
    public function setBody($body)
    {
        $this->body = $body;

        return $this;
    }

    /**
     * @return string
     */
    public function getBody()
    {
        return $this->body;
    }

    /**
     * @param string $sender
     *
     * @return UsersPresentityDtoAbstract
     */
    public function setSender($sender)
    {
        $this->sender = $sender;

        return $this;
    }

    /**
     * @return string
     */
    public function getSender()
    {
        return $this->sender;
    }

    /**
     * @param integer $priority
     *
     * @return UsersPresentityDtoAbstract
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
     * @param integer $id
     *
     * @return UsersPresentityDtoAbstract
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


