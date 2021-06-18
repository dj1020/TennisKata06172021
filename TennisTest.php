<?php


use PHPUnit\Framework\TestCase;

class TennisTest extends TestCase
{

    /**
     * @test
     */
    public function Game_is_Love_All(): void
    {
        $expected = 'Love All';
        $tennis = new Tennis();
        $actual = $tennis->getScore();
        $this->assertEquals($expected, $actual);
    }
}
