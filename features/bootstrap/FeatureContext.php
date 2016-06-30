<?php

use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Gherkin\Node\PyStringNode;
use Behat\Gherkin\Node\TableNode;

/**
 * Defines application features from the specific context.
 */
class FeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @Given I have not started a game yet
     */
    public function iHaveNotStartedAGameYet()
    {
        throw new PendingException();
    }

    /**
     * @When I start a game as player :arg1
     */
    public function iStartAGameAsPlayer($arg1)
    {
        throw new PendingException();
    }

    /**
     * @Then I should see an empty board
     */
    public function iShouldSeeAnEmptyBoard()
    {
        throw new PendingException();
    }
}
