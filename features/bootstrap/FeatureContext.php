<?php

use Application\Game\Game;
use Application\Game\GameFactory;
use Application\GetGameHandler;
use Application\GetGameQuery;
use Application\MakeMoveCommand;
use Application\MakeMoveHandler;
use Application\StartGameCommand;
use Application\StartGameHandler;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Fake\FakeGameRepository;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\UuidFactory;
use PHPUnit_Framework_Assert as Assert;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    const GAME_ID = '123e4567-e89b-12d3-a456-426655440000';

    /**
     * @var FakeGameRepository
     */
    private $gameRepository;

    /**
     * @Given I have not started a game yet
     */
    public function iHaveNotStartedAGameYet()
    {
        $this->gameRepository = new FakeGameRepository([]);
    }

    /**
     * @When I start a game as player :playerName
     */
    public function iStartAGameAsPlayer($playerName)
    {
        $command = new StartGameCommand();
        $command->gameId = self::GAME_ID;
        $command->playerName = $playerName;

        $handler = new StartGameHandler(new UuidFactory(), new GameFactory(), $this->gameRepository);
        $handler->handle($command);
    }

    /**
     * @Then I should see an empty board
     */
    public function iShouldSeeAnEmptyBoard()
    {
        $result = $this->getGame();

        Assert::assertEquals(0, $result->getBoard()->getNumberOfSymbols());
    }

    /**
     * @Given I have started a game as player :playerName
     */
    public function iHaveStartedAGameAsPlayer($playerName)
    {
        $gameFactory = new GameFactory();

        $this->gameRepository = new FakeGameRepository([
            $gameFactory->create(Uuid::fromString(self::GAME_ID))
        ]);
    }

    /**
     * @When I make a move
     */
    public function iMakeAMove()
    {
        $command = new MakeMoveCommand();
        $command->gameId = self::GAME_ID;
        $command->row = 1;
        $command->column = 2;

        $handler = new MakeMoveHandler(new UuidFactory(), $this->gameRepository);
        $handler->handle($command);
    }

    /**
     * @Then I should see a board with one symbol on it
     */
    public function iShouldSeeABoardWithOneSymbolOnIt()
    {
        $result = $this->getGame();

        Assert::assertEquals(1, $result->getBoard()->getNumberOfSymbols());
    }

    /**
     * @return Game
     */
    private function getGame()
    {
        $query = new GetGameQuery();
        $query->gameId = self::GAME_ID;

        $handler = new GetGameHandler($this->gameRepository, new UuidFactory());
        $result = $handler->handle($query);

        return $result;
    }
}
