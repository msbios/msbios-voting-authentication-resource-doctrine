<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Voting\Authentication\Resource\Doctrine\Entity;

use MSBios\Guard\Resource\UserInterface;
use MSBios\Voting\Resource\Record\VoteInterface;

/**
 * Trait VotingTrait
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Entity
 */
trait VotingTrait
{
    /**
     * @var VoteInterface
     */
    private $vote;

    /**
     * @var UserInterface
     */
    private $user;

    /**
     * @return mixed
     */
    public function getVote()
    {
        return $this->vote;
    }

    /**
     * @param VoteInterface $vote
     * @return $this
     */
    public function setVote(VoteInterface $vote)
    {
        $this->vote = $vote;
        return $this;
    }

    /**
     * @return UserInterface
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param UserInterface $user
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
        return $this;
    }
}
