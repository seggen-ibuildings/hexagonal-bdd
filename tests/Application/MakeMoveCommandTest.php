<?php

namespace Tests\Application;

use Application\MakeMoveCommand;
use PHPUnit_Framework_TestCase;

class MakeMoveCommandTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldHaveAGameId()
    {
        $command = new MakeMoveCommand();

        $this->assertObjectHasAttribute('gameId', $command);
    }

    /**
     * @test
     */
    public function shouldHaveARow()
    {
        $command = new MakeMoveCommand();

        $this->assertObjectHasAttribute('row', $command);
    }

    /**
     * @test
     */
    public function shouldHaveAColumn()
    {
        $command = new MakeMoveCommand();

        $this->assertObjectHasAttribute('column', $command);
    }
}
