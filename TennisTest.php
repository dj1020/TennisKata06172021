<?php


use PHPUnit\Framework\TestCase;

require __DIR__ . '/Tennis.php';

class TennisTest extends TestCase
{
    private $tennis;

    protected function setUp(): void
    {
        $this->tennis = new Tennis('Ken', 'Tom');

    }

    /**
     * @test
     */
    public function Game_is_Love_All(): void
    {
        $this->scoreShouldBe('Love All');
    }

    /**
     * @test
     */
    public function Game_is_Fifteen_Love(): void
    {
        $this->tennis->givenFirstPlayerScore();
        $this->scoreShouldBe('Fifteen Love');
    }

    /**
     * @test
     */
    public function Game_is_Thirty_Love(): void
    {
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty Love');
    }

    /**
     * @test
     */
    public function Game_is_Forty_Love(): void
    {
        $this->tennis->givenFirstPlayerScoreTimes(3);
        $this->scoreShouldBe('Forty Love');
    }

    /**
     * @test
     */
    public function Game_is_Love_Fifteen(): void
    {
        $this->tennis->givenSecondPlayerScore();
        $this->scoreShouldBe('Love Fifteen');
    }

    /**
     * @test
     */
    public function Game_is_Love_Thirty(): void
    {
        $this->tennis->givenSecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Love Thirty');
    }

    /**
     * @test
     */
    public function Game_is_Love_Forty(): void
    {
        $this->tennis->givenSecondPlayerScoreTimes(3);
        $this->scoreShouldBe('Love Forty');
    }

    /**
     * @test
     */
    public function game_is_Fifteen_All(): void
    {
        $this->tennis->givenfirstplayerscore();
        $this->tennis->givensecondplayerscore();
        $this->scoreshouldbe('Fifteen All');
    }

    /**
     * @test
     */
    public function game_is_Thirty_All(): void
    {
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->tennis->givenSecondPlayerScoreTimes(2);
        $this->scoreshouldbe('Thirty All');
    }

    /**
     * @test
     */
    public function game_is_Deuce(): void
    {
        $this->givenDeuce();
        $this->scoreshouldbe('Deuce');
    }

    /**
     * @test
     */
    public function game_is_FirstPlayer_Adv(): void
    {
        $this->givenDeuce();
        $this->tennis->givenFirstPlayerScore();
        $this->scoreshouldbe('Ken Adv.');
    }

    /**
     * @test
     */
    public function game_is_SecondPlayer_Adv(): void
    {
        $this->givenDeuce();
        $this->tennis->givenSecondPlayerScore();
        $this->scoreshouldbe('Tom Adv.');
    }

    /**
     * @test
     */
    public function game_is_FirstPlayer_Adv_again(): void
    {
        $this->givenDeuce();
        $this->tennis->givenSecondPlayerScore();
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->scoreshouldbe('Ken Adv.');
    }

    /**
     * @test
     */
    public function game_is_SecondPlayer_Adv_again(): void
    {
        $this->givenDeuce();
        $this->tennis->givenSecondPlayerScore();
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->tennis->givenSecondPlayerScoreTimes(2);
        $this->scoreshouldbe('Tom Adv.');
    }

    /**
     * @test
     */
    public function game_is_FirstPlayer_Win(): void
    {
        $this->givenDeuce();
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->scoreshouldbe('Ken Win.');
    }

    /**
     * @test
     */
    public function game_is_SecondPlayer_Win(): void
    {
        $this->givenDeuce();
        $this->tennis->givenSecondPlayerScoreTimes(2);
        $this->scoreshouldbe('Tom Win.');
    }


    private function scoreShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->tennis->getScore());
    }

    private function givenDeuce(): void
    {
        $this->tennis->givenFirstPlayerScoreTimes(3);
        $this->tennis->givenSecondPlayerScoreTimes(3);
    }


}
