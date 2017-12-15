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
     * @var \Ivoz\Provider\Domain\Model\Brand\BrandDto | null
     */
    private $brand;

    /**
     * @var \Ivoz\Provider\Domain\Model\FixedCost\FixedCostDto | null
     */
    private $fixedCost;

    /**
     * @var \Ivoz\Provider\Domain\Model\Invoice\InvoiceDto | null
     */
    private $invoice;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return $this->toArray();
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
    public static function getPropertyMap()
    {
        return [
            'quantity',
            'id',
            'brand',
            'fixedCost',
            'invoice'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
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
     * @return static
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
     * @param \Ivoz\Provider\Domain\Model\Brand\BrandDto $brand
     *
     * @return static
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\BrandDto $brand = null)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Brand\BrandDto
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\FixedCost\FixedCostDto $fixedCost
     *
     * @return static
     */
    public function setFixedCost(\Ivoz\Provider\Domain\Model\FixedCost\FixedCostDto $fixedCost = null)
    {
        $this->fixedCost = $fixedCost;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\FixedCost\FixedCostDto
     */
    public function getFixedCost()
    {
        return $this->fixedCost;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Invoice\InvoiceDto $invoice
     *
     * @return static
     */
    public function setInvoice(\Ivoz\Provider\Domain\Model\Invoice\InvoiceDto $invoice = null)
    {
        $this->invoice = $invoice;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Invoice\InvoiceDto
     */
    public function getInvoice()
    {
        return $this->invoice;
    }
}


