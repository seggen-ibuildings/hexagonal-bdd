<?php

namespace Tests\Application;

use Application\StartGameCommand;
use Application\StartGameHandler;
use Mockery;
use PHPUnit_Framework_TestCase;

class StartGameHandlerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldStartAGame()
    {
        $handler = new StartGameHandler();

        $command = new StartGameCommand();
        $handler->handle($command);

        $this->markTestIncomplete();
    }
}
