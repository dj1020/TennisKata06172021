<?php

namespace App;

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
            ? ($this->isNextScoreGamePoint()
                ? ($this->isAdv()
                    ? $this->advPlayerName() . ' adv.'
                    : $this->advPlayerName() . ' win.')
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

    public function givenSecondPlayerScoreTimes(int $int)
    {
        for ($i = 0; $i < $int; $i++) {
            $this->givenSecondPlayerScore();
        }
    }

    /**
     * @return string
     */
    private function advPlayerName(): string
    {
        $advPlayer = $this->firstPlayerScore > $this->secondPlayerScore
            ? $this->firstPlayerName
            : $this->secondPlayerName;

        return $advPlayer;
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
