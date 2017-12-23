<?php

namespace Ivoz\Provider\Domain\Model\OutgoingDdiRule;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class OutgoingDdiRuleDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $defaultAction;

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
    private $forcedDdiId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $forcedDdi;

    /**
     * @var array|null
     */
    private $patterns = null;

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
            'name' => $this->getName(),
            'defaultAction' => $this->getDefaultAction(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'forcedDdi' => $this->getForcedDdi(),
            'patterns' => $this->getPatterns()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->forcedDdi = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Ddi\\Ddi', $this->getForcedDdiId());
        if (!is_null($this->patterns)) {
            $items = $this->getPatterns();
            $this->patterns = [];
            foreach ($items as $item) {
                $this->patterns[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\OutgoingDdiRulesPattern\\OutgoingDdiRulesPattern',
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
        $this->patterns = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\OutgoingDdiRulesPattern\\OutgoingDdiRulesPattern',
            $this->patterns
        );
    }

    /**
     * @param string $name
     *
     * @return OutgoingDdiRuleDtoAbstract
     */
    public function setName($name)
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
     * @param string $defaultAction
     *
     * @return OutgoingDdiRuleDtoAbstract
     */
    public function setDefaultAction($defaultAction)
    {
        $this->defaultAction = $defaultAction;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultAction()
    {
        return $this->defaultAction;
    }

    /**
     * @param integer $id
     *
     * @return OutgoingDdiRuleDtoAbstract
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
     * @return OutgoingDdiRuleDtoAbstract
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
     * @return OutgoingDdiRuleDtoAbstract
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
     * @param integer $forcedDdiId
     *
     * @return OutgoingDdiRuleDtoAbstract
     */
    public function setForcedDdiId($forcedDdiId)
    {
        $this->forcedDdiId = $forcedDdiId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getForcedDdiId()
    {
        return $this->forcedDdiId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Ddi\Ddi $forcedDdi
     *
     * @return OutgoingDdiRuleDtoAbstract
     */
    public function setForcedDdi(\Ivoz\Provider\Domain\Model\Ddi\Ddi $forcedDdi)
    {
        $this->forcedDdi = $forcedDdi;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Ddi\Ddi
     */
    public function getForcedDdi()
    {
        return $this->forcedDdi;
    }

    /**
     * @param array $patterns
     *
     * @return OutgoingDdiRuleDtoAbstract
     */
    public function setPatterns($patterns)
    {
        $this->patterns = $patterns;

        return $this;
    }

    /**
     * @return array
     */
    public function getPatterns()
    {
        return $this->patterns;
    }
}


