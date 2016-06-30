<?php

namespace Tests\Application\Game;

use Application\Game\Move;
use PHPUnit_Framework_TestCase;

class MoveTest extends PHPUnit_Framework_TestCase
{
    const ROW = 1;
    const COLUMN = 2;

    /**
     * @test
     */
    public function shouldHaveARow()
    {
        $move = new Move(self::ROW, self::COLUMN);

        $this->assertEquals(self::ROW, $move->getRow());
    }

    /**
     * @test
     */
    public function shouldHaveAColumn()
    {
        $move = new Move(self::ROW, self::COLUMN);

        $this->assertEquals(self::COLUMN, $move->getColumn());
    }
}
