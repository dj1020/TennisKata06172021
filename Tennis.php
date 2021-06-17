<?php

class Tennis
{
    private $firstPlayerScore  = 0;
    private $secondPlayerScore = 0;
    private $firstPlayerName;
    private $secondPlayerName;
    private $scoreText         = [
        0 => 'Love',
        1 => 'Fifteen',
        2 => 'Thirty',
        3 => 'Forty',
    ];

    /**
     * Tennis constructor.
     */
    public function __construct($firstPlayerName, $secondPlayerName)
    {
        $this->firstPlayerName = $firstPlayerName;
        $this->secondPlayerName = $secondPlayerName;
    }

    public function getResult()
    {
        if ($this->isScoreDifferent()) {
            if ($this->isNextScoreGamePoint()) {
                return $this->getAdvPlayer() . ($this->isAdv() ? ' adv.' : ' Win.');
            }
            return $this->lookUpScore();
        }

        if ($this->isDeuce()) {
            return $this->deuce();
        }

        return $this->sameScore();
    }

    public function givenFirstPlayerScoreTimes(int $int)
    {
        for ($i = 0; $i < $int; $i++) {
            $this->firstPlayerScore++;
        }
    }

    public function givenSecondPlayerScoreTimes(int $int)
    {
        for ($i = 0; $i < $int; $i++) {
            $this->secondPlayerScore++;
        }
    }

    /**
     * @return mixed
     */
    private function getAdvPlayer()
    {
        $advPlayerName = ($this->firstPlayerScore > $this->secondPlayerScore)
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
    private function isNextScoreGamePoint(): bool
    {
        return $this->firstPlayerScore > 3 || $this->secondPlayerScore > 3;
    }

    /**
     * @return string
     */
    private function lookUpScore(): string
    {
        return $this->scoreText[$this->firstPlayerScore] . ' ' . $this->scoreText[$this->secondPlayerScore];
    }

    /**
     * @return bool
     */
    private function isScoreDifferent(): bool
    {
        return $this->firstPlayerScore != $this->secondPlayerScore;
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
    private function sameScore(): string
    {
        return $this->scoreText[$this->firstPlayerScore] . ' All';
    }

    /**
     * @return string
     */
    private function deuce(): string
    {
        return 'Deuce';
    }

}
