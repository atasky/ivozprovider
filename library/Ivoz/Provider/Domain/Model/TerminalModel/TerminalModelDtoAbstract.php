<?php

namespace Ivoz\Provider\Domain\Model\TerminalModel;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class TerminalModelDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $iden;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $genericTemplate;

    /**
     * @var string
     */
    private $specificTemplate;

    /**
     * @var string
     */
    private $genericUrlPattern;

    /**
     * @var string
     */
    private $specificUrlPattern;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $terminalManufacturerId;

    /**
     * @var mixed
     */
    private $terminalManufacturer;

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
            'iden' => $this->getIden(),
            'name' => $this->getName(),
            'description' => $this->getDescription(),
            'genericTemplate' => $this->getGenericTemplate(),
            'specificTemplate' => $this->getSpecificTemplate(),
            'genericUrlPattern' => $this->getGenericUrlPattern(),
            'specificUrlPattern' => $this->getSpecificUrlPattern(),
            'id' => $this->getId(),
            'terminalManufacturer' => $this->getTerminalManufacturer()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->terminalManufacturer = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\TerminalManufacturer\\TerminalManufacturer', $this->getTerminalManufacturerId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $iden
     *
     * @return TerminalModelDtoAbstract
     */
    public function setIden($iden)
    {
        $this->iden = $iden;

        return $this;
    }

    /**
     * @return string
     */
    public function getIden()
    {
        return $this->iden;
    }

    /**
     * @param string $name
     *
     * @return TerminalModelDtoAbstract
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $description
     *
     * @return TerminalModelDtoAbstract
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
     * @param string $genericTemplate
     *
     * @return TerminalModelDtoAbstract
     */
    public function setGenericTemplate($genericTemplate = null)
    {
        $this->genericTemplate = $genericTemplate;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenericTemplate()
    {
        return $this->genericTemplate;
    }

    /**
     * @param string $specificTemplate
     *
     * @return TerminalModelDtoAbstract
     */
    public function setSpecificTemplate($specificTemplate = null)
    {
        $this->specificTemplate = $specificTemplate;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpecificTemplate()
    {
        return $this->specificTemplate;
    }

    /**
     * @param string $genericUrlPattern
     *
     * @return TerminalModelDtoAbstract
     */
    public function setGenericUrlPattern($genericUrlPattern = null)
    {
        $this->genericUrlPattern = $genericUrlPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getGenericUrlPattern()
    {
        return $this->genericUrlPattern;
    }

    /**
     * @param string $specificUrlPattern
     *
     * @return TerminalModelDtoAbstract
     */
    public function setSpecificUrlPattern($specificUrlPattern = null)
    {
        $this->specificUrlPattern = $specificUrlPattern;

        return $this;
    }

    /**
     * @return string
     */
    public function getSpecificUrlPattern()
    {
        return $this->specificUrlPattern;
    }

    /**
     * @param integer $id
     *
     * @return TerminalModelDtoAbstract
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
     * @param integer $terminalManufacturerId
     *
     * @return TerminalModelDtoAbstract
     */
    public function setTerminalManufacturerId($terminalManufacturerId)
    {
        $this->terminalManufacturerId = $terminalManufacturerId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTerminalManufacturerId()
    {
        return $this->terminalManufacturerId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\TerminalManufacturer\TerminalManufacturer $terminalManufacturer
     *
     * @return TerminalModelDtoAbstract
     */
    public function setTerminalManufacturer(\Ivoz\Provider\Domain\Model\TerminalManufacturer\TerminalManufacturer $terminalManufacturer)
    {
        $this->terminalManufacturer = $terminalManufacturer;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\TerminalManufacturer\TerminalManufacturer
     */
    public function getTerminalManufacturer()
    {
        return $this->terminalManufacturer;
    }
}


