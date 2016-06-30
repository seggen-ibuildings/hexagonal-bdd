<?php

use Application\Game\GameFactory;
use Application\GetGameHandler;
use Application\GetGameQuery;
use Application\StartGameCommand;
use Application\StartGameHandler;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Fake\FakeGameRepository;
use PHPUnit_Framework_Assert as Assert;
use Ramsey\Uuid\UuidFactory;

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
        $query = new GetGameQuery();
        $query->gameId = self::GAME_ID;

        $handler = new GetGameHandler($this->gameRepository, new UuidFactory());
        $result = $handler->handle($query);

        Assert::assertTrue($result->getBoard()->isEmpty());
    }
}
