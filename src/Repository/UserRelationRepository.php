<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Resource\Doctrine\Repository;

use Doctrine\ORM\Query\Expr\Join;
use MSBios\Authentication\IdentityInterface;
use MSBios\Resource\Doctrine\EntityRepository;
use MSBios\Voting\Resource\Doctrine\Entity\VoteRelation;
use MSBios\Voting\Resource\Record\PollInterface;

/**
 * Class UserRelationRepository
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Repository
 */
class UserRelationRepository extends EntityRepository implements IdentityRepositoryInterface
{
    /** @const DEFAULT_ALIAS */
    const DEFAULT_ALIAS = 'ur';

    /**
     * @param PollInterface $poll
     * @param IdentityInterface $identity
     * @return mixed
     * @throws \Doctrine\ORM\NonUniqueResultException
     */
    public function findOneByPollAndIdentity(PollInterface $poll, IdentityInterface $identity)
    {
        return $this
            ->createQueryBuilder(self::DEFAULT_ALIAS)
            ->join(VoteRelation::class, 'vr', Join::WITH, 'ur.vote = vr.id')
            ->where('ur.user = :identity')
            ->andWhere('vr.poll = :poll')
            ->setMaxResults(1)
            ->setParameter('identity', $identity)
            ->setParameter('poll', $poll)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
