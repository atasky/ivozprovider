<?php

namespace Ivoz\Provider\Domain\Model\MusicOnHold;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class MusicOnHoldDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $status;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $originalFileFileSize;

    /**
     * @var string
     */
    private $originalFileMimeType;

    /**
     * @var string
     */
    private $originalFileBaseName;

    /**
     * @var integer
     */
    private $encodedFileFileSize;

    /**
     * @var string
     */
    private $encodedFileMimeType;

    /**
     * @var string
     */
    private $encodedFileBaseName;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $company;

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
            'name' => $this->getName(),
            'status' => $this->getStatus(),
            'id' => $this->getId(),
            'originalFile' => [
                'fileSize' => $this->getOriginalFileFileSize(),
                'mimeType' => $this->getOriginalFileMimeType(),
                'baseName' => $this->getOriginalFileBaseName()
            ],
            'encodedFile' => [
                'fileSize' => $this->getEncodedFileFileSize(),
                'mimeType' => $this->getEncodedFileMimeType(),
                'baseName' => $this->getEncodedFileBaseName()
            ],
            'brand' => $this->getBrand(),
            'company' => $this->getCompany()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return MusicOnHoldDtoAbstract
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
     * @param string $status
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setStatus($status = null)
    {
        $this->status = $status;

        return $this;
    }

    /**
     * @return string
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param integer $id
     *
     * @return MusicOnHoldDtoAbstract
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
     * @param integer $originalFileFileSize
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setOriginalFileFileSize($originalFileFileSize)
    {
        $this->originalFileFileSize = $originalFileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOriginalFileFileSize()
    {
        return $this->originalFileFileSize;
    }

    /**
     * @param string $originalFileMimeType
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setOriginalFileMimeType($originalFileMimeType)
    {
        $this->originalFileMimeType = $originalFileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalFileMimeType()
    {
        return $this->originalFileMimeType;
    }

    /**
     * @param string $originalFileBaseName
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setOriginalFileBaseName($originalFileBaseName)
    {
        $this->originalFileBaseName = $originalFileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getOriginalFileBaseName()
    {
        return $this->originalFileBaseName;
    }

    /**
     * @param integer $encodedFileFileSize
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setEncodedFileFileSize($encodedFileFileSize)
    {
        $this->encodedFileFileSize = $encodedFileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getEncodedFileFileSize()
    {
        return $this->encodedFileFileSize;
    }

    /**
     * @param string $encodedFileMimeType
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setEncodedFileMimeType($encodedFileMimeType)
    {
        $this->encodedFileMimeType = $encodedFileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncodedFileMimeType()
    {
        return $this->encodedFileMimeType;
    }

    /**
     * @param string $encodedFileBaseName
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setEncodedFileBaseName($encodedFileBaseName)
    {
        $this->encodedFileBaseName = $encodedFileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getEncodedFileBaseName()
    {
        return $this->encodedFileBaseName;
    }

    /**
     * @param integer $brandId
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Brand\Brand $brand
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $companyId
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setCompanyId($companyId)
    {
        $this->companyId = $companyId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCompanyId()
    {
        return $this->companyId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Company\Company $company
     *
     * @return MusicOnHoldDtoAbstract
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Company\Company
     */
    public function getCompany()
    {
        return $this->company;
    }
}


