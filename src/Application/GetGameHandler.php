<?php

namespace Application;

use Application\Game\Game;
use Application\Game\GameRepository;
use Ramsey\Uuid\UuidFactoryInterface;

class GetGameHandler
{
    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * @var UuidFactoryInterface
     */
    private $uuidFactory;

    /**
     * @param GameRepository $gameRepository
     * @param UuidFactoryInterface $uuidFactory
     */
    public function __construct(GameRepository $gameRepository, UuidFactoryInterface $uuidFactory)
    {
        $this->gameRepository = $gameRepository;
        $this->uuidFactory = $uuidFactory;
    }

    /**
     * @param GetGameQuery $query
     * @return Game
     */
    public function handle(GetGameQuery $query)
    {
        $gameId = $this->uuidFactory->fromString($query->gameId);
        $game = $this->gameRepository->get($gameId);

        return $game;
    }
}
