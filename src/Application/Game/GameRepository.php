<?php

namespace Application\Game;

use Ramsey\Uuid\UuidInterface;
use RuntimeException;

interface GameRepository
{
    /**
     * @param UuidInterface $id
     * @return Game
     * @throws RuntimeException if game was not found
     */
    public function get(UuidInterface $id);

    /**
     * @param Game $game
     */
    public function add(Game $game);
}
