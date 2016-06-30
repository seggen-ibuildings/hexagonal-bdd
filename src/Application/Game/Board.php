<?php

namespace Application\Game;

class Board
{
    private $numberOfSymbols = 0;

    /**
     * @return int
     */
    public function getNumberOfSymbols()
    {
        return $this->numberOfSymbols;
    }

    /**
     * @return void
     */
    public function mark()
    {
        $this->numberOfSymbols += 1;
    }
}
