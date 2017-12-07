<?php

namespace Ivoz\Provider\Domain\Model\IvrEntry;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class IvrEntryDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $entry;

    /**
     * @var string
     */
    private $routeType;

    /**
     * @var string
     */
    private $numberValue;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $ivrId;

    /**
     * @var mixed
     */
    private $welcomeLocutionId;

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
    private $conditionalRouteId;

    /**
     * @var mixed
     */
    private $numberCountryId;

    /**
     * @var mixed
     */
    private $ivr;

    /**
     * @var mixed
     */
    private $welcomeLocution;

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
    private $conditionalRoute;

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
            'entry' => $this->getEntry(),
            'routeType' => $this->getRouteType(),
            'numberValue' => $this->getNumberValue(),
            'id' => $this->getId(),
            'ivr' => $this->getIvr(),
            'welcomeLocution' => $this->getWelcomeLocution(),
            'extension' => $this->getExtension(),
            'voiceMailUser' => $this->getVoiceMailUser(),
            'conditionalRoute' => $this->getConditionalRoute(),
            'numberCountry' => $this->getNumberCountry()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->ivr = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Ivr\\Ivr', $this->getIvrId());
        $this->welcomeLocution = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Locution\\Locution', $this->getWelcomeLocutionId());
        $this->extension = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Extension\\Extension', $this->getExtensionId());
        $this->voiceMailUser = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getVoiceMailUserId());
        $this->conditionalRoute = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\ConditionalRoute\\ConditionalRoute', $this->getConditionalRouteId());
        $this->numberCountry = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Country\\Country', $this->getNumberCountryId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $entry
     *
     * @return IvrEntryDtoAbstract
     */
    public function setEntry($entry)
    {
        $this->entry = $entry;

        return $this;
    }

    /**
     * @return string
     */
    public function getEntry()
    {
        return $this->entry;
    }

    /**
     * @param string $routeType
     *
     * @return IvrEntryDtoAbstract
     */
    public function setRouteType($routeType)
    {
        $this->routeType = $routeType;

        return $this;
    }

    /**
     * @return string
     */
    public function getRouteType()
    {
        return $this->routeType;
    }

    /**
     * @param string $numberValue
     *
     * @return IvrEntryDtoAbstract
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
     * @param integer $id
     *
     * @return IvrEntryDtoAbstract
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
     * @param integer $ivrId
     *
     * @return IvrEntryDtoAbstract
     */
    public function setIvrId($ivrId)
    {
        $this->ivrId = $ivrId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getIvrId()
    {
        return $this->ivrId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Ivr\Ivr $ivr
     *
     * @return IvrEntryDtoAbstract
     */
    public function setIvr(\Ivoz\Provider\Domain\Model\Ivr\Ivr $ivr)
    {
        $this->ivr = $ivr;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Ivr\Ivr
     */
    public function getIvr()
    {
        return $this->ivr;
    }

    /**
     * @param integer $welcomeLocutionId
     *
     * @return IvrEntryDtoAbstract
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
     * @return IvrEntryDtoAbstract
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
     * @param integer $extensionId
     *
     * @return IvrEntryDtoAbstract
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
     * @return IvrEntryDtoAbstract
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
     * @return IvrEntryDtoAbstract
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
     * @return IvrEntryDtoAbstract
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
     * @param integer $conditionalRouteId
     *
     * @return IvrEntryDtoAbstract
     */
    public function setConditionalRouteId($conditionalRouteId)
    {
        $this->conditionalRouteId = $conditionalRouteId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getConditionalRouteId()
    {
        return $this->conditionalRouteId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRoute $conditionalRoute
     *
     * @return IvrEntryDtoAbstract
     */
    public function setConditionalRoute(\Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRoute $conditionalRoute)
    {
        $this->conditionalRoute = $conditionalRoute;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\ConditionalRoute\ConditionalRoute
     */
    public function getConditionalRoute()
    {
        return $this->conditionalRoute;
    }

    /**
     * @param integer $numberCountryId
     *
     * @return IvrEntryDtoAbstract
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
     * @return IvrEntryDtoAbstract
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


