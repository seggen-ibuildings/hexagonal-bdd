<?php

namespace Tests\Application\Game;

use Application\Game\Board;
use PHPUnit_Framework_TestCase;

class BoardTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldStartOutEmpty()
    {
        $board = new Board();
        
        $this->assertTrue($board->isEmpty());
    }
}
