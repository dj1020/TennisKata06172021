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
            ? ($this->isNextScoreGamePoint()
                ? ($this->isGamePoint()
                    ? $this->advPlayer() . ' Adv.'
                    : $this->advPlayer() . ' Win.')
                : $this->lookupScore())
            : ($this->isDeuce()
                ? $this->deuce()
                : $this->sameScore());

    }

    public function firstPlayerScore()
    {
        $this->firstPlayerScore++;
    }

    public function firstPlayerScoreTimes(int $times)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->firstPlayerScore();
        }
    }

    public function secondPlayerScore()
    {
        $this->secondPlayerScore++;
    }

    public function secondPlayerScoreTimes(int $times)
    {
        for ($i = 0; $i < $times; $i++) {
            $this->secondPlayerScore();
        }
    }

    /**
     * @return string
     */
    private function advPlayer(): string
    {
        $advPlayerName = $this->secondPlayerScore > $this->firstPlayerScore
            ? $this->secondPlayerName
            : $this->firstPlayerName;

        return $advPlayerName;
    }

    /**
     * @return bool
     */
    private function isGamePoint(): bool
    {
        return abs($this->firstPlayerScore - $this->secondPlayerScore) == 1;
    }

    /**
     * @return bool
     */
    private function isNextScoreGamePoint(): bool
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
        return $this->firstPlayerScore >= 3;
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
