<?php

class Tennis
{
    private $firstPlayerScore = 0;

    /**
     * Tennis constructor.
     */
    public function __construct()
    {
    }

    public function getScore()
    {
        return 'Love All';
    }

    public function givenFirstPlayerScore()
    {
        $this->firstPlayerScore = 1;
    }
}
