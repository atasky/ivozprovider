<?php

namespace Ivoz\Provider\Domain\Model\CallAcl;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class CallAclDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $defaultPolicy;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyDto | null
     */
    private $company;

    /**
     * @var \Ivoz\Provider\Domain\Model\CallAclRelMatchList\CallAclRelMatchListDto[] | null
     */
    private $relMatchLists = null;


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
            'name',
            'defaultPolicy',
            'id',
            'company',
            'relMatchLists'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'name' => $this->getName(),
            'defaultPolicy' => $this->getDefaultPolicy(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'relMatchLists' => $this->getRelMatchLists()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        if (!is_null($this->relMatchLists)) {
            $items = $this->getRelMatchLists();
            $this->relMatchLists = [];
            foreach ($items as $item) {
                $this->relMatchLists[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\CallAclRelMatchList\\CallAclRelMatchList',
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
        $this->relMatchLists = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\CallAclRelMatchList\\CallAclRelMatchList',
            $this->relMatchLists
        );
    }

    /**
     * @param string $name
     *
     * @return static
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
     * @param string $defaultPolicy
     *
     * @return static
     */
    public function setDefaultPolicy($defaultPolicy = null)
    {
        $this->defaultPolicy = $defaultPolicy;

        return $this;
    }

    /**
     * @return string
     */
    public function getDefaultPolicy()
    {
        return $this->defaultPolicy;
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
     * @param array $relMatchLists
     *
     * @return static
     */
    public function setRelMatchLists($relMatchLists = null)
    {
        $this->relMatchLists = $relMatchLists;

        return $this;
    }

    /**
     * @return array
     */
    public function getRelMatchLists()
    {
        return $this->relMatchLists;
    }
}


