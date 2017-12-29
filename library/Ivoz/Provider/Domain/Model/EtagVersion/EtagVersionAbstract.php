<?php

namespace Ivoz\Provider\Domain\Model\EtagVersion;

use Assert\Assertion;
use Ivoz\Core\Application\DataTransferObjectInterface;
use Ivoz\Core\Domain\Model\ChangelogTrait;

/**
 * EtagVersionAbstract
 * @codeCoverageIgnore
 */
abstract class EtagVersionAbstract
{
    /**
     * @var string
     */
    protected $table;

    /**
     * @var string
     */
    protected $etag;

    /**
     * @var \DateTime
     */
    protected $lastChange;


    use ChangelogTrait;

    /**
     * Constructor
     */
    protected function __construct()
    {

    }

    /**
     * @return void
     * @throws \Exception
     */
    protected function sanitizeValues()
    {
    }

    /**
     * @return EtagVersionDto
     */
    public static function createDto()
    {
        return new EtagVersionDto();
    }

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(DataTransferObjectInterface $dto)
    {
        /**
         * @var $dto EtagVersionDto
         */
        Assertion::isInstanceOf($dto, EtagVersionDto::class);

        $self = new static();

        $self
            ->setTable($dto->getTable())
            ->setEtag($dto->getEtag())
            ->setLastChange($dto->getLastChange())
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
         * @var $dto EtagVersionDto
         */
        Assertion::isInstanceOf($dto, EtagVersionDto::class);

        $this
            ->setTable($dto->getTable())
            ->setEtag($dto->getEtag())
            ->setLastChange($dto->getLastChange());



        $this->sanitizeValues();
        return $this;
    }

    /**
     * @return EtagVersionDto
     */
    public function toDto()
    {
        return self::createDto()
            ->setTable($this->getTable())
            ->setEtag($this->getEtag())
            ->setLastChange($this->getLastChange());
    }

    /**
     * @return array
     */
    protected function __toArray()
    {
        return [
            'table' => self::getTable(),
            'etag' => self::getEtag(),
            'lastChange' => self::getLastChange()
        ];
    }


    // @codeCoverageIgnoreStart

    /**
     * Set table
     *
     * @param string $table
     *
     * @return self
     */
    public function setTable($table = null)
    {
        if (!is_null($table)) {
            Assertion::maxLength($table, 55, 'table value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->table = $table;

        return $this;
    }

    /**
     * Get table
     *
     * @return string
     */
    public function getTable()
    {
        return $this->table;
    }

    /**
     * Set etag
     *
     * @param string $etag
     *
     * @return self
     */
    public function setEtag($etag = null)
    {
        if (!is_null($etag)) {
            Assertion::maxLength($etag, 255, 'etag value "%s" is too long, it should have no more than %d characters, but has %d characters.');
        }

        $this->etag = $etag;

        return $this;
    }

    /**
     * Get etag
     *
     * @return string
     */
    public function getEtag()
    {
        return $this->etag;
    }

    /**
     * Set lastChange
     *
     * @param \DateTime $lastChange
     *
     * @return self
     */
    public function setLastChange($lastChange = null)
    {
        if (!is_null($lastChange)) {
        $lastChange = \Ivoz\Core\Domain\Model\Helper\DateTimeHelper::createOrFix(
            $lastChange,
            null
        );
        }

        $this->lastChange = $lastChange;

        return $this;
    }

    /**
     * Get lastChange
     *
     * @return \DateTime
     */
    public function getLastChange()
    {
        return $this->lastChange;
    }



    // @codeCoverageIgnoreEnd
}

