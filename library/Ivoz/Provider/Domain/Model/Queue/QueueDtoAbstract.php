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
     * @var \Ivoz\Provider\Domain\Model\Company\CompanyDto | null
     */
    private $company;

    /**
     * @var \Ivoz\Provider\Domain\Model\Locution\LocutionDto | null
     */
    private $periodicAnnounceLocution;

    /**
     * @var \Ivoz\Provider\Domain\Model\Locution\LocutionDto | null
     */
    private $timeoutLocution;

    /**
     * @var \Ivoz\Provider\Domain\Model\Extension\ExtensionDto | null
     */
    private $timeoutExtension;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserDto | null
     */
    private $timeoutVoiceMailUser;

    /**
     * @var \Ivoz\Provider\Domain\Model\Locution\LocutionDto | null
     */
    private $fullLocution;

    /**
     * @var \Ivoz\Provider\Domain\Model\Extension\ExtensionDto | null
     */
    private $fullExtension;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserDto | null
     */
    private $fullVoiceMailUser;

    /**
     * @var \Ivoz\Provider\Domain\Model\Country\CountryDto | null
     */
    private $timeoutNumberCountry;

    /**
     * @var \Ivoz\Provider\Domain\Model\Country\CountryDto | null
     */
    private $fullNumberCountry;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @return array
     */
    public function normalize(string $context)
    {
        return $this->toArray();
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
    public static function getPropertyMap()
    {
        return [
            'name',
            'maxWaitTime',
            'timeoutTargetType',
            'timeoutNumberValue',
            'maxlen',
            'fullTargetType',
            'fullNumberValue',
            'periodicAnnounceFrequency',
            'memberCallRest',
            'memberCallTimeout',
            'strategy',
            'weight',
            'id',
            'company',
            'periodicAnnounceLocution',
            'timeoutLocution',
            'timeoutExtension',
            'timeoutVoiceMailUser',
            'fullLocution',
            'fullExtension',
            'fullVoiceMailUser',
            'timeoutNumberCountry',
            'fullNumberCountry'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
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
     * @param integer $maxWaitTime
     *
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @return static
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
     * @param \Ivoz\Provider\Domain\Model\Locution\LocutionDto $periodicAnnounceLocution
     *
     * @return static
     */
    public function setPeriodicAnnounceLocution(\Ivoz\Provider\Domain\Model\Locution\LocutionDto $periodicAnnounceLocution = null)
    {
        $this->periodicAnnounceLocution = $periodicAnnounceLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\LocutionDto
     */
    public function getPeriodicAnnounceLocution()
    {
        return $this->periodicAnnounceLocution;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\LocutionDto $timeoutLocution
     *
     * @return static
     */
    public function setTimeoutLocution(\Ivoz\Provider\Domain\Model\Locution\LocutionDto $timeoutLocution = null)
    {
        $this->timeoutLocution = $timeoutLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\LocutionDto
     */
    public function getTimeoutLocution()
    {
        return $this->timeoutLocution;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\ExtensionDto $timeoutExtension
     *
     * @return static
     */
    public function setTimeoutExtension(\Ivoz\Provider\Domain\Model\Extension\ExtensionDto $timeoutExtension = null)
    {
        $this->timeoutExtension = $timeoutExtension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionDto
     */
    public function getTimeoutExtension()
    {
        return $this->timeoutExtension;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\UserDto $timeoutVoiceMailUser
     *
     * @return static
     */
    public function setTimeoutVoiceMailUser(\Ivoz\Provider\Domain\Model\User\UserDto $timeoutVoiceMailUser = null)
    {
        $this->timeoutVoiceMailUser = $timeoutVoiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\UserDto
     */
    public function getTimeoutVoiceMailUser()
    {
        return $this->timeoutVoiceMailUser;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\LocutionDto $fullLocution
     *
     * @return static
     */
    public function setFullLocution(\Ivoz\Provider\Domain\Model\Locution\LocutionDto $fullLocution = null)
    {
        $this->fullLocution = $fullLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\LocutionDto
     */
    public function getFullLocution()
    {
        return $this->fullLocution;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\ExtensionDto $fullExtension
     *
     * @return static
     */
    public function setFullExtension(\Ivoz\Provider\Domain\Model\Extension\ExtensionDto $fullExtension = null)
    {
        $this->fullExtension = $fullExtension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionDto
     */
    public function getFullExtension()
    {
        return $this->fullExtension;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\UserDto $fullVoiceMailUser
     *
     * @return static
     */
    public function setFullVoiceMailUser(\Ivoz\Provider\Domain\Model\User\UserDto $fullVoiceMailUser = null)
    {
        $this->fullVoiceMailUser = $fullVoiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\UserDto
     */
    public function getFullVoiceMailUser()
    {
        return $this->fullVoiceMailUser;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\CountryDto $timeoutNumberCountry
     *
     * @return static
     */
    public function setTimeoutNumberCountry(\Ivoz\Provider\Domain\Model\Country\CountryDto $timeoutNumberCountry = null)
    {
        $this->timeoutNumberCountry = $timeoutNumberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\CountryDto
     */
    public function getTimeoutNumberCountry()
    {
        return $this->timeoutNumberCountry;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\CountryDto $fullNumberCountry
     *
     * @return static
     */
    public function setFullNumberCountry(\Ivoz\Provider\Domain\Model\Country\CountryDto $fullNumberCountry = null)
    {
        $this->fullNumberCountry = $fullNumberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\CountryDto
     */
    public function getFullNumberCountry()
    {
        return $this->fullNumberCountry;
    }
}


