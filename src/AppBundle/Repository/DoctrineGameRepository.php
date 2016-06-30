<?php

namespace AppBundle\Repository;

use Application\Game\Game;
use Application\Game\GameRepository;
use Ramsey\Uuid\UuidInterface;
use RuntimeException;

class DoctrineGameRepository implements GameRepository
{
    /**
     * @param UuidInterface $id
     * @return Game
     * @throws RuntimeException if game was not found
     */
    public function get(UuidInterface $id)
    {
        // TODO: Implement get() method.
    }

    /**
     * @param Game $game
     */
    public function add(Game $game)
    {
        // TODO: Implement add() method.
    }
}
