<?php

namespace Ivoz\Provider\Domain\Model\CallAcl;
use Ivoz\Provider\Domain\Model\CallAclRelMatchList\CallAclRelMatchList;
use Ivoz\Provider\Domain\Model\CallAclRelMatchList\CallAclRelMatchListInterface;

/**
 * CallAcl
 */
class CallAcl extends CallAclAbstract implements CallAclInterface
{
    use CallAclTrait;

    /**
     * @codeCoverageIgnore
     * @return array
     */
    public function getChangeSet()
    {
        return parent::getChangeSet();
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

    /**
     * @param $dst
     * @return bool
     */
    public function dstIsCallable($dst)
    {
        /**
         * @var CallAcl $this
         */
        $defaultPolicy = $this->getDefaultPolicy();

        $criteria = Criteria
            ::create()
            ->orderBy(['priority' => Criteria::ASC]);

        /**
         * @var CallAclRelMatchListInterface[] $aclRelMatchLists
         */
        $aclRelMatchLists = $this->getRelMatchLists($criteria);

        foreach($aclRelMatchLists as $aclRelMatchList) {
            $policy = $aclRelMatchList->getPolicy();
            $matchList = $aclRelMatchList->getMatchList();

            if($matchList->numberMatches($dst)) {
                return 'allow' === $policy;
            }
        }

        return 'allow' === $defaultPolicy;
    }
}

