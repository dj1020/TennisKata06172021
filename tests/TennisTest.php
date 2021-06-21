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
    public function Love_All()
    {
        $this->scoreShouldBe('Love All');
    }

    /**
     * @test
     */
    public function Fifteen_Love()
    {
        $this->tennis->firstPlayerGetScore();
        $this->scoreShouldBe('Fifteen Love');
    }

    /**
     * @test
     */
    public function Thirty_Love()
    {
        $this->givenFirstPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty Love');
    }

    /**
     * @test
     */
    public function Forty_Love()
    {
        $this->givenFirstPlayerScoreTimes(3);
        $this->scoreShouldBe('Forty Love');
    }

    /**
     * @test
     */
    public function Love_Fifteen()
    {
        $this->tennis->secondPlayerGetScore();
        $this->scoreShouldBe('Love Fifteen');
    }

    /**
     * @test
     */
    public function Love_Thirty()
    {
        $this->givenSecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Love Thirty');
    }

    /**
     * @test
     */
    public function Love_Forty()
    {
        $this->givenSecondPlayerScoreTimes(3);
        $this->scoreShouldBe('Love Forty');
    }

    /**
     * @test
     */
    public function Fifteen_All()
    {
        $this->givenFirstPlayerScoreTimes(1);
        $this->givenSecondPlayerScoreTimes(1);
        $this->scoreShouldBe('Fifteen All');
    }

    /**
     * @test
     */
    public function Thirty_All()
    {
        $this->givenFirstPlayerScoreTimes(2);
        $this->givenSecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty All');
    }

    /**
     * @test
     */
    public function Deuce()
    {
        $this->givenDeuce();
        $this->scoreShouldBe('Deuce');
    }

    /**
     * @test
     */
    public function FirstPlayer_Adv()
    {
        $this->givenDeuce();
        $this->givenFirstPlayerScoreTimes(1);
        $this->scoreShouldBe('Ken Adv');
    }

    /**
     * @test
     */
    public function SecondPlayer_Adv()
    {
        $this->givenDeuce();
        $this->givenSecondPlayerScoreTimes(1);
        $this->scoreShouldBe('Tom Adv');
    }

    /**
     * @test
     */
    public function SecondPlayer_Win()
    {
        $this->givenDeuce();
        $this->givenSecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Tom Win');
    }

    protected function setUp(): void
    {
        $this->tennis = new Tennis('Ken', 'Tom');
    }

    private function scoreShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->tennis->getScore());
    }

    private function givenFirstPlayerScoreTimes($times): void
    {
        for ($i = 0; $i < $times; $i++) {
            $this->tennis->firstPlayerGetScore();
        }
    }

    private function givenSecondPlayerScoreTimes($times): void
    {
        for ($i = 0; $i < $times; $i++) {

            $this->tennis->secondPlayerGetScore();
        }
    }

    private function givenDeuce(): void
    {
        $this->givenFirstPlayerScoreTimes(3);
        $this->givenSecondPlayerScoreTimes(3);
    }

}
