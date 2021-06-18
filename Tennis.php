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
        if ($this->firstPlayerScore == 1) {
            return 'Fifteen Love';
        }

        return 'Love All';
    }

    public function givenFirstPlayerScore()
    {
        $this->firstPlayerScore++;
    }
}
