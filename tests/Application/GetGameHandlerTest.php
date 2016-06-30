<?php

namespace Tests\Application;

use Application\Game\Game;
use Application\Game\GameRepository;
use Application\GetGameHandler;
use Application\GetGameQuery;
use Mockery;
use Mockery\MockInterface;
use PHPUnit_Framework_TestCase;
use Ramsey\Uuid\UuidFactoryInterface;
use Ramsey\Uuid\UuidInterface;

class GetGameHandlerTest extends PHPUnit_Framework_TestCase
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
     * @var Game
     */
    private $game;

    protected function setUp()
    {
        $this->uuidFactory = Mockery::mock(UuidFactoryInterface::class);
        $this->gameRepository = Mockery::mock(GameRepository::class);
        $this->gameId = Mockery::mock(UuidInterface::class);
        $this->game = Mockery::mock(Game::class);
        
        $this->uuidFactory->shouldReceive('fromString')->with('1234')->andReturn($this->gameId);
        $this->gameRepository->shouldReceive('get')->with($this->gameId)->andReturn($this->game);
    }

    /**
     * @test
     */
    public function shouldGetAGame()
    {
        $handler = new GetGameHandler($this->gameRepository, $this->uuidFactory);

        $query = new GetGameQuery();
        $query->gameId = '1234';
        
        $result = $handler->handle($query);

        $this->assertSame($this->game, $result);
    }
}
