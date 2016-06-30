<?php

namespace Tests\AppBundle\Repository;

use Application\Game\Board;
use Application\Game\Game;
use Application\Game\GameFactory;
use Ramsey\Uuid\Uuid;
use Symfony\Bundle\FrameworkBundle\Console\Application;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;
use Symfony\Component\Console\Input\StringInput;
use Symfony\Component\Console\Output\BufferedOutput;

class DoctrineGameRepositoryTest extends KernelTestCase
{
    public function setUp()
    {
        static::bootKernel();

        $application = new Application(static::$kernel);
        $application->setAutoExit(false);

        $input = new StringInput('doctrine:schema:create');
        $output = new BufferedOutput();
        $exitCode = $application->run($input, $output);

        $this->assertEquals(0, $exitCode, $output->fetch());
    }

    /**
     * @test
     */
    public function shouldGetGames()
    {
        $container = static::$kernel->getContainer();
        $repository = $container->get('app.game.game_repository');

        $gameId = Uuid::uuid4();
        $this->createGame($gameId);

        $game = $repository->get($gameId);

        $this->assertInstanceOf(Game::class, $game);
        $this->assertInstanceOf(Uuid::class, $game->getId());
        $this->assertInstanceOf(Board::class, $game->getBoard());
    }

    /**
     * @param $gameId
     */
    private function createGame($gameId)
    {
        $container = static::$kernel->getContainer();
        $entityManager = $container->get('doctrine.orm.default_entity_manager');

        $gameFactory = new GameFactory();
        $game = $gameFactory->create($gameId);

        $entityManager->persist($game);
        $entityManager->flush();
        $entityManager->clear();
    }
}
