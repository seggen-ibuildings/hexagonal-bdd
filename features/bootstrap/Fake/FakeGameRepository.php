<?php

namespace Fake;

use Application\Game\Game;
use Application\Game\GameRepository;
use Ramsey\Uuid\UuidInterface;
use RuntimeException;

class FakeGameRepository implements GameRepository
{
    /**
     * @var array
     */
    private $games;

    /**
     * @param array $games
     */
    public function __construct(array $games)
    {
        $this->games = $games;
    }

    /**
     * @param UuidInterface $id
     * @return Game
     * @throws RuntimeException if game was not found
     */
    public function get(UuidInterface $id)
    {
        foreach ($this->games as $game) {
            if ($game->getId()->equals($id)) {
                return $game;
            }
        }

        throw new RuntimeException("Game with ID '{$id}' was not found");
    }
}
