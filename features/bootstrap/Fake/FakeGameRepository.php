<?php

namespace Fake;

class FakeGameRepository
{
    /**
     * @var array
     */
    private $games;

    /**
     * @param array $games
     */
    public function __construct(array $games)
    {
        $this->games = $games;
    }
}
