<?php

class Tennis
{
    private $firstPlayerScore  = 0;
    private $secondPlayerScore = 0;
    private $firstPlayerName;
    private $secondPlayerName;

    /**
     * Tennis constructor.
     */
    public function __construct($firstPlayerName, $secondPlayerName)
    {
        $this->firstPlayerName = $firstPlayerName;
        $this->secondPlayerName = $secondPlayerName;
    }

    public function getScore()
    {
        $scoreTable = [
            0 => 'Love',
            1 => 'Fifteen',
            2 => 'Thirty',
            3 => 'Forty',
        ];

        if ($this->firstPlayerScore != $this->secondPlayerScore) {
            if ($this->firstPlayerScore > 3 || $this->secondPlayerScore > 3) {
                if ($this->firstPlayerScore - $this->secondPlayerScore == 1) {
                    return $this->firstPlayerName . ' Adv.';
                }

            }
            if ($this->secondPlayerScore == 4) {
                return $this->secondPlayerName . ' Adv.';
            }

            return $scoreTable[$this->firstPlayerScore] . ' ' . $scoreTable[$this->secondPlayerScore];
        }

        if ($this->firstPlayerScore >= 3) {
            return 'Deuce';
        }

        return $scoreTable[$this->firstPlayerScore] . ' All';
    }

    public function firstPlayerScore()
    {
        $this->firstPlayerScore++;
    }

    public function firstPlayerScoreTimes(int $count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->firstPlayerScore();
        }
    }

    public function secondPlayerScore()
    {
        $this->secondPlayerScore++;
    }

    public function secondPlayerScoreTimes(int $count)
    {
        for ($i = 0; $i < $count; $i++) {
            $this->secondPlayerScore();
        }
    }
}
