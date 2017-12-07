<?php

namespace Ivoz\Provider\Domain\Model\Changelog;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ChangelogDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $entity;

    /**
     * @var string
     */
    private $entityId;

    /**
     * @var array
     */
    private $data;

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
     * @var mixed
     */
    private $commandId;

    /**
     * @var mixed
     */
    private $command;

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
            'entity' => $this->getEntity(),
            'entityId' => $this->getEntityId(),
            'data' => $this->getData(),
            'createdOn' => $this->getCreatedOn(),
            'microtime' => $this->getMicrotime(),
            'id' => $this->getId(),
            'command' => $this->getCommand()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->command = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Commandlog\\Commandlog', $this->getCommandId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $entity
     *
     * @return ChangelogDtoAbstract
     */
    public function setEntity($entity)
    {
        $this->entity = $entity;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntity()
    {
        return $this->entity;
    }

    /**
     * @param string $entityId
     *
     * @return ChangelogDtoAbstract
     */
    public function setEntityId($entityId)
    {
        $this->entityId = $entityId;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntityId()
    {
        return $this->entityId;
    }

    /**
     * @param array $data
     *
     * @return ChangelogDtoAbstract
     */
    public function setData($data = null)
    {
        $this->data = $data;

        return $this;
    }

    /**
     * @return array
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param \DateTime $createdOn
     *
     * @return ChangelogDtoAbstract
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
     * @return ChangelogDtoAbstract
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
     * @return ChangelogDtoAbstract
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

    /**
     * @param integer $commandId
     *
     * @return ChangelogDtoAbstract
     */
    public function setCommandId($commandId)
    {
        $this->commandId = $commandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCommandId()
    {
        return $this->commandId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Commandlog\Commandlog $command
     *
     * @return ChangelogDtoAbstract
     */
    public function setCommand(\Ivoz\Provider\Domain\Model\Commandlog\Commandlog $command)
    {
        $this->command = $command;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Commandlog\Commandlog
     */
    public function getCommand()
    {
        return $this->command;
    }
}


