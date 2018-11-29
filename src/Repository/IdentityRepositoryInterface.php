<?php
/**
 * @access protected
 * @author Jduzhin Miles <info[woof-woof]msbios.com>
 */
namespace MSBios\Voting\Authentication\Resource\Doctrine\Repository;

use MSBios\Authentication\IdentityInterface;
use MSBios\Voting\Resource\Record\PollInterface;

/**
 * Interface IdentityRepositoryInterface
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Repository
 */
interface IdentityRepositoryInterface
{
    /**
     * @param PollInterface $poll
     * @param IdentityInterface $identity
     * @return mixed
     */
    public function findOneByPollAndIdentity(PollInterface $poll, IdentityInterface $identity);
}
