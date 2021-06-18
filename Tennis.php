<?php

class Tennis
{
    private $firstPlayerScore  = 0;
    private $secondPlayerScore = 0;

    private $firstPlayerName;
    private $secondPlayerName;

    private $scoreTable;

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
        $this->scoreTable = [
            0 => 'Love',
            1 => 'Fifteen',
            2 => 'Thirty',
            3 => 'Forty',
        ];

        return $this->isScoreDifferent()
            ? ($this->isAdv()
                ? ($this->isAdvPlayerWin()
                    ? $this->getAdvPlayer() . ' Win.'
                    : $this->getAdvPlayer() . ' Adv.')
                : $this->lookupScore())
            : ($this->isDeuce()
                ? $this->deuce()
                : $this->sameScore());

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

    /**
     * @return bool
     */
    private function isAdvPlayerWin(): bool
    {
        return abs($this->firstPlayerScore - $this->secondPlayerScore) > 1;
    }

    /**
     * @return string
     */
    private function getAdvPlayer(): string
    {
        $advPlayer = $this->secondPlayerScore > $this->firstPlayerScore
            ? $this->secondPlayerName
            : $this->firstPlayerName;

        return $advPlayer;
    }

    /**
     * @return bool
     */
    private function isAdv(): bool
    {
        return $this->secondPlayerScore > 3 || $this->firstPlayerScore > 3;
    }

    /**
     * @return bool
     */
    private function isScoreDifferent(): bool
    {
        return $this->firstPlayerScore != $this->secondPlayerScore;
    }

    /**
     * @return string
     */
    private function lookupScore(): string
    {
        return $this->scoreTable[$this->firstPlayerScore] . ' ' . $this->scoreTable[$this->secondPlayerScore];
    }

    /**
     * @return bool
     */
    private function isDeuce(): bool
    {
        return $this->firstPlayerScore == 3;
    }

    /**
     * @return string
     */
    private function deuce(): string
    {
        return 'Deuce';
    }

    /**
     * @return string
     */
    private function sameScore(): string
    {
        return $this->scoreTable[$this->firstPlayerScore] . ' All';
    }
}
