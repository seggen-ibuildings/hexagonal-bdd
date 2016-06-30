<?php

namespace Tests\Application;

use Application\StartGameCommand;
use PHPUnit_Framework_TestCase;

class StartGameCommandTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldHaveAGameId()
    {
        $command = new StartGameCommand();

        $this->assertObjectHasAttribute('gameId', $command);
    }

    /**
     * @test
     */
    public function shouldHaveAPlayerName()
    {
        $command = new StartGameCommand();

        $this->assertObjectHasAttribute('playerName', $command);
    }
}
