<?php

use PHPUnit\Framework\TestCase;
use App\Game;

class GameTest extends TestCase
{
    /**
     * Testing no win results
     *
     * @return void
     */
    public function testLose()
    {
        $board = ['J', 'J', '9', 'Q', 'K', 'Cat', 'J', 'Q', 'Monkey', 'Bird', 'Bird', 'Bird', 'K', 'Q', 'A'];
        $game = new Game($board);
        $game = $game->result();
        $this->assertTrue($game['paylines'] == null);
        $this->assertTrue($game['total_win'] == 0);
    }

    /**
     * Testing a win  on three symbols
     *
     * @return void
     */
    public function testThreeSymbolsWin()
    {
        $board = ['cat', '9', 'Q', 'bird', 'cat', 'Q', 'K', '10', 'Q', 'K', 'K', 'K', 'bird', 'Q', 'K'];
        //'paylines':{'2 5 8 11 14':3}
        $game = new Game($board);
        $game = $game->result();
        $this->assertTrue($game['total_win'] == 20);
    }

    /**
     * Testing a win based on three symbols
     *
     * @return void
     */
    public function testFourSymbolsWin()
    {
        $board = ['K', 'bird', 'dog', 'bird', 'dog', 'cat', 'dog', 'Q', 'K', '10', 'dog', 'Q', 'bird', 'J', 'monkey'];
        //'paylines':[{'2 4 6 10 14':4}],
        $game = new Game($board);
        $game = $game->result();
        $this->assertTrue($game['total_win'] == 200);
    }

    /**
     * Testing a win  on three symbols
     *
     * @return void
     */
    public function testFiveSymbolsWin()
    {
        $board = ['10', 'cat', 'cat', 'J', 'cat', '10', 'Q', 'cat', 'A', 'J', 'cat', 'bird', 'J', 'cat', 'A'];
        //"paylines":[{"1 4 7 10 13":5}],
        $game = new Game($board);
        $game = $game->result();
        $this->assertTrue($game['total_win'] == 1000);
    }

    /**
     * Testing a win  on three symbols on two different paylines
     *
     * @return void
     */
    public function testTwoPaylineOfThreeSymbolsWinn()
    {
        $board = ['Q', 'Q', 'monkey', 'monkey', 'Q', '10', 'monkey', 'Q', 'Q', 'J', '10', 'A', '10', 'Q', 'bird'];
        //'paylines':[{'1 4 7 10 13':3},{'0 4 8 10 12':3}],
        $game = new Game($board);
        $game = $game->result();
        $this->assertTrue($game['total_win'] == 40);
    }

    /**
     * Testing a win on four symbols on two different paylines
     *
     * @return void
     */
    public function testTwoPayLineFourSymbolsWin()
    {
        $board = ['J', 'cat', 'J', 'J', 'cat', '10', 'J', 'cat', 'A', 'J', 'cat', 'bird', 'A', 'Q', 'A'];
        //"paylines":[{"0 3 6 9 12":4},{"1 4 7 10 13":4}]
        $game = new Game($board);
        $game = $game->result();
        $this->assertTrue($game['total_win'] == 400);
    }

    /**
     * Testing a win  on five symbols on two different paylines
     *
     * @return void
     */
    public function testTwoPayLineFiveSymbolsWin()
    {
        $board = ['J', 'cat', 'J', 'J', 'cat', '10', 'J', 'cat', 'A', 'J', 'cat', 'bird', 'J', 'cat', 'A'];
        //"paylines":[{"0 3 6 9 12":5},{"1 4 7 10 13":5}],
        $game = new Game($board);
        $game = $game->result();
        $this->assertTrue($game['total_win'] == 2000);
    }
}
