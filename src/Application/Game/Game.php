<?php

namespace Application\Game;

use Ramsey\Uuid\UuidInterface;

class Game
{
    /**
     * @var UuidInterface
     */
    private $id;

    /**
     * @var Board
     */
    private $board;

    /**
     * @param UuidInterface $id
     * @param Board $board
     */
    public function __construct(UuidInterface $id, Board $board)
    {
        $this->id = $id;
        $this->board = $board;
    }

    /**
     * @return UuidInterface
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return Board
     */
    public function getBoard()
    {
        return $this->board;
    }

    /**
     * @param Move $move
     */
    public function makeMove(Move $move)
    {
        $this->board->mark();
    }
}
