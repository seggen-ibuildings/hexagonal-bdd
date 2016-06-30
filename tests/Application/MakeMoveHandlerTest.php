<?php

namespace Tests\Application;

use Application\Game\Game;
use Application\Game\GameRepository;
use Application\Game\Move;
use Application\MakeMoveCommand;
use Application\MakeMoveHandler;
use Mockery;
use Mockery\MockInterface;
use PHPUnit_Framework_TestCase;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;

class MakeMoveHandlerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UuidFactoryInterface|MockInterface
     */
    private $uuidFactory;

    /**
     * @var GameRepository|MockInterface
     */
    private $gameRepository;

    /**
     * @var UuidInterface
     */
    private $gameId;

    /**
     * @var Game|MockInterface
     */
    private $game;

    protected function setUp()
    {
        $this->uuidFactory = Mockery::mock(UuidFactoryInterface::class);
        $this->gameRepository = Mockery::mock(GameRepository::class);
        $this->gameId = Mockery::mock(UuidInterface::class);
        $this->game = Mockery::spy(Game::class);

        $this->uuidFactory->shouldReceive('fromString')->with('1234')->andReturn($this->gameId);
        $this->gameRepository->shouldReceive('get')->with($this->gameId)->andReturn($this->game);
    }

    /**
     * @test
     */
    public function shouldMakeAMove()
    {
        $handler = new MakeMoveHandler($this->uuidFactory, $this->gameRepository);
        $move = new Move(1, 2);

        $command = new MakeMoveCommand();
        $command->gameId = '1234';
        $command->row = 1;
        $command->column = 2;
        $handler->handle($command);

        $this->game->shouldHaveReceived('makeMove')->with(Mockery::mustBe($move));
    }
}
