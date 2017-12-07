<?php

namespace Ivoz\Provider\Domain\Model\PeerServer;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class PeerServerDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $ip;

    /**
     * @var string
     */
    private $hostname;

    /**
     * @var integer
     */
    private $port;

    /**
     * @var string
     */
    private $params;

    /**
     * @var boolean
     */
    private $uriScheme;

    /**
     * @var boolean
     */
    private $transport;

    /**
     * @var boolean
     */
    private $strip;

    /**
     * @var string
     */
    private $prefix;

    /**
     * @var boolean
     */
    private $sendPAI = 0;

    /**
     * @var boolean
     */
    private $sendRPID = 0;

    /**
     * @var string
     */
    private $authNeeded = 'no';

    /**
     * @var string
     */
    private $authUser;

    /**
     * @var string
     */
    private $authPassword;

    /**
     * @var string
     */
    private $sipProxy;

    /**
     * @var string
     */
    private $outboundProxy;

    /**
     * @var string
     */
    private $fromUser;

    /**
     * @var string
     */
    private $fromDomain;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $lcrGatewayId;

    /**
     * @var mixed
     */
    private $peeringContractId;

    /**
     * @var mixed
     */
    private $brandId;

    /**
     * @var mixed
     */
    private $lcrGateway;

    /**
     * @var mixed
     */
    private $peeringContract;

    /**
     * @var mixed
     */
    private $brand;

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
            'ip' => $this->getIp(),
            'hostname' => $this->getHostname(),
            'port' => $this->getPort(),
            'params' => $this->getParams(),
            'uriScheme' => $this->getUriScheme(),
            'transport' => $this->getTransport(),
            'strip' => $this->getStrip(),
            'prefix' => $this->getPrefix(),
            'sendPAI' => $this->getSendPAI(),
            'sendRPID' => $this->getSendRPID(),
            'authNeeded' => $this->getAuthNeeded(),
            'authUser' => $this->getAuthUser(),
            'authPassword' => $this->getAuthPassword(),
            'sipProxy' => $this->getSipProxy(),
            'outboundProxy' => $this->getOutboundProxy(),
            'fromUser' => $this->getFromUser(),
            'fromDomain' => $this->getFromDomain(),
            'id' => $this->getId(),
            'lcrGateway' => $this->getLcrGateway(),
            'peeringContract' => $this->getPeeringContract(),
            'brand' => $this->getBrand()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->lcrGateway = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\LcrGateway\\LcrGateway', $this->getLcrGatewayId());
        $this->peeringContract = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\PeeringContract\\PeeringContract', $this->getPeeringContractId());
        $this->brand = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Brand\\Brand', $this->getBrandId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param string $ip
     *
     * @return PeerServerDtoAbstract
     */
    public function setIp($ip = null)
    {
        $this->ip = $ip;

        return $this;
    }

    /**
     * @return string
     */
    public function getIp()
    {
        return $this->ip;
    }

    /**
     * @param string $hostname
     *
     * @return PeerServerDtoAbstract
     */
    public function setHostname($hostname = null)
    {
        $this->hostname = $hostname;

        return $this;
    }

    /**
     * @return string
     */
    public function getHostname()
    {
        return $this->hostname;
    }

    /**
     * @param integer $port
     *
     * @return PeerServerDtoAbstract
     */
    public function setPort($port = null)
    {
        $this->port = $port;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPort()
    {
        return $this->port;
    }

    /**
     * @param string $params
     *
     * @return PeerServerDtoAbstract
     */
    public function setParams($params = null)
    {
        $this->params = $params;

        return $this;
    }

    /**
     * @return string
     */
    public function getParams()
    {
        return $this->params;
    }

    /**
     * @param boolean $uriScheme
     *
     * @return PeerServerDtoAbstract
     */
    public function setUriScheme($uriScheme = null)
    {
        $this->uriScheme = $uriScheme;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getUriScheme()
    {
        return $this->uriScheme;
    }

    /**
     * @param boolean $transport
     *
     * @return PeerServerDtoAbstract
     */
    public function setTransport($transport = null)
    {
        $this->transport = $transport;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getTransport()
    {
        return $this->transport;
    }

    /**
     * @param boolean $strip
     *
     * @return PeerServerDtoAbstract
     */
    public function setStrip($strip = null)
    {
        $this->strip = $strip;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getStrip()
    {
        return $this->strip;
    }

    /**
     * @param string $prefix
     *
     * @return PeerServerDtoAbstract
     */
    public function setPrefix($prefix = null)
    {
        $this->prefix = $prefix;

        return $this;
    }

    /**
     * @return string
     */
    public function getPrefix()
    {
        return $this->prefix;
    }

    /**
     * @param boolean $sendPAI
     *
     * @return PeerServerDtoAbstract
     */
    public function setSendPAI($sendPAI = null)
    {
        $this->sendPAI = $sendPAI;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSendPAI()
    {
        return $this->sendPAI;
    }

    /**
     * @param boolean $sendRPID
     *
     * @return PeerServerDtoAbstract
     */
    public function setSendRPID($sendRPID = null)
    {
        $this->sendRPID = $sendRPID;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSendRPID()
    {
        return $this->sendRPID;
    }

    /**
     * @param string $authNeeded
     *
     * @return PeerServerDtoAbstract
     */
    public function setAuthNeeded($authNeeded)
    {
        $this->authNeeded = $authNeeded;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthNeeded()
    {
        return $this->authNeeded;
    }

    /**
     * @param string $authUser
     *
     * @return PeerServerDtoAbstract
     */
    public function setAuthUser($authUser = null)
    {
        $this->authUser = $authUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getAuthUser()
    {
        return $this->authUser;
    }

    /**
     * @param string $authPassword
     *
     * @return PeerServerDtoAbstract
     */
    public function setAuthPassword($authPassword = null)
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
     * @param string $sipProxy
     *
     * @return PeerServerDtoAbstract
     */
    public function setSipProxy($sipProxy = null)
    {
        $this->sipProxy = $sipProxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getSipProxy()
    {
        return $this->sipProxy;
    }

    /**
     * @param string $outboundProxy
     *
     * @return PeerServerDtoAbstract
     */
    public function setOutboundProxy($outboundProxy = null)
    {
        $this->outboundProxy = $outboundProxy;

        return $this;
    }

    /**
     * @return string
     */
    public function getOutboundProxy()
    {
        return $this->outboundProxy;
    }

    /**
     * @param string $fromUser
     *
     * @return PeerServerDtoAbstract
     */
    public function setFromUser($fromUser = null)
    {
        $this->fromUser = $fromUser;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromUser()
    {
        return $this->fromUser;
    }

    /**
     * @param string $fromDomain
     *
     * @return PeerServerDtoAbstract
     */
    public function setFromDomain($fromDomain = null)
    {
        $this->fromDomain = $fromDomain;

        return $this;
    }

    /**
     * @return string
     */
    public function getFromDomain()
    {
        return $this->fromDomain;
    }

    /**
     * @param integer $id
     *
     * @return PeerServerDtoAbstract
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
     * @param integer $lcrGatewayId
     *
     * @return PeerServerDtoAbstract
     */
    public function setLcrGatewayId($lcrGatewayId)
    {
        $this->lcrGatewayId = $lcrGatewayId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getLcrGatewayId()
    {
        return $this->lcrGatewayId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\LcrGateway\LcrGateway $lcrGateway
     *
     * @return PeerServerDtoAbstract
     */
    public function setLcrGateway(\Ivoz\Provider\Domain\Model\LcrGateway\LcrGateway $lcrGateway)
    {
        $this->lcrGateway = $lcrGateway;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\LcrGateway\LcrGateway
     */
    public function getLcrGateway()
    {
        return $this->lcrGateway;
    }

    /**
     * @param integer $peeringContractId
     *
     * @return PeerServerDtoAbstract
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
     * @param \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContract $peeringContract
     *
     * @return PeerServerDtoAbstract
     */
    public function setPeeringContract(\Ivoz\Provider\Domain\Model\PeeringContract\PeeringContract $peeringContract)
    {
        $this->peeringContract = $peeringContract;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PeeringContract\PeeringContract
     */
    public function getPeeringContract()
    {
        return $this->peeringContract;
    }

    /**
     * @param integer $brandId
     *
     * @return PeerServerDtoAbstract
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
     * @param \Ivoz\Provider\Domain\Model\Brand\Brand $brand
     *
     * @return PeerServerDtoAbstract
     */
    public function setBrand(\Ivoz\Provider\Domain\Model\Brand\Brand $brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Brand\Brand
     */
    public function getBrand()
    {
        return $this->brand;
    }
}


