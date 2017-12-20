<?php

namespace Ivoz\Provider\Domain\Model\Administrator;

use Symfony\Component\Security\Core\User\AdvancedUserInterface;

/**
 * Administrator
 */
class Administrator extends AdministratorAbstract implements AdministratorInterface, AdvancedUserInterface, \Serializable
{
    use AdministratorTrait;
    use SecurityTrait;

    /**
     * @return array
     */
    public function getChangeSet()
    {
        $changeSet = parent::getChangeSet();
        if (isset($changeSet['pass'])) {
            $changeSet['pass'] = '****';
        }

        return $changeSet;
    }

    /**
     * Get id
     * @codeCoverageIgnore
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }


    public function serialize()
    {
        return serialize(array(
            $this->id,
            $this->username,
            $this->pass,
            $this->email,
            $this->active
        ));
    }
    public function unserialize($serialized)
    {
        list (
            $this->id,
            $this->username,
            $this->pass,
            $this->email,
            $this->active
            ) = unserialize($serialized);
    }
}

