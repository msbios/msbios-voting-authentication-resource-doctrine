<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Resource\Doctrine\Repository;

use Doctrine\ORM\Query\Expr\Join;
use MSBios\Authentication\IdentityInterface;
use MSBios\Resource\Doctrine\EntityRepository;
use MSBios\Voting\Resource\Doctrine\Entity\Vote;
use MSBios\Voting\Resource\Record\PollInterface;

/**
 * Class UserRepository
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Repository
 */
class UserRepository extends EntityRepository implements IdentityRepositoryInterface
{
    /** @const DEFAULT_ALIAS */
    const DEFAULT_ALIAS = 'u';

    /**
     * @param PollInterface $poll
     * @param IdentityInterface $identity
     * @return mixed
     */
    public function findByPollAndIdentity(PollInterface $poll, IdentityInterface $identity)
    {
        return $this
            ->createQueryBuilder(self::DEFAULT_ALIAS)
            ->join(Vote::class, 'v', Join::WITH)
            ->where('u.user = :identity')
            ->andWhere('v.poll = :poll')
            ->setMaxResults(1)
            ->setParameter('identity', $identity)
            ->setParameter('poll', $poll)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
