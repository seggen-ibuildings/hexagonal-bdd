<?php

use Behat\Behat\Hook\Scope\BeforeScenarioScope;
use Behat\Behat\Tester\Exception\PendingException;
use Behat\Behat\Context\Context;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\MinkExtension\Context\MinkContext;

class WebFeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * @var MinkContext
     */
    private $minkContext;

    /**
     * @BeforeScenario
     */
    public function loadMinkExtension(BeforeScenarioScope $scope)
    {
        $environment = $scope->getEnvironment();

        $this->minkContext = $environment->getContext(MinkContext::class);
    }

    /**
     * @Given I have not started a game yet
     */
    public function iHaveNotStartedAGameYet()
    {
        // nothing to do
    }

    /**
     * @When I start a game as player :arg1
     */
    public function iStartAGameAsPlayer($arg1)
    {
        $this->minkContext->visit('/');
        $this->minkContext->pressButton('');
    }

    /**
     * @Then I should see an empty board
     */
    public function iShouldSeeAnEmptyBoard()
    {
        throw new PendingException();
    }
}
