<?php

namespace App;

class Tennis
{

    private $firstPlayerScoreTimes  = 0;
    private $scoreTable             = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];
    private $secondPlayerScoreTimes = 0;
    private $firstPlayerName;
    private $secondPlayerName;

    /**
     * Tennis constructor.
     * @param $secondPlayerName
     */
    public function __construct($firstPlayerName, $secondPlayerName)
    {
        $this->firstPlayerName = $firstPlayerName;
        $this->secondPlayerName = $secondPlayerName;
    }

    public function score()
    {
        return $this->isScoreDifferent()
            ? ($this->isNextScoreGamePoint() ? $this->advState() : $this->lookupScore())
            : ($this->isDeuce() ? $this->deuce() : $this->sameScore());

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
    private function advPlayerName()
    {
        $advPlayerName = $this->firstPlayerScoreTimes > $this->secondPlayerScoreTimes
            ? $this->firstPlayerName
            : $this->secondPlayerName;

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
     * @return string
     */
    private function advState(): string
    {
        return $this->isAdv() ? $this->advPlayerName() . ' Adv.' : $this->advPlayerName() . ' Win.';
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
    private function lookupScore(): string
    {
        return $this->scoreTable[$this->firstPlayerScoreTimes] . ' ' . $this->scoreTable[$this->secondPlayerScoreTimes];
    }

    /**
     * @return bool
     */
    private function isDeuce(): bool
    {
        return $this->firstPlayerScoreTimes >= 3;
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
        return $this->scoreTable[$this->firstPlayerScoreTimes] . ' All';
    }
}