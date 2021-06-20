<?php

namespace App;

class Tennis
{
    private $firstPlayerSocre  = 0;
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
                    ? $this->advPlayerName() . ' adv.'
                    : $this->advPlayerName() . ' win.')
                : $this->lookupScore())
            : ($this->isDeuce()
                ? $this->deuce()
                : $this->sameScore());
    }

    public function givenFirstPlyaerScore()
    {
        $this->firstPlayerSocre++;
    }

    public function givenFirstPlyaerScoreTimes(int $int)
    {
        for ($i = 0; $i < $int; $i++) {
            $this->givenFirstPlyaerScore();
        }
    }

    public function givenSecondPlayerScore()
    {
        $this->secondPlayerScore++;
    }

    public function givenSecondPlayerScoreTimes(int $int)
    {
        for ($i = 0; $i < $int; $i++) {
            $this->givenSecondPlayerScore();
        }
    }

    /**
     * @return mixed
     */
    private function advPlayerName()
    {
        $advPlayer = $this->firstPlayerSocre > $this->secondPlayerScore
            ? $this->firstPlayerName
            : $this->secondPlayerName;

        return $advPlayer;
    }

    /**
     * @return bool
     */
    private function isAdv(): bool
    {
        return abs($this->firstPlayerSocre - $this->secondPlayerScore) == 1;
    }

    /**
     * @return bool
     */
    private function isNextPointGamePoint(): bool
    {
        return $this->firstPlayerSocre > 3 || $this->secondPlayerScore > 3;
    }

    /**
     * @return bool
     */
    private function isScoreDifferent(): bool
    {
        return $this->firstPlayerSocre != $this->secondPlayerScore;
    }

    /**
     * @return string
     */
    private function lookupScore(): string
    {
        return $this->scoreTable[$this->firstPlayerSocre] . ' ' . $this->scoreTable[$this->secondPlayerScore];
    }

    /**
     * @return bool
     */
    private function isDeuce(): bool
    {
        return $this->firstPlayerSocre >= 3;
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
        return $this->scoreTable[$this->firstPlayerSocre] . ' All';
    }
}
