<?php


use PHPUnit\Framework\TestCase;

require __DIR__ . '/Tennis.php';

class TennisTest extends TestCase
{
    private $tennis;

    /**
     * @test
     */
    public function Game_is_Love_All()
    {
        $this->scoreShouldBe('Love All');
    }

    /**
     * @test
     */
    public function Game_is_Fifteen_Love()
    {
        $this->tennis->firstPlayerScore();
        $this->scoreShouldBe('Fifteen Love');
    }

    /**
     * @test
     */
    public function Game_is_Thirty_Love()
    {
        $this->tennis->firstPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty Love');
    }

    /**
     * @test
     */
    public function Game_is_Forty_Love()
    {
        $this->tennis->firstPlayerScoreTimes(3);
        $this->scoreShouldBe('Forty Love');
    }

    /**
     * @test
     */
    public function Game_is_Love_Fifteen()
    {
        $this->tennis->secondPlayerScore();
        $this->scoreShouldBe('Love Fifteen');
    }

    /**
     * @test
     */
    public function Game_is_Love_Thirty()
    {
        $this->tennis->secondPlayerScoreTimes(2);
        $this->scoreShouldBe('Love Thirty');
    }

    /**
     * @test
     */
    public function Game_is_Love_Forty()
    {
        $this->tennis->secondPlayerScoreTimes(3);
        $this->scoreShouldBe('Love Forty');
    }

    /**
     * @test
     */
    public function Game_is_Fifteen_All()
    {
        $this->tennis->firstPlayerScoreTimes(1);
        $this->tennis->secondPlayerScoreTimes(1);
        $this->scoreShouldBe('Fifteen All');
    }

    /**
     * @test
     */
    public function Game_is_Thrity_All()
    {
        $this->tennis->firstPlayerScoreTimes(2);
        $this->tennis->secondPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty All');
    }

    /**
     * @test
     */
    public function Game_is_Deuce()
    {
        $this->givenDeuce();
        $this->scoreShouldBe('Deuce');
    }

    /**
     * @test
     */
    public function Game_is_FirstPlayer_Adv()
    {
        $this->givenDeuce();
        $this->tennis->firstPlayerScore();
        $this->scoreShouldBe('Ken Adv.');
    }

    /**
     * @test
     */
    public function Game_is_SecondPlayer_Adv()
    {
        $this->givenDeuce();
        $this->tennis->secondPlayerScore();
        $this->scoreShouldBe('Tom Adv.');
    }


    protected function setUp(): void
    {
        $this->tennis = new Tennis('Ken', 'Tom');
    }

    private function scoreShouldBe($excepted): void
    {
        $this->assertEquals($excepted, $this->tennis->getScore());
    }

    private function givenDeuce(): void
    {
        $this->tennis->firstPlayerScoreTimes(3);
        $this->tennis->secondPlayerScoreTimes(3);
    }

}
