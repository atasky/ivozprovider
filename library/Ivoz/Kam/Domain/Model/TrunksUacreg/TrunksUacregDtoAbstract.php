<?php

namespace Ivoz\Kam\Domain\Model\TrunksUacreg;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class TrunksUacregDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $lUuid = '';

    /**
     * @var string
     */
    private $lUsername = 'unused';

    /**
     * @var string
     */
    private $lDomain = 'unused';

    /**
     * @var string
     */
    private $rUsername = '';

    /**
     * @var string
     */
    private $rDomain = '';

    /**
     * @var string
     */
    private $realm = '';

    /**
     * @var string
     */
    private $authUsername = '';

    /**
     * @var string
     */
    private $authPassword = '';

    /**
     * @var string
     */
    private $authProxy = '';

    /**
     * @var integer
     */
    private $expires = '0';

    /**
     * @var integer
     */
    private $flags = '0';

    /**
     * @var integer
     */
    private $regDelay = '0';

    /**
     * @var boolean
     */
    private $multiddi = '0';

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $peeringContractId;

    /**
     * @var mixed
     */
    private $brand;

    /**
     * @var mixed
     */
    private $peeringContract;

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
            'lUuid' => $this->getLUuid(),
            'lUsername' => $this->getLUsername(),
            'lDomain' => $this->getLDomain(),
            'rUsername' => $this->getRUsername(),
            'rDomain' => $this->getRDomain(),
            'realm' => $this->getRealm(),
            'authUsername' => $this->getAuthUsername(),
            'authPassword' => $this->getAuthPassword(),
            'authProxy' => $this->getAuthProxy(),
            'expires' => $this->getExpires(),
            'flags' => $this->getFlags(),
            'regDelay' => $this->getRegDelay(),
            'multiddi' => $this->getMultiddi(),
            'id' => $this->getId(),
            'brandId' => $this->getBrandId(),
            'peeringContractId' => $this->getPeeringContractId()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
        $this->peeringContract = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $lUuid
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setLUuid($lUuid)
    {
        $this->lUuid = $lUuid;

        return $this;
    }

    /**
     * @return string
     */
    public function getLUuid()
    {
        return $this->lUuid;
    }

    /**
     * @param string $lUsername
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setLUsername($lUsername)
    {
        $this->lUsername = $lUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getLUsername()
    {
        return $this->lUsername;
    }

    /**
     * @param string $lDomain
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setLDomain($lDomain)
    {
        $this->lDomain = $lDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getLDomain()
    {
        return $this->lDomain;
    }

    /**
     * @param string $rUsername
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setRUsername($rUsername)
    {
        $this->rUsername = $rUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getRUsername()
    {
        return $this->rUsername;
    }

    /**
     * @param string $rDomain
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setRDomain($rDomain)
    {
        $this->rDomain = $rDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getRDomain()
    {
        return $this->rDomain;
    }

    /**
     * @param string $realm
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setRealm($realm)
    {
        $this->realm = $realm;

        return $this;
    }

    /**
     * @return string
     */
    public function getRealm()
    {
        return $this->realm;
    }

    /**
     * @param string $authUsername
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setAuthUsername($authUsername)
    {
        $this->authUsername = $authUsername;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthUsername()
    {
        return $this->authUsername;
    }

    /**
     * @param string $authPassword
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setAuthPassword($authPassword)
    {
        $this->authPassword = $authPassword;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->authPassword;
    }

    /**
     * @param string $authProxy
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setAuthProxy($authProxy)
    {
        $this->authProxy = $authProxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthProxy()
    {
        return $this->authProxy;
    }

    /**
     * @param integer $expires
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setExpires($expires)
    {
        $this->expires = $expires;

        return $this;
    }

    /**
     * @return integer
     */
    public function getExpires()
    {
        return $this->expires;
    }

    /**
     * @param integer $flags
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setFlags($flags)
    {
        $this->flags = $flags;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFlags()
    {
        return $this->flags;
    }

    /**
     * @param integer $regDelay
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setRegDelay($regDelay)
    {
        $this->regDelay = $regDelay;

        return $this;
    }

    /**
     * @return integer
     */
    public function getRegDelay()
    {
        return $this->regDelay;
    }

    /**
     * @param boolean $multiddi
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setMultiddi($multiddi)
    {
        $this->multiddi = $multiddi;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getMultiddi()
    {
        return $this->multiddi;
    }

    /**
     * @param integer $id
     *
     * @return TrunksUacregDtoAbstract
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
     * @param integer $brandId
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setBrandId($brandId)
    {
        $this->brandId = $brandId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getBrandId()
    {
        return $this->brandId;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return TrunksUacregDtoAbstract
     */
    public function setPeeringContractId($peeringContractId)
    {
        $this->peeringContractId = $peeringContractId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPeeringContractId()
    {
        return $this->peeringContractId;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }
}


