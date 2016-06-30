<?php

namespace Application;

use Application\Game\GameRepository;
use Application\Game\Move;
use Ramsey\Uuid\UuidFactoryInterface;

class MakeMoveHandler
{
    /**
     * @var UuidFactoryInterface
     */
    private $uuidFactory;

    /**
     * @var GameRepository
     */
    private $gameRepository;

    /**
     * @param UuidFactoryInterface $uuidFactory
     * @param GameRepository $gameRepository
     */
    public function __construct(UuidFactoryInterface $uuidFactory, GameRepository $gameRepository)
    {
        $this->uuidFactory = $uuidFactory;
        $this->gameRepository = $gameRepository;
    }

    /**
     * @param MakeMoveCommand $command
     */
    public function handle(MakeMoveCommand $command)
    {
        $gameId = $this->uuidFactory->fromString($command->gameId);
        $game = $this->gameRepository->get($gameId);

        $move = new Move($command->row, $command->column);
        $game->makeMove($move);
    }
}
