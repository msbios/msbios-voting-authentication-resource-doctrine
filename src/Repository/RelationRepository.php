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
use MSBios\Voting\Resource\Doctrine\Entity\Vote\Relation;
use MSBios\Voting\Resource\Record\PollInterface;

/**
 * Class RelationRepository
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Repository
 */
class RelationRepository extends EntityRepository implements IdentityRepositoryInterface
{
    /**
     * @param PollInterface $poll
     * @param IdentityInterface $identity
     * @return mixed
     */
    public function findByPollAndIdentity(PollInterface $poll, IdentityInterface $identity)
    {
        /** @var QueryBuilder $qb */
        $qb = $this->createQueryBuilder('ur');

        $qb
            ->join(Relation::class, 'vr', Join::WITH)
            ->where('ur.user = :identity')
            ->andWhere('vr.poll = :poll')
            ->setMaxResults(1)
            ->setParameter('identity', $identity)
            ->setParameter('poll', $poll)
        ;

        return $qb->getQuery()->getOneOrNullResult();
    }
}
