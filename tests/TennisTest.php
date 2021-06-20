<?php

namespace Tests;

use App\Tennis;
use PHPUnit\Framework\TestCase;

class TennisTest extends TestCase
{
    private $tennis;

    /**
     * @test
     */
    public function game_is_Love_All()
    {
        $this->scoreShouldBe('Love All');
    }

    /**
     * @test
     */
    public function game_is_Fifteen_Love()
    {
        $this->tennis->givenFirstPlyaerScore();
        $this->scoreShouldBe('Fifteen Love');
    }

    /**
     * @test
     */
    public function game_is_Thirty_Love()
    {
        $this->tennis->givenFirstPlyaerScoreTimes(2);
        $this->scoreShouldBe('Thirty Love');
    }

    /**
     * @test
     */
    public function game_is_Forty_Love()
    {
        $this->tennis->givenFirstPlyaerScoreTimes(3);
        $this->scoreShouldBe('Forty Love');
    }

    /**
     * @test
     */
    public function game_is_Love_Fifteen()
    {
        $this->tennis->givenSecondPlayerScore();
        $this->scoreShouldBe('Love Fifteen');
    }

    /**
     * @test
     */
    public function game_is_Love_Thirty()
    {
        $this->tennis->givenSecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Love Thirty');
    }

    /**
     * @test
     */
    public function game_is_Love_Forty()
    {
        $this->tennis->givenSecondPlayerScoreTimes(3);
        $this->scoreShouldBe('Love Forty');
    }

    /**
     * @test
     */
    public function game_is_Fifteen_All()
    {
        $this->tennis->givenFirstPlyaerScoreTimes(1);
        $this->tennis->givenSecondPlayerScoreTimes(1);
        $this->scoreShouldBe('Fifteen All');
    }

    /**
     * @test
     */
    public function game_is_Thirty_All()
    {
        $this->tennis->givenFirstPlyaerScoreTimes(2);
        $this->tennis->givenSecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty All');
    }

    /**
     * @test
     */
    public function game_is_Deuce()
    {
        $this->givenDeuce();
        $this->scoreShouldBe('Deuce');
    }

    /**
     * @test
     */
    public function game_is_FirstPlayer_adv()
    {
        $this->givenDeuce();
        $this->tennis->givenFirstPlyaerScore();
        $this->scoreShouldBe('Ken adv.');
    }

    /**
     * @test
     */
    public function game_is_SecondPlayer_adv()
    {
        $this->givenDeuce();
        $this->tennis->givenSecondPlayerScore();
        $this->scoreShouldBe('Tom adv.');
    }

    /**
     * @test
     */
    public function game_is_SecondPlayer_win()
    {
        $this->givenDeuce();
        $this->tennis->givenSecondPlayerScore();
        $this->tennis->givenSecondPlayerScore();
        $this->scoreShouldBe('Tom win.');
    }

    protected function setUp(): void
    {
        $this->tennis = new Tennis('Ken', 'Tom');
    }

    private function scoreShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->tennis->getScore());
    }

    private function givenDeuce(): void
    {
        $this->tennis->givenFirstPlyaerScoreTimes(3);
        $this->tennis->givenSecondPlayerScoreTimes(3);
    }

}
