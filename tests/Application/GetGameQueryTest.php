<?php

namespace Tests\Application;

use Application\GetGameQuery;

class GetGameQueryTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function shouldHaveAGameId()
    {
        $query = new GetGameQuery();

        $this->assertObjectHasAttribute('gameId', $query);
    }
}
