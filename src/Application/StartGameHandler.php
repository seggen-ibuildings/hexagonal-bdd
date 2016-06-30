<?php

namespace Application;

use Application\Game\Board;
use Application\Game\Game;
use Application\Game\GameFactory;
use Application\Game\GameRepository;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactoryInterface;

class StartGameHandler
{
    /**
     * @var UuidFactoryInterface
     */
    private $uuidFactory;

    /**
     * @var GameFactory
     */
    private $gameFactory;

    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * @param UuidFactoryInterface $uuidFactory
     * @param GameFactory $gameFactory
     * @param GameRepository $gameRepository
     */
    public function __construct(UuidFactoryInterface $uuidFactory, GameFactory $gameFactory, GameRepository $gameRepository)
    {
        $this->uuidFactory = $uuidFactory;
        $this->gameFactory = $gameFactory;
        $this->gameRepository = $gameRepository;
    }

    /**
     * @param StartGameCommand $command
     */
    public function handle(StartGameCommand $command)
    {
        $gameId = $this->uuidFactory->fromString($command->gameId);
        $game = $this->gameFactory->create($gameId);

        $this->gameRepository->add($game);
    }
}
