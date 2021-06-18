<?php

class Tennis
{
    private $firstPlayerScore  = 0;
    private $secondPlayerScore = 0;

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
            3 => 'Forty',
        ];

        if ($this->firstPlayerScore > 0) {
            return $scoreTable[$this->firstPlayerScore] . ' Love';
        }

        if ($this->secondPlayerScore > 0) {
            return 'Love ' . $scoreTable[$this->secondPlayerScore];
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

    public function givenSecondPlayerScore()
    {
        $this->secondPlayerScore++;
    }

    public function givenSecondPlayerScoreTimes(int $times)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->givenSecondPlayerScore();
        }
    }
}
