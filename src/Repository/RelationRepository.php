<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Resource\Doctrine\Repository;

use Doctrine\ORM\Query\Expr\Join;
use MSBios\Authentication\IdentityInterface;
use MSBios\Resource\Doctrine\EntityRepository;
use MSBios\Voting\Resource\Doctrine\Entity\Vote\Relation;
use MSBios\Voting\Resource\Record\PollInterface;

/**
 * Class RelationRepository
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Repository
 */
class RelationRepository extends EntityRepository implements IdentityRepositoryInterface
{
    /** @const DEFAULT_ALIAS */
    const DEFAULT_ALIAS = 'ur';

    /**
     * @param PollInterface $poll
     * @param IdentityInterface $identity
     * @return mixed
     */
    public function findByPollAndIdentity(PollInterface $poll, IdentityInterface $identity)
    {
        return $this
            ->createQueryBuilder(self::DEFAULT_ALIAS)
            ->join(Relation::class, 'vr', Join::WITH)
            ->where('ur.user = :identity')
            ->andWhere('vr.poll = :poll')
            ->setMaxResults(1)
            ->setParameter('identity', $identity)
            ->setParameter('poll', $poll)
            ->getQuery()
            ->getOneOrNullResult();
    }
}
