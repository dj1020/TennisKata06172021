<?php


use PHPUnit\Framework\TestCase;

require __DIR__ . '/Tennis.php';

class TennisTest extends TestCase
{
    private $tennis;

    protected function setUp(): void
    {
        $this->tennis = new Tennis();
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


    private function scoreShouldBe($expected): void
    {
        $this->assertEquals($expected, $this->tennis->getScore());
    }
}
