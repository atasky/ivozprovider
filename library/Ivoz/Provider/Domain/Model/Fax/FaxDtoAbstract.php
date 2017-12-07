<?php

namespace Ivoz\Provider\Domain\Model\Fax;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class FaxDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $sendByEmail = '1';

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
    private $outgoingDdiId;

    /**
     * @var mixed
     */
    private $company;

    /**
     * @var mixed
     */
    private $outgoingDdi;

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
            'email' => $this->getEmail(),
            'sendByEmail' => $this->getSendByEmail(),
            'id' => $this->getId(),
            'company' => $this->getCompany(),
            'outgoingDdi' => $this->getOutgoingDdi()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->company = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Company\\Company', $this->getCompanyId());
        $this->outgoingDdi = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Ddi\\Ddi', $this->getOutgoingDdiId());
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
     * @return FaxDtoAbstract
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
     * @param string $email
     *
     * @return FaxDtoAbstract
     */
    public function setEmail($email = null)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param boolean $sendByEmail
     *
     * @return FaxDtoAbstract
     */
    public function setSendByEmail($sendByEmail)
    {
        $this->sendByEmail = $sendByEmail;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getSendByEmail()
    {
        return $this->sendByEmail;
    }

    /**
     * @param integer $id
     *
     * @return FaxDtoAbstract
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
     * @return FaxDtoAbstract
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
     * @return FaxDtoAbstract
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
     * @param integer $outgoingDdiId
     *
     * @return FaxDtoAbstract
     */
    public function setOutgoingDdiId($outgoingDdiId)
    {
        $this->outgoingDdiId = $outgoingDdiId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getOutgoingDdiId()
    {
        return $this->outgoingDdiId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Ddi\Ddi $outgoingDdi
     *
     * @return FaxDtoAbstract
     */
    public function setOutgoingDdi(\Ivoz\Provider\Domain\Model\Ddi\Ddi $outgoingDdi)
    {
        $this->outgoingDdi = $outgoingDdi;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Ddi\Ddi
     */
    public function getOutgoingDdi()
    {
        return $this->outgoingDdi;
    }
}


