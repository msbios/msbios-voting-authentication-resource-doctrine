<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Resource\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use MSBios\Authentication\IdentityInterface;
use MSBios\Voting\Resource\Doctrine\Entity\PollInterface;

/**
 * Class UserRepository
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Repository
 */
class UserRepository extends EntityRepository
{
    /**
     * @param PollInterface $poll
     * @param IdentityInterface $identity
     */
    public function findByPollAndIdentity(PollInterface $poll, IdentityInterface $identity)
    {
    }
}
