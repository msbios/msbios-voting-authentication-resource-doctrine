<?php
/**
 * @access protected
 * @author Judzhin Miles <info[woof-woof]msbios.com>
 */

namespace MSBios\Voting\Authentication\Resource\Doctrine;

use Doctrine\ORM\Mapping as ORM;
use MSBios\Resource\Doctrine\Entity as DefaultEntity;
use MSBios\Resource\Doctrine\IdentifierAwareTrait;

/**
 * Class Entity
 * @package MSBios\Voting\Authentication\Resource\Doctrine
 * @ORM\MappedSuperclass
 */
abstract class Entity extends DefaultEntity
{
    use IdentifierAwareTrait;
}
