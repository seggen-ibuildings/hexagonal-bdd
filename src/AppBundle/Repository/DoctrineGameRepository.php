<?php

namespace AppBundle\Repository;

use Application\Game\Game;
use Application\Game\GameRepository;
use Doctrine\ORM\EntityRepository;
use Ramsey\Uuid\UuidInterface;
use RuntimeException;

class DoctrineGameRepository extends EntityRepository implements GameRepository
{
    /**
     * @param UuidInterface $id
     * @return Game
     * @throws RuntimeException if game was not found
     */
    public function get(UuidInterface $id)
    {
        return $this->find($id);
    }

    /**
     * @param Game $game
     */
    public function add(Game $game)
    {
        // TODO: Implement add() method.
    }
}
