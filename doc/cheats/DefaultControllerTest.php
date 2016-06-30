<?php

namespace Tests\AppBundle\Controller;

use Application\StartGameCommand;
use Application\StartGameHandler;
use Mockery;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class DefaultControllerTest extends WebTestCase
{
    /**
     * @test
     */
    public function shouldProvideStartButton()
    {
        $client = static::createClient();

        $crawler = $client->request('GET', '/');

        $this->assertEquals(200, $client->getResponse()->getStatusCode());
        $this->assertCount(1, $crawler->filter('form[action$="/start"]'));
        $this->assertCount(1, $crawler->filter('form[action$="/start"] button'));
    }

    /**
     * @test
     */
    public function shouldStartAGame()
    {
        $startGameHandler = Mockery::spy(StartGameHandler::class);

        $client = static::createClient();
        $container = $client->getKernel()->getContainer();
        $container->set('app.start_game_handler', $startGameHandler);

        $client->request('POST', '/start');

        $this->assertEquals(302, $client->getResponse()->getStatusCode());
        $startGameHandler->shouldHaveReceived('handle')
            ->with(Mockery::type(StartGameCommand::class));
    }
}
