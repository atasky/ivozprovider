<?php

namespace Ivoz\Provider\Domain\Model\ExternalCallFilter;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class ExternalCallFilterDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $holidayTargetType;

    /**
     * @var string
     */
    private $holidayNumberValue;

    /**
     * @var string
     */
    private $outOfScheduleTargetType;

    /**
     * @var string
     */
    private $outOfScheduleNumberValue;

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
    private $welcomeLocutionId;

    /**
     * @var mixed
     */
    private $holidayLocutionId;

    /**
     * @var mixed
     */
    private $outOfScheduleLocutionId;

    /**
     * @var mixed
     */
    private $holidayExtensionId;

    /**
     * @var mixed
     */
    private $outOfScheduleExtensionId;

    /**
     * @var mixed
     */
    private $holidayVoiceMailUserId;

    /**
     * @var mixed
     */
    private $outOfScheduleVoiceMailUserId;

    /**
     * @var mixed
     */
    private $holidayNumberCountryId;

    /**
     * @var mixed
     */
    private $outOfScheduleNumberCountryId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $welcomeLocution;

    /**
     * @var mixed
     */
    private $holidayLocution;

    /**
     * @var mixed
     */
    private $outOfScheduleLocution;

    /**
     * @var mixed
     */
    private $holidayExtension;

    /**
     * @var mixed
     */
    private $outOfScheduleExtension;

    /**
     * @var mixed
     */
    private $holidayVoiceMailUser;

    /**
     * @var mixed
     */
    private $outOfScheduleVoiceMailUser;

    /**
     * @var mixed
     */
    private $holidayNumberCountry;

    /**
     * @var mixed
     */
    private $outOfScheduleNumberCountry;

    /**
     * @var array|null
     */
    private $calendars = null;

    /**
     * @var array|null
     */
    private $blackLists = null;

    /**
     * @var array|null
     */
    private $whiteLists = null;

    /**
     * @var array|null
     */
    private $schedules = null;

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
            'holidayTargetType' => $this->getHolidayTargetType(),
            'holidayNumberValue' => $this->getHolidayNumberValue(),
            'outOfScheduleTargetType' => $this->getOutOfScheduleTargetType(),
            'outOfScheduleNumberValue' => $this->getOutOfScheduleNumberValue(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'welcomeLocution' => $this->getWelcomeLocution(),
            'holidayLocution' => $this->getHolidayLocution(),
            'outOfScheduleLocution' => $this->getOutOfScheduleLocution(),
            'holidayExtension' => $this->getHolidayExtension(),
            'outOfScheduleExtension' => $this->getOutOfScheduleExtension(),
            'holidayVoiceMailUser' => $this->getHolidayVoiceMailUser(),
            'outOfScheduleVoiceMailUser' => $this->getOutOfScheduleVoiceMailUser(),
            'holidayNumberCountry' => $this->getHolidayNumberCountry(),
            'outOfScheduleNumberCountry' => $this->getOutOfScheduleNumberCountry(),
            'calendars' => $this->getCalendars(),
            'blackLists' => $this->getBlackLists(),
            'whiteLists' => $this->getWhiteLists(),
            'schedules' => $this->getSchedules()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->welcomeLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getWelcomeLocutionId());
        $this->holidayLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getHolidayLocutionId());
        $this->outOfScheduleLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getOutOfScheduleLocutionId());
        $this->holidayExtension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getHolidayExtensionId());
        $this->outOfScheduleExtension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getOutOfScheduleExtensionId());
        $this->holidayVoiceMailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getHolidayVoiceMailUserId());
        $this->outOfScheduleVoiceMailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getOutOfScheduleVoiceMailUserId());
        $this->holidayNumberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getHolidayNumberCountryId());
        $this->outOfScheduleNumberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getOutOfScheduleNumberCountryId());
        if (!is_null($this->calendars)) {
            $items = $this->getCalendars();
            $this->calendars = [];
            foreach ($items as $item) {
                $this->calendars[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterRelCalendar\\ExternalCallFilterRelCalendar',
                    $item->getId() ?? $item
                );
            }
        }

        if (!is_null($this->blackLists)) {
            $items = $this->getBlackLists();
            $this->blackLists = [];
            foreach ($items as $item) {
                $this->blackLists[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterBlackList\\ExternalCallFilterBlackList',
                    $item->getId() ?? $item
                );
            }
        }

        if (!is_null($this->whiteLists)) {
            $items = $this->getWhiteLists();
            $this->whiteLists = [];
            foreach ($items as $item) {
                $this->whiteLists[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterWhiteList\\ExternalCallFilterWhiteList',
                    $item->getId() ?? $item
                );
            }
        }

        if (!is_null($this->schedules)) {
            $items = $this->getSchedules();
            $this->schedules = [];
            foreach ($items as $item) {
                $this->schedules[] = $transformer->transform(
                    'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterRelSchedule\\ExternalCallFilterRelSchedule',
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
        $this->calendars = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterRelCalendar\\ExternalCallFilterRelCalendar',
            $this->calendars
        );
        $this->blackLists = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterBlackList\\ExternalCallFilterBlackList',
            $this->blackLists
        );
        $this->whiteLists = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterWhiteList\\ExternalCallFilterWhiteList',
            $this->whiteLists
        );
        $this->schedules = $transformer->transform(
            'Ivoz\\Provider\\Domain\\Model\\ExternalCallFilterRelSchedule\\ExternalCallFilterRelSchedule',
            $this->schedules
        );
    }

    /**
     * @param string $name
     *
     * @return ExternalCallFilterDtoAbstract
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
     * @param string $holidayTargetType
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayTargetType($holidayTargetType = null)
    {
        $this->holidayTargetType = $holidayTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getHolidayTargetType()
    {
        return $this->holidayTargetType;
    }

    /**
     * @param string $holidayNumberValue
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayNumberValue($holidayNumberValue = null)
    {
        $this->holidayNumberValue = $holidayNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getHolidayNumberValue()
    {
        return $this->holidayNumberValue;
    }

    /**
     * @param string $outOfScheduleTargetType
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleTargetType($outOfScheduleTargetType = null)
    {
        $this->outOfScheduleTargetType = $outOfScheduleTargetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutOfScheduleTargetType()
    {
        return $this->outOfScheduleTargetType;
    }

    /**
     * @param string $outOfScheduleNumberValue
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleNumberValue($outOfScheduleNumberValue = null)
    {
        $this->outOfScheduleNumberValue = $outOfScheduleNumberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutOfScheduleNumberValue()
    {
        return $this->outOfScheduleNumberValue;
    }

    /**
     * @param integer $id
     *
     * @return ExternalCallFilterDtoAbstract
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
     * @return ExternalCallFilterDtoAbstract
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
     * @return ExternalCallFilterDtoAbstract
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
     * @param integer $welcomeLocutionId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setWelcomeLocutionId($welcomeLocutionId)
    {
        $this->welcomeLocutionId = $welcomeLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getWelcomeLocutionId()
    {
        return $this->welcomeLocutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $welcomeLocution
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setWelcomeLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $welcomeLocution)
    {
        $this->welcomeLocution = $welcomeLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getWelcomeLocution()
    {
        return $this->welcomeLocution;
    }

    /**
     * @param integer $holidayLocutionId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayLocutionId($holidayLocutionId)
    {
        $this->holidayLocutionId = $holidayLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHolidayLocutionId()
    {
        return $this->holidayLocutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $holidayLocution
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $holidayLocution)
    {
        $this->holidayLocution = $holidayLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getHolidayLocution()
    {
        return $this->holidayLocution;
    }

    /**
     * @param integer $outOfScheduleLocutionId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleLocutionId($outOfScheduleLocutionId)
    {
        $this->outOfScheduleLocutionId = $outOfScheduleLocutionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutOfScheduleLocutionId()
    {
        return $this->outOfScheduleLocutionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Locution\Locution $outOfScheduleLocution
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleLocution(\Ivoz\Provider\Domain\Model\Locution\Locution $outOfScheduleLocution)
    {
        $this->outOfScheduleLocution = $outOfScheduleLocution;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Locution\Locution
     */
    public function getOutOfScheduleLocution()
    {
        return $this->outOfScheduleLocution;
    }

    /**
     * @param integer $holidayExtensionId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayExtensionId($holidayExtensionId)
    {
        $this->holidayExtensionId = $holidayExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHolidayExtensionId()
    {
        return $this->holidayExtensionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\Extension $holidayExtension
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayExtension(\Ivoz\Provider\Domain\Model\Extension\Extension $holidayExtension)
    {
        $this->holidayExtension = $holidayExtension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\Extension
     */
    public function getHolidayExtension()
    {
        return $this->holidayExtension;
    }

    /**
     * @param integer $outOfScheduleExtensionId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleExtensionId($outOfScheduleExtensionId)
    {
        $this->outOfScheduleExtensionId = $outOfScheduleExtensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutOfScheduleExtensionId()
    {
        return $this->outOfScheduleExtensionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\Extension $outOfScheduleExtension
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleExtension(\Ivoz\Provider\Domain\Model\Extension\Extension $outOfScheduleExtension)
    {
        $this->outOfScheduleExtension = $outOfScheduleExtension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\Extension
     */
    public function getOutOfScheduleExtension()
    {
        return $this->outOfScheduleExtension;
    }

    /**
     * @param integer $holidayVoiceMailUserId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayVoiceMailUserId($holidayVoiceMailUserId)
    {
        $this->holidayVoiceMailUserId = $holidayVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHolidayVoiceMailUserId()
    {
        return $this->holidayVoiceMailUserId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $holidayVoiceMailUser
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayVoiceMailUser(\Ivoz\Provider\Domain\Model\User\User $holidayVoiceMailUser)
    {
        $this->holidayVoiceMailUser = $holidayVoiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getHolidayVoiceMailUser()
    {
        return $this->holidayVoiceMailUser;
    }

    /**
     * @param integer $outOfScheduleVoiceMailUserId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleVoiceMailUserId($outOfScheduleVoiceMailUserId)
    {
        $this->outOfScheduleVoiceMailUserId = $outOfScheduleVoiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutOfScheduleVoiceMailUserId()
    {
        return $this->outOfScheduleVoiceMailUserId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $outOfScheduleVoiceMailUser
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleVoiceMailUser(\Ivoz\Provider\Domain\Model\User\User $outOfScheduleVoiceMailUser)
    {
        $this->outOfScheduleVoiceMailUser = $outOfScheduleVoiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getOutOfScheduleVoiceMailUser()
    {
        return $this->outOfScheduleVoiceMailUser;
    }

    /**
     * @param integer $holidayNumberCountryId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayNumberCountryId($holidayNumberCountryId)
    {
        $this->holidayNumberCountryId = $holidayNumberCountryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getHolidayNumberCountryId()
    {
        return $this->holidayNumberCountryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $holidayNumberCountry
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setHolidayNumberCountry(\Ivoz\Provider\Domain\Model\Country\Country $holidayNumberCountry)
    {
        $this->holidayNumberCountry = $holidayNumberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getHolidayNumberCountry()
    {
        return $this->holidayNumberCountry;
    }

    /**
     * @param integer $outOfScheduleNumberCountryId
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleNumberCountryId($outOfScheduleNumberCountryId)
    {
        $this->outOfScheduleNumberCountryId = $outOfScheduleNumberCountryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutOfScheduleNumberCountryId()
    {
        return $this->outOfScheduleNumberCountryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $outOfScheduleNumberCountry
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setOutOfScheduleNumberCountry(\Ivoz\Provider\Domain\Model\Country\Country $outOfScheduleNumberCountry)
    {
        $this->outOfScheduleNumberCountry = $outOfScheduleNumberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getOutOfScheduleNumberCountry()
    {
        return $this->outOfScheduleNumberCountry;
    }

    /**
     * @param array $calendars
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setCalendars($calendars)
    {
        $this->calendars = $calendars;

        return $this;
    }

    /**
     * @return array
     */
    public function getCalendars()
    {
        return $this->calendars;
    }

    /**
     * @param array $blackLists
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setBlackLists($blackLists)
    {
        $this->blackLists = $blackLists;

        return $this;
    }

    /**
     * @return array
     */
    public function getBlackLists()
    {
        return $this->blackLists;
    }

    /**
     * @param array $whiteLists
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setWhiteLists($whiteLists)
    {
        $this->whiteLists = $whiteLists;

        return $this;
    }

    /**
     * @return array
     */
    public function getWhiteLists()
    {
        return $this->whiteLists;
    }

    /**
     * @param array $schedules
     *
     * @return ExternalCallFilterDtoAbstract
     */
    public function setSchedules($schedules)
    {
        $this->schedules = $schedules;

        return $this;
    }

    /**
     * @return array
     */
    public function getSchedules()
    {
        return $this->schedules;
    }
}


