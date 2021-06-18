<?php

class Tennis
{
    private $firstPlayerScore  = 0;
    private $secondPlayerScore = 0;
    /**
     * @var string
     */
    private $firstPlayerName;
    /**
     * @var string
     */
    private $secondPlayerName;

    /**
     * Tennis constructor.
     * @param string $firstPlayerName
     * @param string $secondPlayerName
     */
    public function __construct(string $firstPlayerName, string $secondPlayerName)
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
            if ($this->secondPlayerScore > 3 || $this->firstPlayerScore > 3) {
                $advPlayer = $this->secondPlayerScore > $this->firstPlayerScore
                    ? $this->secondPlayerName
                    : $this->firstPlayerName;

                if (abs($this->firstPlayerScore - $this->secondPlayerScore) > 1) {
                    return $advPlayer . ' Win.';
                }

                return $advPlayer . ' Adv.';
            }

            return $scoreTable[$this->firstPlayerScore] . ' ' . $scoreTable[$this->secondPlayerScore];
        }

        if ($this->firstPlayerScore == 3) {
            return 'Deuce';
        }


        return $scoreTable[$this->firstPlayerScore] . ' All';
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
