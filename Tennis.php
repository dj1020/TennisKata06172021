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
        $scoreTable = [
            1 => 'Fifteen',
            2 => 'Thirty',
        ];

        if ($this->firstPlayerScore > 0) {
            return $scoreTable[$this->firstPlayerScore] . ' Love';
        }

        return 'Love All';
    }

    public function givenFirstPlayerScore()
    {
        $this->firstPlayerScore++;
    }

    public function givenFirstPlayerScoreTimes(int $times)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->givenFirstPlayerScore();
        }
    }
}
