<?php

namespace Ivoz\Provider\Domain\Model\FixedCostsRelInvoice;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class FixedCostsRelInvoiceDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $quantity;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $fixedCostId;

    /**
     * @var mixed
     */
    private $invoiceId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $fixedCost;

    /**
     * @var mixed
     */
    private $invoice;

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
            'quantity' => $this->getQuantity(),
            'id' => $this->getId(),
            'brand' => $this->getBrand(),
            'fixedCost' => $this->getFixedCost(),
            'invoice' => $this->getInvoice()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->fixedCost = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\FixedCost\\FixedCost', $this->getFixedCostId());
        $this->invoice = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Invoice\\Invoice', $this->getInvoiceId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $quantity
     *
     * @return FixedCostsRelInvoiceDtoAbstract
     */
    public function setQuantity($quantity = null)
    {
        $this->quantity = $quantity;

        return $this;
    }

    /**
     * @return integer
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param integer $id
     *
     * @return FixedCostsRelInvoiceDtoAbstract
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
     * @param integer $brandId
     *
     * @return FixedCostsRelInvoiceDtoAbstract
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
     * @return FixedCostsRelInvoiceDtoAbstract
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
     * @param integer $fixedCostId
     *
     * @return FixedCostsRelInvoiceDtoAbstract
     */
    public function setFixedCostId($fixedCostId)
    {
        $this->fixedCostId = $fixedCostId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFixedCostId()
    {
        return $this->fixedCostId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\FixedCost\FixedCost $fixedCost
     *
     * @return FixedCostsRelInvoiceDtoAbstract
     */
    public function setFixedCost(\Ivoz\Provider\Domain\Model\FixedCost\FixedCost $fixedCost)
    {
        $this->fixedCost = $fixedCost;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\FixedCost\FixedCost
     */
    public function getFixedCost()
    {
        return $this->fixedCost;
    }

    /**
     * @param integer $invoiceId
     *
     * @return FixedCostsRelInvoiceDtoAbstract
     */
    public function setInvoiceId($invoiceId)
    {
        $this->invoiceId = $invoiceId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getInvoiceId()
    {
        return $this->invoiceId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Invoice\Invoice $invoice
     *
     * @return FixedCostsRelInvoiceDtoAbstract
     */
    public function setInvoice(\Ivoz\Provider\Domain\Model\Invoice\Invoice $invoice)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Invoice\Invoice
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}


