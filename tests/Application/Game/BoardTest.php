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

        $this->assertEquals(0, $board->getNumberOfSymbols());
    }
    
    /**
     * @test
     */
    public function shouldHaveSymbolsThatMarkSpaces()
    {
        $board = new Board();
        
        $board->mark();
        
        $this->assertEquals(1, $board->getNumberOfSymbols());
    }
}
