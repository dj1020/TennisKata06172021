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
        $this->tennis->firstPlayerScore();
        $this->scoreShouldBe('Fifteen Love');
    }

    /**
     * @test
     */
    public function Game_is_Thrity_Love(): void
    {
        $this->tennis->firstPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty Love');
    }

    /**
     * @test
     */
    public function Game_is_Forty_Love(): void
    {
        $this->tennis->firstPlayerScoreTimes(3);
        $this->scoreShouldBe('Forty Love');
    }

    /**
     * @test
     */
    public function Game_is_Love_Fifteen(): void
    {
        $this->tennis->secondPlayerScore();
        $this->scoreShouldBe('Love Fifteen');
    }

    /**
     * @test
     */
    public function Game_is_Love_Thirty(): void
    {
        $this->tennis->secondPlayerScoreTimes(2);
        $this->scoreShouldBe('Love Thirty');
    }

    /**
     * @test
     */
    public function Game_is_Love_Forty(): void
    {
        $this->tennis->secondPlayerScoreTimes(3);
        $this->scoreShouldBe('Love Forty');
    }

    /**
     * @test
     */
    public function Game_is_Fifteen_All(): void
    {
        $this->tennis->firstPlayerScoreTimes(1);
        $this->tennis->secondPlayerScoreTimes(1);
        $this->scoreShouldBe('Fifteen All');
    }

    /**
     * @test
     */
    public function Game_is_Thirty_All(): void
    {
        $this->tennis->firstPlayerScoreTimes(2);
        $this->tennis->secondPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty All');
    }

    /**
     * @test
     */
    public function Game_is_Deuce(): void
    {
        $this->givenDeuce();
        $this->scoreShouldBe('Deuce');
    }

    /**
     * @test
     */
    public function Game_is_FirstPlayer_Adv(): void
    {
        $this->givenDeuce();
        $this->tennis->firstPlayerScore();
        $this->scoreShouldBe('Ken Adv.');
    }

    /**
     * @test
     */
    public function Game_is_SecondPlayer_Adv(): void
    {
        $this->givenDeuce();
        $this->tennis->secondPlayerScore();
        $this->scoreShouldBe('Tom Adv.');
    }

    /**
     * @test
     */
    public function Game_is_FirstPlayer_Adv_again(): void
    {
        $this->givenDeuce();
        $this->tennis->secondPlayerScore();
        $this->tennis->firstPlayerScoreTimes(2);
        $this->scoreShouldBe('Ken Adv.');
    }

    /**
     * @test
     */
    public function Game_is_SecondPlayer_Adv_again(): void
    {
        $this->givenDeuce();
        $this->tennis->secondPlayerScore();
        $this->tennis->firstPlayerScoreTimes(2);
        $this->tennis->secondPlayerScoreTimes(2);
        $this->scoreShouldBe('Tom Adv.');
    }

    /**
     * @test
     */
    public function Game_is_SecondPlayer_Win(): void
    {
        $this->givenDeuce();
        $this->tennis->secondPlayerScoreTimes(2);
        $this->scoreShouldBe('Tom Win.');
    }

    /**
     * @test
     */
    public function Game_is_FirstPlayer_Win(): void
    {
        $this->givenDeuce();
        $this->tennis->firstPlayerScoreTimes(2);
        $this->scoreShouldBe('Ken Win.');
    }

    /**
     * @param string $expected
     */
    private function scoreShouldBe(string $expected): void
    {
        $this->assertEquals($expected, $this->tennis->getScore());
    }

    private function givenDeuce(): void
    {
        $this->tennis->firstPlayerScoreTimes(3);
        $this->tennis->secondPlayerScoreTimes(3);
    }


}
