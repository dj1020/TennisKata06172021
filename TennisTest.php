<?php


use PHPUnit\Framework\TestCase;

require __DIR__ . '/Tennis.php';
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
