<?php

namespace App;

class Tennis
{
    private $firstPlayerScoreTimes  = 0;
    private $secondPlayerScoreTimes = 0;
    private $scoreTable             = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];
    private $firstPlayerName;
    private $seondPlayerName;

    /**
     * Tennis constructor.
     * @param $seondPlayerName
     */
    public function __construct($firstPlayerName, $seondPlayerName)
    {
        $this->firstPlayerName = $firstPlayerName;
        $this->seondPlayerName = $seondPlayerName;
    }

    public function score()
    {
        return $this->isScoreDifferent()
            ? ($this->isNextScoreGamePoint()
                ? $this->advState()
                : $this->lookupScoreTable())
            : ($this->isDeuce()
                ? $this->deuce()
                : $this->isSameScore());
    }

    public function firstPlayerScore()
    {
        $this->firstPlayerScoreTimes++;
    }

    public function secondPlayerScore()
    {
        $this->secondPlayerScoreTimes++;
    }

    /**
     * @return mixed
     */
    private function getAdvPlayerName()
    {
        $advPlayerName = $this->firstPlayerScoreTimes > $this->secondPlayerScoreTimes
            ? $this->firstPlayerName
            : $this->seondPlayerName;

        return $advPlayerName;
    }

    /**
     * @return bool
     */
    private function isAdv(): bool
    {
        return abs($this->firstPlayerScoreTimes - $this->secondPlayerScoreTimes) == 1;
    }

    /**
     * @return bool
     */
    private function isNextScoreGamePoint(): bool
    {
        return $this->firstPlayerScoreTimes > 3 || $this->secondPlayerScoreTimes > 3;
    }

    /**
     * @return bool
     */
    private function isScoreDifferent(): bool
    {
        return $this->firstPlayerScoreTimes !== $this->secondPlayerScoreTimes;
    }

    /**
     * @return string
     */
    private function lookupScoreTable(): string
    {
        return $this->scoreTable[$this->firstPlayerScoreTimes] . ' ' . $this->scoreTable[$this->secondPlayerScoreTimes];
    }

    /**
     * @return string
     */
    private function advState(): string
    {
        if ($this->isAdv()) {
            return $this->getAdvPlayerName() . ' Adv.';
        }

        return $this->getAdvPlayerName() . ' Win.';
    }

    /**
     * @return bool
     */
    private function isDeuce(): bool
    {
        return $this->firstPlayerScoreTimes == 3;
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
    private function isSameScore(): string
    {
        return $this->scoreTable[$this->firstPlayerScoreTimes] . ' All';
    }
}