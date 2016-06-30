<?php

namespace Application\Game;

use Ramsey\Uuid\UuidInterface;

class GameFactory
{
    /**
     * @param UuidInterface $gameId
     * @return Game
     */
    public function create(UuidInterface $gameId)
    {
        return new Game($gameId, new Board());
    }
}
