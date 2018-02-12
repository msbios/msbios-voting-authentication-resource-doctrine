<?php
/**
 * @access protected
 * @author Judzhin Miles <judzhin[at]gns-it.com>
 */

namespace MSBios\Voting\Authentication\Resource\Doctrine\Entity\User;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Guard\Resource\Doctrine\UserInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareInterface;
use MSBios\Resource\Doctrine\RowStatusableAwareTrait;
use MSBios\Resource\Doctrine\TimestampableAwareInterface;
use MSBios\Resource\Doctrine\TimestampableAwareTrait;
use MSBios\Voting\Authentication\Resource\Doctrine\Entity;
use MSBios\Voting\Resource\Doctrine\Entity\VoteInterface;

/**
 * Class Vote
 * @package OpenPower\Resource\Entity
 *
 * @ORM\Entity()
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
    use Entity\VotingTrait;

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
}
