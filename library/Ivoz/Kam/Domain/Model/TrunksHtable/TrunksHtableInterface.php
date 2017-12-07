<?php

namespace Ivoz\Kam\Domain\Model\TrunksHtable;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;

interface TrunksHtableInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return TrunksHtableDto
     */
    public static function createDto();

    /**
     * Factory method
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public static function fromDto(\Ivoz\Core\Application\DataTransferObjectInterface $dto);

    /**
     * @param DataTransferObjectInterface $dto
     * @return self
     */
    public function updateFromDto(\Ivoz\Core\Application\DataTransferObjectInterface $dto);

    /**
     * @return TrunksHtableDto
     */
    public function toDto();

    /**
     * Set keyName
     *
     * @param string $keyName
     *
     * @return self
     */
    public function setKeyName($keyName);

    /**
     * Get keyName
     *
     * @return string
     */
    public function getKeyName();

    /**
     * Set keyType
     *
     * @param integer $keyType
     *
     * @return self
     */
    public function setKeyType($keyType);

    /**
     * Get keyType
     *
     * @return integer
     */
    public function getKeyType();

    /**
     * Set valueType
     *
     * @param integer $valueType
     *
     * @return self
     */
    public function setValueType($valueType);

    /**
     * Get valueType
     *
     * @return integer
     */
    public function getValueType();

    /**
     * Set keyValue
     *
     * @param string $keyValue
     *
     * @return self
     */
    public function setKeyValue($keyValue);

    /**
     * Get keyValue
     *
     * @return string
     */
    public function getKeyValue();

    /**
     * Set expires
     *
     * @param integer $expires
     *
     * @return self
     */
    public function setExpires($expires);

    /**
     * Get expires
     *
     * @return integer
     */
    public function getExpires();

}

