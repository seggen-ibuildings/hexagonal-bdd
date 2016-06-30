<?php

namespace Tests\Application\Game;

use Application\Game\Board;
use Application\Game\Game;
use Application\Game\Move;
use Mockery;
use PHPUnit_Framework_TestCase;
use Ramsey\Uuid\UuidInterface;

class GameTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var Board
     */
    private $board;

    protected function setUp()
    {
        $this->id = Mockery::mock(UuidInterface::class);
        $this->board = Mockery::mock(Board::class);
    }

    /**
     * @test
     */
    public function shouldHaveAnId()
    {
        $game = new Game($this->id, $this->board);

        $this->assertSame($this->id, $game->getId());
    }

    /**
     * @test
     */
    public function shouldHaveABoard()
    {
        $game = new Game($this->id, $this->board);

        $this->assertSame($this->board, $game->getBoard());
    }
}
