<?php

use Application\StartGameCommand;
use Application\StartGameHandler;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;
use Fake\FakeGameRepository;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    const GAME_ID = '1234';

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

        $handler = new StartGameHandler();
        $handler->handle($command);
    }

    /**
     * @Then I should see an empty board
     */
    public function iShouldSeeAnEmptyBoard()
    {
        throw new PendingException();
    }
}
