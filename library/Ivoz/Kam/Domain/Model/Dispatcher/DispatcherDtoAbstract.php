<?php

namespace Ivoz\Kam\Domain\Model\Dispatcher;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class DispatcherDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $setid = '0';

    /**
     * @var string
     */
    private $destination = '';

    /**
     * @var integer
     */
    private $flags = '0';

    /**
     * @var integer
     */
    private $priority = '0';

    /**
     * @var string
     */
    private $attrs = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $applicationServerId;

    /**
     * @var mixed
     */
    private $applicationServer;

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
            'setid' => $this->getSetid(),
            'destination' => $this->getDestination(),
            'flags' => $this->getFlags(),
            'priority' => $this->getPriority(),
            'attrs' => $this->getAttrs(),
            'description' => $this->getDescription(),
            'id' => $this->getId(),
            'applicationServerId' => $this->getApplicationServerId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->applicationServer = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ApplicationServer\\ApplicationServer', $this->getApplicationServerId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $setid
     *
     * @return DispatcherDtoAbstract
     */
    public function setSetid($setid)
    {
        $this->setid = $setid;

        return $this;
    }

    /**
     * @return integer
     */
    public function getSetid()
    {
        return $this->setid;
    }

    /**
     * @param string $destination
     *
     * @return DispatcherDtoAbstract
     */
    public function setDestination($destination)
    {
        $this->destination = $destination;

        return $this;
    }

    /**
     * @return string
     */
    public function getDestination()
    {
        return $this->destination;
    }

    /**
     * @param integer $flags
     *
     * @return DispatcherDtoAbstract
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param integer $priority
     *
     * @return DispatcherDtoAbstract
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
     * @param string $attrs
     *
     * @return DispatcherDtoAbstract
     */
    public function setAttrs($attrs)
    {
        $this->attrs = $attrs;

        return $this;
    }

    /**
     * @return string
     */
    public function getAttrs()
    {
        return $this->attrs;
    }

    /**
     * @param string $description
     *
     * @return DispatcherDtoAbstract
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param integer $id
     *
     * @return DispatcherDtoAbstract
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
     * @param integer $applicationServerId
     *
     * @return DispatcherDtoAbstract
     */
    public function setApplicationServerId($applicationServerId)
    {
        $this->applicationServerId = $applicationServerId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getApplicationServerId()
    {
        return $this->applicationServerId;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ApplicationServer\ApplicationServer
     */
    public function getApplicationServer()
    {
        return $this->applicationServer;
    }
}


