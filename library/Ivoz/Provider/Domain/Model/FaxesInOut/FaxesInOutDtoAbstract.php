<?php

namespace Ivoz\Provider\Domain\Model\FaxesInOut;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class FaxesInOutDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var \DateTime
     */
    private $calldate;

    /**
     * @var string
     */
    private $src;

    /**
     * @var string
     */
    private $dst;

    /**
     * @var string
     */
    private $type = 'Out';

    /**
     * @var string
     */
    private $pages;

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
    private $fileFileSize;

    /**
     * @var string
     */
    private $fileMimeType;

    /**
     * @var string
     */
    private $fileBaseName;

    /**
     * @var mixed
     */
    private $faxId;

    /**
     * @var mixed
     */
    private $dstCountryId;

    /**
     * @var mixed
     */
    private $fax;

    /**
     * @var mixed
     */
    private $dstCountry;

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
            'calldate' => $this->getCalldate(),
            'src' => $this->getSrc(),
            'dst' => $this->getDst(),
            'type' => $this->getType(),
            'pages' => $this->getPages(),
            'status' => $this->getStatus(),
            'id' => $this->getId(),
            'file' => [
                'fileSize' => $this->getFileFileSize(),
                'mimeType' => $this->getFileMimeType(),
                'baseName' => $this->getFileBaseName()
            ],
            'fax' => $this->getFax(),
            'dstCountry' => $this->getDstCountry()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->fax = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Fax\\Fax', $this->getFaxId());
        $this->dstCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getDstCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param \DateTime $calldate
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setCalldate($calldate)
    {
        $this->calldate = $calldate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCalldate()
    {
        return $this->calldate;
    }

    /**
     * @param string $src
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setSrc($src = null)
    {
        $this->src = $src;

        return $this;
    }

    /**
     * @return string
     */
    public function getSrc()
    {
        return $this->src;
    }

    /**
     * @param string $dst
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setDst($dst = null)
    {
        $this->dst = $dst;

        return $this;
    }

    /**
     * @return string
     */
    public function getDst()
    {
        return $this->dst;
    }

    /**
     * @param string $type
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setType($type = null)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param string $pages
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setPages($pages = null)
    {
        $this->pages = $pages;

        return $this;
    }

    /**
     * @return string
     */
    public function getPages()
    {
        return $this->pages;
    }

    /**
     * @param string $status
     *
     * @return FaxesInOutDtoAbstract
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
     * @return FaxesInOutDtoAbstract
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
     * @param integer $fileFileSize
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setFileFileSize($fileFileSize)
    {
        $this->fileFileSize = $fileFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFileFileSize()
    {
        return $this->fileFileSize;
    }

    /**
     * @param string $fileMimeType
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setFileMimeType($fileMimeType)
    {
        $this->fileMimeType = $fileMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileMimeType()
    {
        return $this->fileMimeType;
    }

    /**
     * @param string $fileBaseName
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setFileBaseName($fileBaseName)
    {
        $this->fileBaseName = $fileBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFileBaseName()
    {
        return $this->fileBaseName;
    }

    /**
     * @param integer $faxId
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setFaxId($faxId)
    {
        $this->faxId = $faxId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFaxId()
    {
        return $this->faxId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Fax\Fax $fax
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setFax(\Ivoz\Provider\Domain\Model\Fax\Fax $fax)
    {
        $this->fax = $fax;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Fax\Fax
     */
    public function getFax()
    {
        return $this->fax;
    }

    /**
     * @param integer $dstCountryId
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setDstCountryId($dstCountryId)
    {
        $this->dstCountryId = $dstCountryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getDstCountryId()
    {
        return $this->dstCountryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $dstCountry
     *
     * @return FaxesInOutDtoAbstract
     */
    public function setDstCountry(\Ivoz\Provider\Domain\Model\Country\Country $dstCountry)
    {
        $this->dstCountry = $dstCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getDstCountry()
    {
        return $this->dstCountry;
    }
}


