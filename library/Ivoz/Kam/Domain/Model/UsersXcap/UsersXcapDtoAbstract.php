<?php

namespace Ivoz\Kam\Domain\Model\UsersXcap;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class UsersXcapDtoAbstract implements DataTransferObjectInterface
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
    private $doc;

    /**
     * @var integer
     */
    private $docType;

    /**
     * @var string
     */
    private $etag;

    /**
     * @var integer
     */
    private $source;

    /**
     * @var string
     */
    private $docUri;

    /**
     * @var integer
     */
    private $port;

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
            'doc' => $this->getDoc(),
            'docType' => $this->getDocType(),
            'etag' => $this->getEtag(),
            'source' => $this->getSource(),
            'docUri' => $this->getDocUri(),
            'port' => $this->getPort(),
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
     * @return UsersXcapDtoAbstract
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
     * @return UsersXcapDtoAbstract
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
     * @param string $doc
     *
     * @return UsersXcapDtoAbstract
     */
    public function setDoc($doc)
    {
        $this->doc = $doc;

        return $this;
    }

    /**
     * @return string
     */
    public function getDoc()
    {
        return $this->doc;
    }

    /**
     * @param integer $docType
     *
     * @return UsersXcapDtoAbstract
     */
    public function setDocType($docType)
    {
        $this->docType = $docType;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDocType()
    {
        return $this->docType;
    }

    /**
     * @param string $etag
     *
     * @return UsersXcapDtoAbstract
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
     * @param integer $source
     *
     * @return UsersXcapDtoAbstract
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * @param string $docUri
     *
     * @return UsersXcapDtoAbstract
     */
    public function setDocUri($docUri)
    {
        $this->docUri = $docUri;

        return $this;
    }

    /**
     * @return string
     */
    public function getDocUri()
    {
        return $this->docUri;
    }

    /**
     * @param integer $port
     *
     * @return UsersXcapDtoAbstract
     */
    public function setPort($port)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param integer $id
     *
     * @return UsersXcapDtoAbstract
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


