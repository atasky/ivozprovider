<?php

namespace Ivoz\Provider\Domain\Model\FeaturesRelCompany;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class FeaturesRelCompanyDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyDto | null
     */
    private $company;

    /**
     * @var \Ivoz\Provider\Domain\Model\Feature\FeatureDto | null
     */
    private $feature;


    public function __construct($id = null)
    {
        $this->setId($id);
    }

    /**
     * @inheritdoc
     */
    public function normalize(string $context)
    {
        $response = $this->toArray();
        $contextProperties = $this->getPropertyMap($context);

        return array_filter(
            $response,
            function ($key) use ($contextProperties) {
                return in_array($key, $contextProperties);
            },
            ARRAY_FILTER_USE_KEY
        );
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
        if ($context === self::CONTEXT_COLLECTION) {
            return ['id'];
        }

        return [
            'id',
            'company',
            'feature'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'feature' => $this->getFeature()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->feature = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Feature\\Feature', $this->getFeatureId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

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
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyDto $company
     *
     * @return static
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyDto $company = null)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyDto
     */
    public function getCompany()
    {
        return $this->company;
    }

        /**
         * @param integer $id
         *
         * @return static
         */
        public function setCompanyId($id)
        {
            $value = $id
                ? new \Ivoz\Provider\Domain\Model\Company\CompanyDto($id)
                : null;

            return $this->setCompany($value);
        }

        /**
         * @return integer | null
         */
        public function getCompanyId()
        {
            if ($dto = $this->getCompany()) {
                return $dto->getId();
            }

            return null;
        }

    /**
     * @param \Ivoz\Provider\Domain\Model\Feature\FeatureDto $feature
     *
     * @return static
     */
    public function setFeature(\Ivoz\Provider\Domain\Model\Feature\FeatureDto $feature = null)
    {
        $this->feature = $feature;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Feature\FeatureDto
     */
    public function getFeature()
    {
        return $this->feature;
    }

        /**
         * @param integer $id
         *
         * @return static
         */
        public function setFeatureId($id)
        {
            $value = $id
                ? new \Ivoz\Provider\Domain\Model\Feature\FeatureDto($id)
                : null;

            return $this->setFeature($value);
        }

        /**
         * @return integer | null
         */
        public function getFeatureId()
        {
            if ($dto = $this->getFeature()) {
                return $dto->getId();
            }

            return null;
        }
}

