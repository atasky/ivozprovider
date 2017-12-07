<?php

namespace Ivoz\Provider\Domain\Model\PickUpGroup;

use Ivoz\Core\Domain\Model\LoggableEntityInterface;
use Doctrine\Common\Collections\Collection;

interface PickUpGroupInterface extends LoggableEntityInterface
{
    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet();

    /**
     * @return PickUpGroupDto
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
     * @return PickUpGroupDto
     */
    public function toDto();

    /**
     * Set name
     *
     * @param string $name
     *
     * @return self
     */
    public function setName($name);

    /**
     * Get name
     *
     * @return string
     */
    public function getName();

    /**
     * Set company
     *
     * @param \Ivoz\Provider\Domain\Model\Company\CompanyInterface $company
     *
     * @return self
     */
    public function setCompany(\Ivoz\Provider\Domain\Model\Company\CompanyInterface $company);

    /**
     * Get company
     *
     * @return \Ivoz\Provider\Domain\Model\Company\CompanyInterface
     */
    public function getCompany();

    /**
     * Add relUser
     *
     * @param \Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface $relUser
     *
     * @return PickUpGroupTrait
     */
    public function addRelUser(\Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface $relUser);

    /**
     * Remove relUser
     *
     * @param \Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface $relUser
     */
    public function removeRelUser(\Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface $relUser);

    /**
     * Replace relUsers
     *
     * @param \Ivoz\Provider\Domain\Model\PickUpRelUser\PickUpRelUserInterface[] $relUsers
     * @return self
     */
    public function replaceRelUsers(Collection $relUsers);

    /**
     * Get relUsers
     *
     * @return array
     */
    public function getRelUsers(\Doctrine\Common\Collections\Criteria $criteria = null);

}

