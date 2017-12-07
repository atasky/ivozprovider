<?php

namespace Ivoz\Provider\Domain\Model\Commandlog;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class CommandlogDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var guid
     */
    private $requestId;

    /**
     * @var string
     */
    private $class;

    /**
     * @var string
     */
    private $method;

    /**
     * @var array
     */
    private $arguments;

    /**
     * @var \DateTime
     */
    private $createdOn;

    /**
     * @var integer
     */
    private $microtime;

    /**
     * @var guid
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
            'requestId' => $this->getRequestId(),
            'class' => $this->getClass(),
            'method' => $this->getMethod(),
            'arguments' => $this->getArguments(),
            'createdOn' => $this->getCreatedOn(),
            'microtime' => $this->getMicrotime(),
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
     * @param guid $requestId
     *
     * @return CommandlogDtoAbstract
     */
    public function setRequestId($requestId)
    {
        $this->requestId = $requestId;

        return $this;
    }

    /**
     * @return guid
     */
    public function getRequestId()
    {
        return $this->requestId;
    }

    /**
     * @param string $class
     *
     * @return CommandlogDtoAbstract
     */
    public function setClass($class)
    {
        $this->class = $class;

        return $this;
    }

    /**
     * @return string
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param string $method
     *
     * @return CommandlogDtoAbstract
     */
    public function setMethod($method = null)
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
     * @param array $arguments
     *
     * @return CommandlogDtoAbstract
     */
    public function setArguments($arguments = null)
    {
        $this->arguments = $arguments;

        return $this;
    }

    /**
     * @return array
     */
    public function getArguments()
    {
        return $this->arguments;
    }

    /**
     * @param \DateTime $createdOn
     *
     * @return CommandlogDtoAbstract
     */
    public function setCreatedOn($createdOn)
    {
        $this->createdOn = $createdOn;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreatedOn()
    {
        return $this->createdOn;
    }

    /**
     * @param integer $microtime
     *
     * @return CommandlogDtoAbstract
     */
    public function setMicrotime($microtime)
    {
        $this->microtime = $microtime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMicrotime()
    {
        return $this->microtime;
    }

    /**
     * @param guid $id
     *
     * @return CommandlogDtoAbstract
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * @return guid
     */
    public function getId()
    {
        return $this->id;
    }
}


