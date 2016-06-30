<?php

namespace Application\Game;

class Move
{
    /**
     * @var int
     */
    private $row;

    /**
     * @var int
     */
    private $column;

    /**
     * @param int $row
     * @param int $column
     */
    public function __construct($row, $column)
    {
        $this->row = $row;
        $this->column = $column;
    }

    /**
     * @return int
     */
    public function getRow()
    {
        return $this->row;
    }

    /**
     * @return int
     */
    public function getColumn()
    {
        return $this->column;
    }
}
