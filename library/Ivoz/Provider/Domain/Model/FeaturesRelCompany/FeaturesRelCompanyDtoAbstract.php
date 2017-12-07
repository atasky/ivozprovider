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
     * @var mixed
     */
    private $companyId;

    /**
     * @var mixed
     */
    private $featureId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $feature;

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
     * @return FeaturesRelCompanyDtoAbstract
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
     * @param integer $companyId
     *
     * @return FeaturesRelCompanyDtoAbstract
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
     * @return FeaturesRelCompanyDtoAbstract
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

    /**
     * @param integer $featureId
     *
     * @return FeaturesRelCompanyDtoAbstract
     */
    public function setFeatureId($featureId)
    {
        $this->featureId = $featureId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFeatureId()
    {
        return $this->featureId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Feature\Feature $feature
     *
     * @return FeaturesRelCompanyDtoAbstract
     */
    public function setFeature(\Ivoz\Provider\Domain\Model\Feature\Feature $feature)
    {
        $this->feature = $feature;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Feature\Feature
     */
    public function getFeature()
    {
        return $this->feature;
    }
}


