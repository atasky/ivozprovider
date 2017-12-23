<?php

namespace Ivoz\Provider\Domain\Model\HuntGroup;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class HuntGroupDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string
     */
    private $description = '';

    /**
     * @var string
     */
    private $strategy;

    /**
     * @var integer
     */
    private $ringAllTimeout;

    /**
     * @var integer
     */
    private $nextUserPosition = '0';

    /**
     * @var string
     */
    private $noAnswerTargetType;

    /**
     * @var string
     */
    private $noAnswerNumberValue;

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
    private $noAnswerLocutionId;

    /**
     * @var mixed
     */
    private $noAnswerExtensionId;

    /**
     * @var mixed
     */
    private $noAnswerVoiceMailUserId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $noAnswerLocution;

    /**
     * @var mixed
     */
    private $noAnswerExtension;

    /**
     * @var mixed
     */
    private $noAnswerVoiceMailUser;

    /**
     * @var array|null
     */
    private $huntGroupsRelUsers = null;

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
            'description' => $this->getDescription(),
            'strategy' => $this->getStrategy(),
            'ringAllTimeout' => $this->getRingAllTimeout(),
            'nextUserPosition' => $this->getNextUserPosition(),
            'noAnswerTargetType' => $this->getNoAnswerTargetType(),
            'noAnswerNumberValue' => $this->getNoAnswerNumberValue(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'noAnswerLocution' => $this->getNoAnswerLocution(),
            'noAnswerExtension' => $this->getNoAnswerExtension(),
            'noAnswerVoiceMailUser' => $this->getNoAnswerVoiceMailUser(),
            'huntGroupsRelUsers' => $this->getHuntGroupsRelUsers()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->noAnswerLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getNoAnswerLocutionId());
        $this->noAnswerExtension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getNoAnswerExtensionId());
        $this->noAnswerVoiceMailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getNoAnswerVoiceMailUserId());
        if (!is_null($this->huntGroupsRelUsers)) {
            $items = $this->getHuntGroupsRelUsers();
            $this->huntGroupsRelUsers = [];
            foreach ($items as $item) {
                $this->huntGroupsRelUsers[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\HuntGroupsRelUser\\HuntGroupsRelUser',
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
        $this->huntGroupsRelUsers = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\HuntGroupsRelUser\\HuntGroupsRelUser',
            $this->huntGroupsRelUsers
        );
    }

    /**
     * @param string $name
     *
     * @return HuntGroupDtoAbstract
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
     * @param string $description
     *
     * @return HuntGroupDtoAbstract
     */
    public function setDescription($description)
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
     * @param string $strategy
     *
     * @return HuntGroupDtoAbstract
     */
    public function setStrategy($strategy)
    {
        $this->strategy = $strategy;

        return $this;
    }

    /**
     * @return string
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    /**
     * @param integer $ringAllTimeout
     *
     * @return HuntGroupDtoAbstract
     */
    public function setRingAllTimeout($ringAllTimeout)
    {
        $this->ringAllTimeout = $ringAllTimeout;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRingAllTimeout()
    {
        return $this->ringAllTimeout;
    }

    /**
     * @param integer $nextUserPosition
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNextUserPosition($nextUserPosition = null)
    {
        $this->nextUserPosition = $nextUserPosition;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNextUserPosition()
    {
        return $this->nextUserPosition;
    }

    /**
     * @param string $noAnswerTargetType
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerTargetType($noAnswerTargetType = null)
    {
        $this->noAnswerTargetType = $noAnswerTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getNoAnswerTargetType()
    {
        return $this->noAnswerTargetType;
    }

    /**
     * @param string $noAnswerNumberValue
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerNumberValue($noAnswerNumberValue = null)
    {
        $this->noAnswerNumberValue = $noAnswerNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNoAnswerNumberValue()
    {
        return $this->noAnswerNumberValue;
    }

    /**
     * @param integer $id
     *
     * @return HuntGroupDtoAbstract
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
     * @return HuntGroupDtoAbstract
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
     * @return HuntGroupDtoAbstract
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
     * @param integer $noAnswerLocutionId
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerLocutionId($noAnswerLocutionId)
    {
        $this->noAnswerLocutionId = $noAnswerLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNoAnswerLocutionId()
    {
        return $this->noAnswerLocutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $noAnswerLocution
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $noAnswerLocution)
    {
        $this->noAnswerLocution = $noAnswerLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getNoAnswerLocution()
    {
        return $this->noAnswerLocution;
    }

    /**
     * @param integer $noAnswerExtensionId
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerExtensionId($noAnswerExtensionId)
    {
        $this->noAnswerExtensionId = $noAnswerExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNoAnswerExtensionId()
    {
        return $this->noAnswerExtensionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\Extension $noAnswerExtension
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerExtension(\Ivoz\Provider\Domain\Model\Extension\Extension $noAnswerExtension)
    {
        $this->noAnswerExtension = $noAnswerExtension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\Extension
     */
    public function getNoAnswerExtension()
    {
        return $this->noAnswerExtension;
    }

    /**
     * @param integer $noAnswerVoiceMailUserId
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerVoiceMailUserId($noAnswerVoiceMailUserId)
    {
        $this->noAnswerVoiceMailUserId = $noAnswerVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNoAnswerVoiceMailUserId()
    {
        return $this->noAnswerVoiceMailUserId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $noAnswerVoiceMailUser
     *
     * @return HuntGroupDtoAbstract
     */
    public function setNoAnswerVoiceMailUser(\Ivoz\Provider\Domain\Model\User\User $noAnswerVoiceMailUser)
    {
        $this->noAnswerVoiceMailUser = $noAnswerVoiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getNoAnswerVoiceMailUser()
    {
        return $this->noAnswerVoiceMailUser;
    }

    /**
     * @param array $huntGroupsRelUsers
     *
     * @return HuntGroupDtoAbstract
     */
    public function setHuntGroupsRelUsers($huntGroupsRelUsers)
    {
        $this->huntGroupsRelUsers = $huntGroupsRelUsers;

        return $this;
    }

    /**
     * @return array
     */
    public function getHuntGroupsRelUsers()
    {
        return $this->huntGroupsRelUsers;
    }
}


