<?php

namespace Ivoz\Provider\Domain\Model\Queue;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class QueueDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var integer
     */
    private $maxWaitTime;

    /**
     * @var string
     */
    private $timeoutTargetType;

    /**
     * @var string
     */
    private $timeoutNumberValue;

    /**
     * @var integer
     */
    private $maxlen;

    /**
     * @var string
     */
    private $fullTargetType;

    /**
     * @var string
     */
    private $fullNumberValue;

    /**
     * @var integer
     */
    private $periodicAnnounceFrequency;

    /**
     * @var integer
     */
    private $memberCallRest;

    /**
     * @var integer
     */
    private $memberCallTimeout;

    /**
     * @var string
     */
    private $strategy;

    /**
     * @var integer
     */
    private $weight;

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
    private $periodicAnnounceLocutionId;

    /**
     * @var mixed
     */
    private $timeoutLocutionId;

    /**
     * @var mixed
     */
    private $timeoutExtensionId;

    /**
     * @var mixed
     */
    private $timeoutVoiceMailUserId;

    /**
     * @var mixed
     */
    private $fullLocutionId;

    /**
     * @var mixed
     */
    private $fullExtensionId;

    /**
     * @var mixed
     */
    private $fullVoiceMailUserId;

    /**
     * @var mixed
     */
    private $timeoutNumberCountryId;

    /**
     * @var mixed
     */
    private $fullNumberCountryId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $periodicAnnounceLocution;

    /**
     * @var mixed
     */
    private $timeoutLocution;

    /**
     * @var mixed
     */
    private $timeoutExtension;

    /**
     * @var mixed
     */
    private $timeoutVoiceMailUser;

    /**
     * @var mixed
     */
    private $fullLocution;

    /**
     * @var mixed
     */
    private $fullExtension;

    /**
     * @var mixed
     */
    private $fullVoiceMailUser;

    /**
     * @var mixed
     */
    private $timeoutNumberCountry;

    /**
     * @var mixed
     */
    private $fullNumberCountry;

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
            'maxWaitTime' => $this->getMaxWaitTime(),
            'timeoutTargetType' => $this->getTimeoutTargetType(),
            'timeoutNumberValue' => $this->getTimeoutNumberValue(),
            'maxlen' => $this->getMaxlen(),
            'fullTargetType' => $this->getFullTargetType(),
            'fullNumberValue' => $this->getFullNumberValue(),
            'periodicAnnounceFrequency' => $this->getPeriodicAnnounceFrequency(),
            'memberCallRest' => $this->getMemberCallRest(),
            'memberCallTimeout' => $this->getMemberCallTimeout(),
            'strategy' => $this->getStrategy(),
            'weight' => $this->getWeight(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'periodicAnnounceLocution' => $this->getPeriodicAnnounceLocution(),
            'timeoutLocution' => $this->getTimeoutLocution(),
            'timeoutExtension' => $this->getTimeoutExtension(),
            'timeoutVoiceMailUser' => $this->getTimeoutVoiceMailUser(),
            'fullLocution' => $this->getFullLocution(),
            'fullExtension' => $this->getFullExtension(),
            'fullVoiceMailUser' => $this->getFullVoiceMailUser(),
            'timeoutNumberCountry' => $this->getTimeoutNumberCountry(),
            'fullNumberCountry' => $this->getFullNumberCountry()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->periodicAnnounceLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getPeriodicAnnounceLocutionId());
        $this->timeoutLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getTimeoutLocutionId());
        $this->timeoutExtension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getTimeoutExtensionId());
        $this->timeoutVoiceMailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getTimeoutVoiceMailUserId());
        $this->fullLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getFullLocutionId());
        $this->fullExtension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getFullExtensionId());
        $this->fullVoiceMailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getFullVoiceMailUserId());
        $this->timeoutNumberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getTimeoutNumberCountryId());
        $this->fullNumberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getFullNumberCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $name
     *
     * @return QueueDtoAbstract
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
     * @param integer $maxWaitTime
     *
     * @return QueueDtoAbstract
     */
    public function setMaxWaitTime($maxWaitTime = null)
    {
        $this->maxWaitTime = $maxWaitTime;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxWaitTime()
    {
        return $this->maxWaitTime;
    }

    /**
     * @param string $timeoutTargetType
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutTargetType($timeoutTargetType = null)
    {
        $this->timeoutTargetType = $timeoutTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeoutTargetType()
    {
        return $this->timeoutTargetType;
    }

    /**
     * @param string $timeoutNumberValue
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutNumberValue($timeoutNumberValue = null)
    {
        $this->timeoutNumberValue = $timeoutNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getTimeoutNumberValue()
    {
        return $this->timeoutNumberValue;
    }

    /**
     * @param integer $maxlen
     *
     * @return QueueDtoAbstract
     */
    public function setMaxlen($maxlen = null)
    {
        $this->maxlen = $maxlen;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMaxlen()
    {
        return $this->maxlen;
    }

    /**
     * @param string $fullTargetType
     *
     * @return QueueDtoAbstract
     */
    public function setFullTargetType($fullTargetType = null)
    {
        $this->fullTargetType = $fullTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullTargetType()
    {
        return $this->fullTargetType;
    }

    /**
     * @param string $fullNumberValue
     *
     * @return QueueDtoAbstract
     */
    public function setFullNumberValue($fullNumberValue = null)
    {
        $this->fullNumberValue = $fullNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullNumberValue()
    {
        return $this->fullNumberValue;
    }

    /**
     * @param integer $periodicAnnounceFrequency
     *
     * @return QueueDtoAbstract
     */
    public function setPeriodicAnnounceFrequency($periodicAnnounceFrequency = null)
    {
        $this->periodicAnnounceFrequency = $periodicAnnounceFrequency;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriodicAnnounceFrequency()
    {
        return $this->periodicAnnounceFrequency;
    }

    /**
     * @param integer $memberCallRest
     *
     * @return QueueDtoAbstract
     */
    public function setMemberCallRest($memberCallRest = null)
    {
        $this->memberCallRest = $memberCallRest;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMemberCallRest()
    {
        return $this->memberCallRest;
    }

    /**
     * @param integer $memberCallTimeout
     *
     * @return QueueDtoAbstract
     */
    public function setMemberCallTimeout($memberCallTimeout = null)
    {
        $this->memberCallTimeout = $memberCallTimeout;

        return $this;
    }

    /**
     * @return integer
     */
    public function getMemberCallTimeout()
    {
        return $this->memberCallTimeout;
    }

    /**
     * @param string $strategy
     *
     * @return QueueDtoAbstract
     */
    public function setStrategy($strategy = null)
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
     * @param integer $weight
     *
     * @return QueueDtoAbstract
     */
    public function setWeight($weight = null)
    {
        $this->weight = $weight;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWeight()
    {
        return $this->weight;
    }

    /**
     * @param integer $id
     *
     * @return QueueDtoAbstract
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
     * @return QueueDtoAbstract
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
     * @return QueueDtoAbstract
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
     * @param integer $periodicAnnounceLocutionId
     *
     * @return QueueDtoAbstract
     */
    public function setPeriodicAnnounceLocutionId($periodicAnnounceLocutionId)
    {
        $this->periodicAnnounceLocutionId = $periodicAnnounceLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeriodicAnnounceLocutionId()
    {
        return $this->periodicAnnounceLocutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $periodicAnnounceLocution
     *
     * @return QueueDtoAbstract
     */
    public function setPeriodicAnnounceLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $periodicAnnounceLocution)
    {
        $this->periodicAnnounceLocution = $periodicAnnounceLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getPeriodicAnnounceLocution()
    {
        return $this->periodicAnnounceLocution;
    }

    /**
     * @param integer $timeoutLocutionId
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutLocutionId($timeoutLocutionId)
    {
        $this->timeoutLocutionId = $timeoutLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutLocutionId()
    {
        return $this->timeoutLocutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $timeoutLocution
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $timeoutLocution)
    {
        $this->timeoutLocution = $timeoutLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getTimeoutLocution()
    {
        return $this->timeoutLocution;
    }

    /**
     * @param integer $timeoutExtensionId
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutExtensionId($timeoutExtensionId)
    {
        $this->timeoutExtensionId = $timeoutExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutExtensionId()
    {
        return $this->timeoutExtensionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\Extension $timeoutExtension
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutExtension(\Ivoz\Provider\Domain\Model\Extension\Extension $timeoutExtension)
    {
        $this->timeoutExtension = $timeoutExtension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\Extension
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * @param integer $timeoutVoiceMailUserId
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutVoiceMailUserId($timeoutVoiceMailUserId)
    {
        $this->timeoutVoiceMailUserId = $timeoutVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutVoiceMailUserId()
    {
        return $this->timeoutVoiceMailUserId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $timeoutVoiceMailUser
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutVoiceMailUser(\Ivoz\Provider\Domain\Model\User\User $timeoutVoiceMailUser)
    {
        $this->timeoutVoiceMailUser = $timeoutVoiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * @param integer $fullLocutionId
     *
     * @return QueueDtoAbstract
     */
    public function setFullLocutionId($fullLocutionId)
    {
        $this->fullLocutionId = $fullLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFullLocutionId()
    {
        return $this->fullLocutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $fullLocution
     *
     * @return QueueDtoAbstract
     */
    public function setFullLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $fullLocution)
    {
        $this->fullLocution = $fullLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getFullLocution()
    {
        return $this->fullLocution;
    }

    /**
     * @param integer $fullExtensionId
     *
     * @return QueueDtoAbstract
     */
    public function setFullExtensionId($fullExtensionId)
    {
        $this->fullExtensionId = $fullExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFullExtensionId()
    {
        return $this->fullExtensionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\Extension $fullExtension
     *
     * @return QueueDtoAbstract
     */
    public function setFullExtension(\Ivoz\Provider\Domain\Model\Extension\Extension $fullExtension)
    {
        $this->fullExtension = $fullExtension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\Extension
     */
    public function getFullExtension()
    {
        return $this->fullExtension;
    }

    /**
     * @param integer $fullVoiceMailUserId
     *
     * @return QueueDtoAbstract
     */
    public function setFullVoiceMailUserId($fullVoiceMailUserId)
    {
        $this->fullVoiceMailUserId = $fullVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFullVoiceMailUserId()
    {
        return $this->fullVoiceMailUserId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $fullVoiceMailUser
     *
     * @return QueueDtoAbstract
     */
    public function setFullVoiceMailUser(\Ivoz\Provider\Domain\Model\User\User $fullVoiceMailUser)
    {
        $this->fullVoiceMailUser = $fullVoiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getFullVoiceMailUser()
    {
        return $this->fullVoiceMailUser;
    }

    /**
     * @param integer $timeoutNumberCountryId
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutNumberCountryId($timeoutNumberCountryId)
    {
        $this->timeoutNumberCountryId = $timeoutNumberCountryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getTimeoutNumberCountryId()
    {
        return $this->timeoutNumberCountryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $timeoutNumberCountry
     *
     * @return QueueDtoAbstract
     */
    public function setTimeoutNumberCountry(\Ivoz\Provider\Domain\Model\Country\Country $timeoutNumberCountry)
    {
        $this->timeoutNumberCountry = $timeoutNumberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getTimeoutNumberCountry()
    {
        return $this->timeoutNumberCountry;
    }

    /**
     * @param integer $fullNumberCountryId
     *
     * @return QueueDtoAbstract
     */
    public function setFullNumberCountryId($fullNumberCountryId)
    {
        $this->fullNumberCountryId = $fullNumberCountryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFullNumberCountryId()
    {
        return $this->fullNumberCountryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $fullNumberCountry
     *
     * @return QueueDtoAbstract
     */
    public function setFullNumberCountry(\Ivoz\Provider\Domain\Model\Country\Country $fullNumberCountry)
    {
        $this->fullNumberCountry = $fullNumberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getFullNumberCountry()
    {
        return $this->fullNumberCountry;
    }
}


