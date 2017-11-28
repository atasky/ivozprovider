<?php

namespace Ivoz\Provider\Domain\Model\PricingPlansRelCompany;

/**
 * PricingPlansRelCompany
 */
class PricingPlansRelCompany extends PricingPlansRelCompanyAbstract implements PricingPlansRelCompanyInterface
{
    use PricingPlansRelCompanyTrait;

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet()
    {
        return parent::getChangeSet();
    }

    /**
     * Get id
     * @codeCoverageIgnore
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }
}

