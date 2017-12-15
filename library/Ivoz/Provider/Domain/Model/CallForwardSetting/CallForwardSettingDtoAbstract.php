<?php

namespace Ivoz\Provider\Domain\Model\CallForwardSetting;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class CallForwardSettingDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $callTypeFilter;

    /**
     * @var string
     */
    private $callForwardType;

    /**
     * @var string
     */
    private $targetType;

    /**
     * @var string
     */
    private $numberValue;

    /**
     * @var integer
     */
    private $noAnswerTimeout = '10';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserDto | null
     */
    private $user;

    /**
     * @var \Ivoz\Provider\Domain\Model\Extension\ExtensionDto | null
     */
    private $extension;

    /**
     * @var \Ivoz\Provider\Domain\Model\User\UserDto | null
     */
    private $voiceMailUser;

    /**
     * @var \Ivoz\Provider\Domain\Model\Country\CountryDto | null
     */
    private $numberCountry;


    public function __constructor($id = null)
    {
        $this->setId($id);
    }

    /**
     * @inheritdoc
     */
    public function normalize(string $context)
    {
        return $this->toArray();
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
        if ($context === self::CONTEXT_SIMPLE) {
            return ['id'];
        }

        return [
            'callTypeFilter',
            'callForwardType',
            'targetType',
            'numberValue',
            'noAnswerTimeout',
            'id',
            'user',
            'extension',
            'voiceMailUser',
            'numberCountry'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
    {
        return [
            'callTypeFilter' => $this->getCallTypeFilter(),
            'callForwardType' => $this->getCallForwardType(),
            'targetType' => $this->getTargetType(),
            'numberValue' => $this->getNumberValue(),
            'noAnswerTimeout' => $this->getNoAnswerTimeout(),
            'id' => $this->getId(),
            'user' => $this->getUser(),
            'extension' => $this->getExtension(),
            'voiceMailUser' => $this->getVoiceMailUser(),
            'numberCountry' => $this->getNumberCountry()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
        $this->extension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getExtensionId());
        $this->voiceMailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getVoiceMailUserId());
        $this->numberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getNumberCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $callTypeFilter
     *
     * @return static
     */
    public function setCallTypeFilter($callTypeFilter = null)
    {
        $this->callTypeFilter = $callTypeFilter;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallTypeFilter()
    {
        return $this->callTypeFilter;
    }

    /**
     * @param string $callForwardType
     *
     * @return static
     */
    public function setCallForwardType($callForwardType = null)
    {
        $this->callForwardType = $callForwardType;

        return $this;
    }

    /**
     * @return string
     */
    public function getCallForwardType()
    {
        return $this->callForwardType;
    }

    /**
     * @param string $targetType
     *
     * @return static
     */
    public function setTargetType($targetType = null)
    {
        $this->targetType = $targetType;

        return $this;
    }

    /**
     * @return string
     */
    public function getTargetType()
    {
        return $this->targetType;
    }

    /**
     * @param string $numberValue
     *
     * @return static
     */
    public function setNumberValue($numberValue = null)
    {
        $this->numberValue = $numberValue;

        return $this;
    }

    /**
     * @return string
     */
    public function getNumberValue()
    {
        return $this->numberValue;
    }

    /**
     * @param integer $noAnswerTimeout
     *
     * @return static
     */
    public function setNoAnswerTimeout($noAnswerTimeout = null)
    {
        $this->noAnswerTimeout = $noAnswerTimeout;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNoAnswerTimeout()
    {
        return $this->noAnswerTimeout;
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
     * @param \Ivoz\Provider\Domain\Model\User\UserDto $user
     *
     * @return static
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\UserDto $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\UserDto
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\ExtensionDto $extension
     *
     * @return static
     */
    public function setExtension(\Ivoz\Provider\Domain\Model\Extension\ExtensionDto $extension = null)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\ExtensionDto
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\UserDto $voiceMailUser
     *
     * @return static
     */
    public function setVoiceMailUser(\Ivoz\Provider\Domain\Model\User\UserDto $voiceMailUser = null)
    {
        $this->voiceMailUser = $voiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\UserDto
     */
    public function getVoiceMailUser()
    {
        return $this->voiceMailUser;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\CountryDto $numberCountry
     *
     * @return static
     */
    public function setNumberCountry(\Ivoz\Provider\Domain\Model\Country\CountryDto $numberCountry = null)
    {
        $this->numberCountry = $numberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\CountryDto
     */
    public function getNumberCountry()
    {
        return $this->numberCountry;
    }
}


