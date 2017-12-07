<?php

namespace Ivoz\Provider\Domain\Model\PickUpRelUser;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class PickUpRelUserDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $pickUpGroupId;

    /**
     * @var mixed
     */
    private $userId;

    /**
     * @var mixed
     */
    private $pickUpGroup;

    /**
     * @var mixed
     */
    private $user;

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
            'id' => $this->getId(),
            'pickUpGroup' => $this->getPickUpGroup(),
            'user' => $this->getUser()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->pickUpGroup = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\PickUpGroup\\PickUpGroup', $this->getPickUpGroupId());
        $this->user = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\User\\User', $this->getUserId());
    }

    /**
     * {@inheritDoc}
     */
    public function transformCollections(CollectionTransformerInterface $transformer)
    {

    }

    /**
     * @param integer $id
     *
     * @return PickUpRelUserDtoAbstract
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
     * @param integer $pickUpGroupId
     *
     * @return PickUpRelUserDtoAbstract
     */
    public function setPickUpGroupId($pickUpGroupId)
    {
        $this->pickUpGroupId = $pickUpGroupId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getPickUpGroupId()
    {
        return $this->pickUpGroupId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroup $pickUpGroup
     *
     * @return PickUpRelUserDtoAbstract
     */
    public function setPickUpGroup(\Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroup $pickUpGroup)
    {
        $this->pickUpGroup = $pickUpGroup;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\PickUpGroup\PickUpGroup
     */
    public function getPickUpGroup()
    {
        return $this->pickUpGroup;
    }

    /**
     * @param integer $userId
     *
     * @return PickUpRelUserDtoAbstract
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
     * @return PickUpRelUserDtoAbstract
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
}


