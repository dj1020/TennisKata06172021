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
        $this->tennis->firstPlayerScore();
        $this->scoreShouldBe('Fifteen Love');
    }

    /**
     * @test
     */
    public function Thirty_Love()
    {
        $this->firstPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty Love');
    }

    /**
     * @test
     */
    public function Forty_Love()
    {
        $this->firstPlayerScoreTimes(3);
        $this->scoreShouldBe('Forty Love');
    }

    /**
     * @test
     */
    public function Love_Fifteen()
    {
        $this->tennis->secondPlayerScore();
        $this->scoreShouldBe('Love Fifteen');
    }

    /**
     * @test
     */
    public function Love_Thirty()
    {
        $this->secondPlayerScoreTimes(2);
        $this->scoreShouldBe('Love Thirty');
    }

    /**
     * @test
     */
    public function Fifteen_All()
    {
        $this->firstPlayerScoreTimes(1);
        $this->secondPlayerScoreTimes(1);
        $this->scoreShouldBe('Fifteen All');
    }

    /**
     * @test
     */
    public function Thirty_All()
    {
        $this->firstPlayerScoreTimes(2);
        $this->secondPlayerScoreTimes(2);
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
        $this->firstPlayerScoreTimes(1);
        $this->scoreShouldBe('Ken Adv.');
    }

    /**
     * @test
     */
    public function SecondPlayer_Adv()
    {
        $this->givenDeuce();
        $this->SecondPlayerScoreTimes(1);
        $this->scoreShouldBe('Tom Adv.');
    }

    /**
     * @test
     */
    public function SecondPlayer_Win()
    {
        $this->givenDeuce();
        $this->SecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Tom Win.');
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->tennis = new Tennis('Ken', 'Tom');
    }

    private function scoreShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->tennis->score());
    }

    private function firstPlayerScoreTimes($times): void
    {
        for ($i = 0; $i < $times; $i++) {
            $this->tennis->firstPlayerScore();
        }
    }

    private function secondPlayerScoreTimes($times): void
    {
        for ($i = 0; $i < $times; $i++) {
            $this->tennis->secondPlayerScore();
        }
    }

    private function givenDeuce(): void
    {
        $this->firstPlayerScoreTimes(3);
        $this->secondPlayerScoreTimes(3);
    }
}
