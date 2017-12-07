<?php

namespace Ivoz\Provider\Domain\Model\Country;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class CountryDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $code = '';

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nameEn;

    /**
     * @var string
     */
    private $nameEs;

    /**
     * @var string
     */
    private $zoneEn = '';

    /**
     * @var string
     */
    private $zoneEs = '';

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
            'code' => $this->getCode(),
            'countryCode' => $this->getCountryCode(),
            'id' => $this->getId(),
            'name' => [
                'en' => $this->getNameEn(),
                'es' => $this->getNameEs()
            ],
            'zone' => [
                'en' => $this->getZoneEn(),
                'es' => $this->getZoneEs()
            ]
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
     * @param string $code
     *
     * @return CountryDtoAbstract
     */
    public function setCode($code)
    {
        $this->code = $code;

        return $this;
    }

    /**
     * @return string
     */
    public function getCode()
    {
        return $this->code;
    }

    /**
     * @param string $countryCode
     *
     * @return CountryDtoAbstract
     */
    public function setCountryCode($countryCode = null)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * @param integer $id
     *
     * @return CountryDtoAbstract
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
     * @param string $nameEn
     *
     * @return CountryDtoAbstract
     */
    public function setNameEn($nameEn)
    {
        $this->nameEn = $nameEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEn()
    {
        return $this->nameEn;
    }

    /**
     * @param string $nameEs
     *
     * @return CountryDtoAbstract
     */
    public function setNameEs($nameEs)
    {
        $this->nameEs = $nameEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getNameEs()
    {
        return $this->nameEs;
    }

    /**
     * @param string $zoneEn
     *
     * @return CountryDtoAbstract
     */
    public function setZoneEn($zoneEn)
    {
        $this->zoneEn = $zoneEn;

        return $this;
    }

    /**
     * @return string
     */
    public function getZoneEn()
    {
        return $this->zoneEn;
    }

    /**
     * @param string $zoneEs
     *
     * @return CountryDtoAbstract
     */
    public function setZoneEs($zoneEs)
    {
        $this->zoneEs = $zoneEs;

        return $this;
    }

    /**
     * @return string
     */
    public function getZoneEs()
    {
        return $this->zoneEs;
    }
}


