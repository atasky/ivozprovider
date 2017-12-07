<?php

namespace Ivoz\Provider\Domain\Model\FriendsPattern;

use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Application\ForeignKeyTransformerInterface;
use Ivoz\Core\Application\CollectionTransformerInterface;

/**
 * @codeCoverageIgnore
 */
abstract class FriendsPatternDtoAbstract implements DataTransferObjectInterface
{
    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $regExp;

    /**
     * @var integer
     */
    private $id;

    /**
     * @var mixed
     */
    private $friendId;

    /**
     * @var mixed
     */
    private $friend;

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
            'regExp' => $this->getRegExp(),
            'id' => $this->getId(),
            'friend' => $this->getFriend()
        ];
    }

    /**
     * {@inheritDoc}
     */
    public function transformForeignKeys(ForeignKeyTransformerInterface $transformer)
    {
        $this->friend = $transformer->transform('Ivoz\\Provider\\Domain\\Model\\Friend\\Friend', $this->getFriendId());
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
     * @return FriendsPatternDtoAbstract
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
     * @param string $regExp
     *
     * @return FriendsPatternDtoAbstract
     */
    public function setRegExp($regExp)
    {
        $this->regExp = $regExp;

        return $this;
    }

    /**
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
    }

    /**
     * @param integer $id
     *
     * @return FriendsPatternDtoAbstract
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
     * @param integer $friendId
     *
     * @return FriendsPatternDtoAbstract
     */
    public function setFriendId($friendId)
    {
        $this->friendId = $friendId;

        return $this;
    }

    /**
     * @return integer
     */
    public function getFriendId()
    {
        return $this->friendId;
    }

    /**
     * @param \Ivoz\Provider\Domain\Model\Friend\Friend $friend
     *
     * @return FriendsPatternDtoAbstract
     */
    public function setFriend(\Ivoz\Provider\Domain\Model\Friend\Friend $friend)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Friend\Friend
     */
    public function getFriend()
    {
        return $this->friend;
    }
}


