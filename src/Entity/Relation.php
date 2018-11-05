<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */

namespace MSBios\Voting\Authentication\Resource\Doctrine\Entity;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Guard\Resource\UserInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;
use MSBios\Voting\Authentication\Resource\Doctrine\Entity;
use MSBios\Voting\Resource\Record\VoteInterface;

/**
 * Class Relation
 * @package MSBios\Voting\Authentication\Resource\Doctrine\Entity
 *
 * @ORM\Entity(repositoryClass="MSBios\Voting\Authentication\Resource\Doctrine\Repository\RelationRepository")
 * @ORM\Table(name="vot_t_user_relations",
 *     indexes={
 *          @ORM\Index(name="rowstatus", columns={"rowstatus"})}
 *     )
 */
class Relation extends Entity implements
    TimestampableAwareInterface,
    RowStatusableAwareInterface
{
    use TimestampableAwareTrait;
    use RowStatusableAwareTrait;
    use VotingTrait;

    /**
     * @var VoteInterface
     *
     * @ORM\ManyToOne(targetEntity="MSBios\Voting\Resource\Doctrine\Entity\Vote\Relation")
     * @ORM\JoinColumn(name="voteid", referencedColumnName="id")
     */
    private $vote;

    /**
     * @var UserInterface
     *
     * @ORM\ManyToOne(targetEntity="MSBios\Guard\Resource\Doctrine\UserInterface")
     * @ORM\JoinColumn(name="userid", referencedColumnName="id")
     */
    private $user;

    /**
     * @return VoteInterface
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
     * @return $this
     */
    public function setUser(UserInterface $user)
    {
        $this->user = $user;
        return $this;
    }
}
