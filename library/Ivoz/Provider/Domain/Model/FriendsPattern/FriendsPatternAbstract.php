<?php

namespace Ivoz\Provider\Domain\Model\FriendsPattern;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * FriendsPatternAbstract
 * @codeCoverageIgnore
 */
abstract class FriendsPatternAbstract
{
    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $regExp;

    /**
     * @var \Ivoz\Provider\Domain\Model\Friend\FriendInterface
     */
    protected $friend;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct($name, $regExp)
    {
        $this->setName($name);
        $this->setRegExp($regExp);
    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return FriendsPatternDto
     */
    public static function createDto()
    {
        return new FriendsPatternDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FriendsPatternDto
         */
        Assertion::isInstanceOf($dto, FriendsPatternDto::class);

        $self = new static(
            $dto->getName(),
            $dto->getRegExp());

        $self
            ->setFriend($dto->getFriend())
        ;

        $self->sanitizeValues();
        $self->initChangelog();

        return $self;
    }

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto FriendsPatternDto
         */
        Assertion::isInstanceOf($dto, FriendsPatternDto::class);

        $this
            ->setName($dto->getName())
            ->setRegExp($dto->getRegExp())
            ->setFriend($dto->getFriend());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return FriendsPatternDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setName($this->getName())
            ->setRegExp($this->getRegExp())
            ->setFriend($this->getFriend() ? $this->getFriend()->toDto() : null);
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'name' => self::getName(),
            'regExp' => self::getRegExp(),
            'friendId' => self::getFriend() ? self::getFriend()->getId() : null
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name)
    {
        Assertion::notNull($name, 'name value "%s" is null, but non null value was expected.');
        Assertion::maxLength($name, 50, 'name value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set regExp
     *
     * @param string $regExp
     *
     * @return self
     */
    public function setRegExp($regExp)
    {
        Assertion::notNull($regExp, 'regExp value "%s" is null, but non null value was expected.');
        Assertion::maxLength($regExp, 255, 'regExp value "%s" is too long, it should have no more than %d characters, but has %d characters.');

        $this->regExp = $regExp;

        return $this;
    }

    /**
     * Get regExp
     *
     * @return string
     */
    public function getRegExp()
    {
        return $this->regExp;
    }

    /**
     * Set friend
     *
     * @param \Ivoz\Provider\Domain\Model\Friend\FriendInterface $friend
     *
     * @return self
     */
    public function setFriend(\Ivoz\Provider\Domain\Model\Friend\FriendInterface $friend = null)
    {
        $this->friend = $friend;

        return $this;
    }

    /**
     * Get friend
     *
     * @return \Ivoz\Provider\Domain\Model\Friend\FriendInterface
     */
    public function getFriend()
    {
        return $this->friend;
    }



    // @codeCoverageIgnoreEnd
}

