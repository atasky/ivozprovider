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
     * @var \Ivoz\Provider\Domain\Model\TerminalManufacturer\TerminalManufacturerDto | null
     */
    private $terminalManufacturer;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @inheritdoc
     */
    public function normalize(string $context)
    {
        return $this->toArray();
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
        if ($context === self::CONTEXT_SIMPLE) {
            return ['id'];
        }

        return [
            'iden',
            'name',
            'description',
            'genericTemplate',
            'specificTemplate',
            'genericUrlPattern',
            'specificUrlPattern',
            'id',
            'terminalManufacturer'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
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
     * @return static
     */
    public function setIden($iden = null)
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
     * @return static
     */
    public function setName($name = null)
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
     * @return static
     */
    public function setDescription($description = null)
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @param \Ivoz\Provider\Domain\Model\TerminalManufacturer\TerminalManufacturerDto $terminalManufacturer
     *
     * @return static
     */
    public function setTerminalManufacturer(\Ivoz\Provider\Domain\Model\TerminalManufacturer\TerminalManufacturerDto $terminalManufacturer = null)
    {
        $this->terminalManufacturer = $terminalManufacturer;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\TerminalManufacturer\TerminalManufacturerDto
     */
    public function getTerminalManufacturer()
    {
        return $this->terminalManufacturer;
    }
}


