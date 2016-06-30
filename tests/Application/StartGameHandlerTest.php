<?php

namespace Tests\Application;

use Application\Game\Game;
use Application\Game\GameFactory;
use Application\Game\GameRepository;
use Application\StartGameCommand;
use Application\StartGameHandler;
use Mockery;
use Mockery\MockInterface;
use PHPUnit_Framework_TestCase;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;

class StartGameHandlerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UuidFactoryInterface|MockInterface
     */
    private $uuidFactory;

    /**
     * @var GameFactory|MockInterface
     */
    private $gameFactory;

    /**
     * @var GameRepository|MockInterface
     */
    private $gameRepository;

    /**
     * @var Game
     */
    private $game;

    /**
     * @var UuidInterface
     */
    private $gameId;

    protected function setUp()
    {
        $this->uuidFactory = Mockery::mock(UuidFactoryInterface::class);
        $this->gameFactory = Mockery::mock(GameFactory::class);
        $this->gameRepository = Mockery::spy(GameRepository::class);
        $this->gameId = Mockery::mock(UuidInterface::class);
        $this->game = Mockery::mock(Game::class);

        $this->uuidFactory->shouldReceive('fromString')->with('1234')->andReturn($this->gameId);
        $this->gameFactory->shouldReceive('create')->with($this->gameId)->andReturn($this->game);
        $this->gameRepository->shouldReceive('get')->with($this->gameId)->andReturn($this->game);
    }

    /**
     * @test
     */
    public function shouldStartAGame()
    {
        $handler = new StartGameHandler($this->uuidFactory, $this->gameFactory, $this->gameRepository);

        $command = new StartGameCommand();
        $command->gameId = '1234';
        $handler->handle($command);

        $this->gameRepository->shouldHaveReceived('add')->with($this->game);
    }
}
