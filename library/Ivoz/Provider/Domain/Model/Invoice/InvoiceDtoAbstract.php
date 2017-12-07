<?php

namespace Ivoz\Provider\Domain\Model\Invoice;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class InvoiceDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $number;

    /**
     * @var \DateTime
     */
    private $inDate;

    /**
     * @var \DateTime
     */
    private $outDate;

    /**
     * @var string
     */
    private $total;

    /**
     * @var string
     */
    private $taxRate;

    /**
     * @var string
     */
    private $totalWithTax;

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
    private $pdfFileSize;

    /**
     * @var string
     */
    private $pdfMimeType;

    /**
     * @var string
     */
    private $pdfBaseName;

    /**
     * @var mixed
     */
    private $invoiceTemplateId;

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
    private $invoiceTemplate;

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
            'number' => $this->getNumber(),
            'inDate' => $this->getInDate(),
            'outDate' => $this->getOutDate(),
            'total' => $this->getTotal(),
            'taxRate' => $this->getTaxRate(),
            'totalWithTax' => $this->getTotalWithTax(),
            'status' => $this->getStatus(),
            'id' => $this->getId(),
            'pdf' => [
                'fileSize' => $this->getPdfFileSize(),
                'mimeType' => $this->getPdfMimeType(),
                'baseName' => $this->getPdfBaseName()
            ],
            'invoiceTemplate' => $this->getInvoiceTemplate(),
            'brand' => $this->getBrand(),
            'company' => $this->getCompany()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->invoiceTemplate = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\InvoiceTemplate\\InvoiceTemplate', $this->getInvoiceTemplateId());
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
     * @param string $number
     *
     * @return InvoiceDtoAbstract
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * @param \DateTime $inDate
     *
     * @return InvoiceDtoAbstract
     */
    public function setInDate($inDate = null)
    {
        $this->inDate = $inDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getInDate()
    {
        return $this->inDate;
    }

    /**
     * @param \DateTime $outDate
     *
     * @return InvoiceDtoAbstract
     */
    public function setOutDate($outDate = null)
    {
        $this->outDate = $outDate;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getOutDate()
    {
        return $this->outDate;
    }

    /**
     * @param string $total
     *
     * @return InvoiceDtoAbstract
     */
    public function setTotal($total = null)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * @return string
     */
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * @param string $taxRate
     *
     * @return InvoiceDtoAbstract
     */
    public function setTaxRate($taxRate = null)
    {
        $this->taxRate = $taxRate;

        return $this;
    }

    /**
     * @return string
     */
    public function getTaxRate()
    {
        return $this->taxRate;
    }

    /**
     * @param string $totalWithTax
     *
     * @return InvoiceDtoAbstract
     */
    public function setTotalWithTax($totalWithTax = null)
    {
        $this->totalWithTax = $totalWithTax;

        return $this;
    }

    /**
     * @return string
     */
    public function getTotalWithTax()
    {
        return $this->totalWithTax;
    }

    /**
     * @param string $status
     *
     * @return InvoiceDtoAbstract
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
     * @return InvoiceDtoAbstract
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
     * @param integer $pdfFileSize
     *
     * @return InvoiceDtoAbstract
     */
    public function setPdfFileSize($pdfFileSize)
    {
        $this->pdfFileSize = $pdfFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPdfFileSize()
    {
        return $this->pdfFileSize;
    }

    /**
     * @param string $pdfMimeType
     *
     * @return InvoiceDtoAbstract
     */
    public function setPdfMimeType($pdfMimeType)
    {
        $this->pdfMimeType = $pdfMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getPdfMimeType()
    {
        return $this->pdfMimeType;
    }

    /**
     * @param string $pdfBaseName
     *
     * @return InvoiceDtoAbstract
     */
    public function setPdfBaseName($pdfBaseName)
    {
        $this->pdfBaseName = $pdfBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getPdfBaseName()
    {
        return $this->pdfBaseName;
    }

    /**
     * @param integer $invoiceTemplateId
     *
     * @return InvoiceDtoAbstract
     */
    public function setInvoiceTemplateId($invoiceTemplateId)
    {
        $this->invoiceTemplateId = $invoiceTemplateId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getInvoiceTemplateId()
    {
        return $this->invoiceTemplateId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplate $invoiceTemplate
     *
     * @return InvoiceDtoAbstract
     */
    public function setInvoiceTemplate(\Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplate $invoiceTemplate)
    {
        $this->invoiceTemplate = $invoiceTemplate;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\InvoiceTemplate\InvoiceTemplate
     */
    public function getInvoiceTemplate()
    {
        return $this->invoiceTemplate;
    }

    /**
     * @param integer $brandId
     *
     * @return InvoiceDtoAbstract
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
     * @return InvoiceDtoAbstract
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
     * @return InvoiceDtoAbstract
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
     * @return InvoiceDtoAbstract
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


