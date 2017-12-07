<?php

namespace Ivoz\Provider\Domain\Model\TransformationRuleSet;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class TransformationRuleSetDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $description;

    /**
     * @var string
     */
    private $internationalCode = '00';

    /**
     * @var string
     */
    private $trunkPrefix = '';

    /**
     * @var string
     */
    private $areaCode = '';

    /**
     * @var integer
     */
    private $nationalLen = 9;

    /**
     * @var boolean
     */
    private $generateRules = 0;

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
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $countryId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $country;

    /**
     * @var array|null
     */
    private $rules = null;

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
            'description' => $this->getDescription(),
            'internationalCode' => $this->getInternationalCode(),
            'trunkPrefix' => $this->getTrunkPrefix(),
            'areaCode' => $this->getAreaCode(),
            'nationalLen' => $this->getNationalLen(),
            'generateRules' => $this->getGenerateRules(),
            'id' => $this->getId(),
            'name' => [
                'en' => $this->getNameEn(),
                'es' => $this->getNameEs()
            ],
            'brand' => $this->getBrand(),
            'country' => $this->getCountry(),
            'rules' => $this->getRules()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->country = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getCountryId());
        if (!is_null($this->rules)) {
            $items = $this->getRules();
            $this->rules = [];
            foreach ($items as $item) {
                $this->rules[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\TransformationRule\\TransformationRule',
                    $item->getId() ?? $item
                );
            }
        }

    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {
        $this->rules = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\TransformationRule\\TransformationRule',
            $this->rules
        );
    }

    /**
     * @param string $description
     *
     * @return TransformationRuleSetDtoAbstract
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
     * @param string $internationalCode
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setInternationalCode($internationalCode = null)
    {
        $this->internationalCode = $internationalCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getInternationalCode()
    {
        return $this->internationalCode;
    }

    /**
     * @param string $trunkPrefix
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setTrunkPrefix($trunkPrefix = null)
    {
        $this->trunkPrefix = $trunkPrefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getTrunkPrefix()
    {
        return $this->trunkPrefix;
    }

    /**
     * @param string $areaCode
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setAreaCode($areaCode = null)
    {
        $this->areaCode = $areaCode;

        return $this;
    }

    /**
     * @return string
     */
    public function getAreaCode()
    {
        return $this->areaCode;
    }

    /**
     * @param integer $nationalLen
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setNationalLen($nationalLen = null)
    {
        $this->nationalLen = $nationalLen;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNationalLen()
    {
        return $this->nationalLen;
    }

    /**
     * @param boolean $generateRules
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setGenerateRules($generateRules = null)
    {
        $this->generateRules = $generateRules;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getGenerateRules()
    {
        return $this->generateRules;
    }

    /**
     * @param integer $id
     *
     * @return TransformationRuleSetDtoAbstract
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
     * @return TransformationRuleSetDtoAbstract
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
     * @return TransformationRuleSetDtoAbstract
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
     * @param integer $brandId
     *
     * @return TransformationRuleSetDtoAbstract
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
     * @return TransformationRuleSetDtoAbstract
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
     * @param integer $countryId
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setCountryId($countryId)
    {
        $this->countryId = $countryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getCountryId()
    {
        return $this->countryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $country
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setCountry(\Ivoz\Provider\Domain\Model\Country\Country $country)
    {
        $this->country = $country;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * @param array $rules
     *
     * @return TransformationRuleSetDtoAbstract
     */
    public function setRules($rules)
    {
        $this->rules = $rules;

        return $this;
    }

    /**
     * @return array
     */
    public function getRules()
    {
        return $this->rules;
    }
}


