<?php

namespace Tests\Application\Game;

use Application\Game\Game;
use Application\Game\GameFactory;
use Mockery;
use PHPUnit_Framework_TestCase;
use Ramsey\Uuid\UuidInterface;

class GameFactoryTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UuidInterface
     */
    private $gameId;

    protected function setUp()
    {
        $this->gameId = Mockery::mock(UuidInterface::class);
    }

    /**
     * @test
     */
    public function shouldCreateAGame()
    {
        $gameFactory = new GameFactory();
        
        $game = $gameFactory->create($this->gameId);
        
        $this->assertInstanceOf(Game::class, $game);
    }
}
