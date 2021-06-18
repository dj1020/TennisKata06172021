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
        if ($this->firstPlayerScore == 2) {
            return 'Thirty Love';
        }

        return 'Love All';
    }

    public function givenFirstPlayerScore()
    {
        $this->firstPlayerScore++;
    }
}
