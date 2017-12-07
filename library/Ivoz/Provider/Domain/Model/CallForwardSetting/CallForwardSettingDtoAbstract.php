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
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $extensionId;

    /**
     * @var mixed
     */
    private $voiceMailUserId;

    /**
     * @var mixed
     */
    private $numberCountryId;

    /**
     * @var mixed
     */
    private $user;

    /**
     * @var mixed
     */
    private $extension;

    /**
     * @var mixed
     */
    private $voiceMailUser;

    /**
     * @var mixed
     */
    private $numberCountry;

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
     * @return CallForwardSettingDtoAbstract
     */
    public function setCallTypeFilter($callTypeFilter)
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
     * @return CallForwardSettingDtoAbstract
     */
    public function setCallForwardType($callForwardType)
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
     * @return CallForwardSettingDtoAbstract
     */
    public function setTargetType($targetType)
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
     * @return CallForwardSettingDtoAbstract
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
     * @return CallForwardSettingDtoAbstract
     */
    public function setNoAnswerTimeout($noAnswerTimeout)
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
     * @return CallForwardSettingDtoAbstract
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
     * @param integer $userId
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $user
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setUser(\Ivoz\Provider\Domain\Model\User\User $user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param integer $extensionId
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setExtensionId($extensionId)
    {
        $this->extensionId = $extensionId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExtensionId()
    {
        return $this->extensionId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Extension\Extension $extension
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setExtension(\Ivoz\Provider\Domain\Model\Extension\Extension $extension)
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Extension\Extension
     */
    public function getExtension()
    {
        return $this->extension;
    }

    /**
     * @param integer $voiceMailUserId
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setVoiceMailUserId($voiceMailUserId)
    {
        $this->voiceMailUserId = $voiceMailUserId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getVoiceMailUserId()
    {
        return $this->voiceMailUserId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\User\User $voiceMailUser
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setVoiceMailUser(\Ivoz\Provider\Domain\Model\User\User $voiceMailUser)
    {
        $this->voiceMailUser = $voiceMailUser;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\User\User
     */
    public function getVoiceMailUser()
    {
        return $this->voiceMailUser;
    }

    /**
     * @param integer $numberCountryId
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setNumberCountryId($numberCountryId)
    {
        $this->numberCountryId = $numberCountryId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getNumberCountryId()
    {
        return $this->numberCountryId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Country\Country $numberCountry
     *
     * @return CallForwardSettingDtoAbstract
     */
    public function setNumberCountry(\Ivoz\Provider\Domain\Model\Country\Country $numberCountry)
    {
        $this->numberCountry = $numberCountry;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Country\Country
     */
    public function getNumberCountry()
    {
        return $this->numberCountry;
    }
}


