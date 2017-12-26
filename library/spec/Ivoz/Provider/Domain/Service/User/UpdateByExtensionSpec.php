<?php

namespace spec\Ivoz\Provider\Domain\Service\User;

use Ivoz\Core\Domain\Service\EntityPersisterInterface;
use Ivoz\Provider\Domain\Model\User\UserRepository;
use Ivoz\Provider\Domain\Service\User\UpdateByExtension;
use PhpSpec\ObjectBehavior;
use Prophecy\Argument;

class UpdateByExtensionSpec extends ObjectBehavior
{
    /**
     * @var UserRepository
     */
    protected $userRepository;

    /**
     * @var EntityPersisterInterface
     */
    protected $entityPersister;

    public function let(
        UserRepository $userRepository,
        EntityPersisterInterface $entityPersister
    ) {
        $this->userRepository = $userRepository;
        $this->entityPersister = $entityPersister;

        $this->beConstructedWith($userRepository, $entityPersister);
    }

    function it_is_initializable()
    {
        $this->shouldHaveType(UpdateByExtension::class);
    }
}
