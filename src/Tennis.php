<?php

namespace App;

class Tennis
{

    private $firstPlayerScore  = 0;
    private $secondPlayerScore = 0;
    private $firstPlayerName;
    private $secondPlayerName;
    private $scoreTable;

    /**
     * Tennis constructor.
     * @param $firstPlayerName
     * @param $secondPlayerName
     */
    public function __construct($firstPlayerName, $secondPlayerName)
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
            ? ($this->isNextPointGamePoint()
                ? ($this->isAdv()
                    ? $this->advPlayerName() . ' Adv.'
                    : $this->advPlayerName() . ' Win.')
                : $this->lookupScore())
            : ($this->isDeuce()
                ? $this->deuce()
                : $this->sameScore());

    }

    public function firstPlayerGetScore()
    {
        $this->firstPlayerScore++;
    }

    public function secondPlayerGetScore()
    {
        $this->secondPlayerScore++;
    }

    /**
     * @return mixed
     */
    private function advPlayerName()
    {
        $advPlayerName = $this->firstPlayerScore > $this->secondPlayerScore
            ? $this->firstPlayerName
            : $this->secondPlayerName;

        return $advPlayerName;
    }

    /**
     * @return bool
     */
    private function isAdv(): bool
    {
        return abs($this->firstPlayerScore - $this->secondPlayerScore) == 1;
    }

    /**
     * @return bool
     */
    private function isNextPointGamePoint(): bool
    {
        return $this->firstPlayerScore > 3 || $this->secondPlayerScore > 3;
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
