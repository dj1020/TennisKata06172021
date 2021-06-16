<?php

use PHPUnit\Framework\TestCase;

require_once __DIR__ . '/Tennis.php';

class TennisTest extends TestCase
{
    /**
     * @test
     */
    public function it_should_Love_All()
    {
        $tennis = new Tennis();
        $expected = $tennis->getResult();;
        $this->assertEquals($expected, 'Love All');
    }

}
