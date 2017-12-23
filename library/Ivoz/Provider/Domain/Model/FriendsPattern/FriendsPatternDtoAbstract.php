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
     * @var \Ivoz\Provider\Domain\Model\Friend\FriendDto | null
     */
    private $friend;


    public function __construct($id = null)
    {
        $this->setId($id);
    }

    /**
     * @inheritdoc
     */
    public function normalize(string $context)
    {
        $response = $this->toArray();
        $contextProperties = $this->getPropertyMap($context);

        return array_filter(
            $response,
            function ($key) use ($contextProperties) {
                return in_array($key, $contextProperties);
            },
            ARRAY_FILTER_USE_KEY
        );
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
        if ($context === self::CONTEXT_COLLECTION) {
            return ['id'];
        }

        return [
            'name',
            'regExp',
            'id',
            'friend'
        ];
    }

    /**
     * @return array
     */
    public function toArray()
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
     * @param string $regExp
     *
     * @return static
     */
    public function setRegExp($regExp = null)
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
     * @param \Ivoz\Provider\Domain\Model\Friend\FriendDto $friend
     *
     * @return static
     */
    public function setFriend(\Ivoz\Provider\Domain\Model\Friend\FriendDto $friend = null)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * @return \Ivoz\Provider\Domain\Model\Friend\FriendDto
     */
    public function getFriend()
    {
        return $this->friend;
    }

        /**
         * @param integer $id
         *
         * @return static
         */
        public function setFriendId($id)
        {
            $value = $id
                ? new \Ivoz\Provider\Domain\Model\Friend\FriendDto($id)
                : null;

            return $this->setFriend($value);
        }

        /**
         * @return integer | null
         */
        public function getFriendId()
        {
            if ($dto = $this->getFriend()) {
                return $dto->getId();
            }

            return null;
        }
}

