<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/Tennis.php';

class TennisTest extends TestCase
{
    private $tennis;

    protected function setUp(): void
    {
        $this->tennis = new Tennis('Ken', 'Tom');
    }

    private function scoreShouldBe($result): void
    {
        $expected = $this->tennis->getResult();;
        $this->assertEquals($expected, $result);
    }

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
        $this->tennis->givenFirstPlayerScoreTimes(1);
        $this->scoreShouldBe('Fifteen Love');
    }

    /**
     * @test
     */
    public function game_is_Thrity_Love()
    {
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty Love');
    }

    /**
     * @test
     */
    public function game_is_Forty_Love()
    {
        $this->tennis->givenFirstPlayerScoreTimes(3);
        $this->scoreShouldBe('Forty Love');
    }

    /**
     * @test
     */
    public function game_is_Love_Fifteen()
    {
        $this->tennis->givenSecondPlayerScoreTimes(1);
        $this->scoreShouldBe('Love Fifteen');
    }

    /**
     * @test
     */
    public function game_is_Fifteen_All()
    {
        $this->tennis->givenFirstPlayerScoreTimes(1);
        $this->tennis->givenSecondPlayerScoreTimes(1);
        $this->scoreShouldBe('Fifteen All');
    }

    /**
     * @test
     */
    public function game_is_Thirty_All()
    {
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->tennis->givenSecondPlayerScoreTimes(2);
        $this->scoreShouldBe('Thirty All');
    }

    /**
     * @test
     */
    public function game_is_deuce()
    {
        $this->givenDeuce();
        $this->scoreShouldBe('Deuce');
    }

    /**
     * @test
     */
    public function game_is_Ken_adv()
    {
        $this->givenDeuce();

        $this->tennis->givenFirstPlayerScoreTimes(1);
        $this->scoreShouldBe('Ken adv.');
    }

    /**
     * @test
     */
    public function game_is_Tom_adv()
    {
        $this->givenDeuce();
        $this->tennis->givenSecondPlayerScoreTimes(1);
        $this->scoreShouldBe('Tom adv.');
    }

    /**
     * @test
     */
    public function game_is_Ken_Win()
    {
        $this->givenDeuce();
        $this->tennis->givenFirstPlayerScoreTimes(2);
        $this->scoreShouldBe('Ken Win.');
    }


    private function givenDeuce(): void
    {
        $this->tennis->givenFirstPlayerScoreTimes(3);
        $this->tennis->givenSecondPlayerScoreTimes(3);
    }
}


