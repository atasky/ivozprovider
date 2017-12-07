<?php

namespace Ivoz\Provider\Domain\Model\BrandUrl;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class BrandUrlDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $klearTheme = '';

    /**
     * @var string
     */
    private $urlType;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $userTheme = '';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $logoFileSize;

    /**
     * @var string
     */
    private $logoMimeType;

    /**
     * @var string
     */
    private $logoBaseName;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $brand;

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
            'url' => $this->getUrl(),
            'klearTheme' => $this->getKlearTheme(),
            'urlType' => $this->getUrlType(),
            'name' => $this->getName(),
            'userTheme' => $this->getUserTheme(),
            'id' => $this->getId(),
            'logo' => [
                'fileSize' => $this->getLogoFileSize(),
                'mimeType' => $this->getLogoMimeType(),
                'baseName' => $this->getLogoBaseName()
            ],
            'brand' => $this->getBrand()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $url
     *
     * @return BrandUrlDtoAbstract
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @param string $klearTheme
     *
     * @return BrandUrlDtoAbstract
     */
    public function setKlearTheme($klearTheme = null)
    {
        $this->klearTheme = $klearTheme;

        return $this;
    }

    /**
     * @return string
     */
    public function getKlearTheme()
    {
        return $this->klearTheme;
    }

    /**
     * @param string $urlType
     *
     * @return BrandUrlDtoAbstract
     */
    public function setUrlType($urlType)
    {
        $this->urlType = $urlType;

        return $this;
    }

    /**
     * @return string
     */
    public function getUrlType()
    {
        return $this->urlType;
    }

    /**
     * @param string $name
     *
     * @return BrandUrlDtoAbstract
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
     * @param string $userTheme
     *
     * @return BrandUrlDtoAbstract
     */
    public function setUserTheme($userTheme = null)
    {
        $this->userTheme = $userTheme;

        return $this;
    }

    /**
     * @return string
     */
    public function getUserTheme()
    {
        return $this->userTheme;
    }

    /**
     * @param integer $id
     *
     * @return BrandUrlDtoAbstract
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
     * @param integer $logoFileSize
     *
     * @return BrandUrlDtoAbstract
     */
    public function setLogoFileSize($logoFileSize)
    {
        $this->logoFileSize = $logoFileSize;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLogoFileSize()
    {
        return $this->logoFileSize;
    }

    /**
     * @param string $logoMimeType
     *
     * @return BrandUrlDtoAbstract
     */
    public function setLogoMimeType($logoMimeType)
    {
        $this->logoMimeType = $logoMimeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogoMimeType()
    {
        return $this->logoMimeType;
    }

    /**
     * @param string $logoBaseName
     *
     * @return BrandUrlDtoAbstract
     */
    public function setLogoBaseName($logoBaseName)
    {
        $this->logoBaseName = $logoBaseName;

        return $this;
    }

    /**
     * @return string
     */
    public function getLogoBaseName()
    {
        return $this->logoBaseName;
    }

    /**
     * @param integer $brandId
     *
     * @return BrandUrlDtoAbstract
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
     * @return BrandUrlDtoAbstract
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
}


