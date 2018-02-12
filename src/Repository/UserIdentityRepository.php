<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Resource\Doctrine\Repository;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\Query\Expr\Join;
use Doctrine\ORM\QueryBuilder;
use MSBios\Authentication\IdentityInterface;
use MSBios\Voting\Resource\Doctrine\Entity\PollInterface;
use MSBios\Voting\Resource\Doctrine\Entity\Vote;

/**
 * Class UserRepository
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Repository
 */
class UserIdentityRepository extends EntityRepository implements IdentityRepositoryInterface
{
    /**
     * @param PollInterface $poll
     * @param IdentityInterface $identity
     */
    public function findByPollAndIdentity(PollInterface $poll, IdentityInterface $identity)
    {
        /** @var QueryBuilder $qb */
        $qb = $this->createQueryBuilder('u');

        $qb
            ->join(Vote::class, 'r', Join::WITH)
            ->where('u.user = :identity')
            ->andWhere('v.poll = :poll')
            ->setMaxResults(1)
            ->setParameter('identity', $identity)
            ->setParameter('poll', $poll)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
