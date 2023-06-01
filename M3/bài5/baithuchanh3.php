<?php


class TennisGame
{
    private string $player1Name;
    private string $player2Name;
    private int $player1Score = 0;
    private int $player2Score = 0;
    
    const SCORE_LOVE = 0;
    const SCORE_FIFTEEN = 1;
    const SCORE_THIRTY = 2;
    const SCORE_FORTY = 3;
    const SCORE_ADVANTAGE = 4;
    const MIN_SCORE_DIFF = 2;

    public function __construct(string $player1Name, string $player2Name)
    {
        $this->player1Name = $player1Name;
        $this->player2Name = $player2Name;
    }

    public function getScore(): string
    {
        if ($this->isTied()) {
            return $this->getTiedScore();
        }
        
        if ($this->isEndGame()) {
            return $this->getEndGameScore();
        }

        return $this->getRegularScore();
    }

    private function isTied(): bool
    {
        return $this->player1Score == $this->player2Score;
    }

    private function getTiedScore(): string
    {
        switch ($this->player1Score) {
            case self::SCORE_LOVE:
                return "Love-All";
            case self::SCORE_FIFTEEN:
                return "Fifteen-All";
            case self::SCORE_THIRTY:
                return "Thirty-All";
            case self::SCORE_FORTY:
                return "Forty-All";
            default:
                return "Deuce";
        }
    }

    private function isEndGame(): bool
    {
        return $this->player1Score >= self::SCORE_ADVANTAGE || $this->player2Score >= self::SCORE_ADVANTAGE;
    }

    private function getEndGameScore(): string
    {
        $scoreDiff = $this->player1Score - $this->player2Score;
        if ($scoreDiff == 1) {
            return "Advantage {$this->player1Name}";
        }
        if ($scoreDiff == -1) {
            return "Advantage {$this->player2Name}";
        }
        if ($scoreDiff >= self::MIN_SCORE_DIFF) {
            return "Win for {$this->player1Name}";
        }
        return "Win for {$this->player2Name}";
    }

    private function getRegularScore(): string
    {
        $score = "";
        for ($i = 1; $i <= 2; $i++) {
            $tempScore = ($i == 1) ? $this->player1Score : $this->player2Score;
            switch ($tempScore) {
                case self::SCORE_LOVE:
                    $score .= "Love";
                    break;
                case self::SCORE_FIFTEEN:
                    $score .= "Fifteen";
                    break;
                case self::SCORE_THIRTY:
                    $score .= "Thirty";
                    break;
                case self::SCORE_FORTY:
                    $score .= "Forty";
                    break;
            }
            if ($i == 1) {
                $score .= "-";
            }
        }
        return $score;
    }

    public function wonPoint(string $playerName): void
    {
        if ($playerName == $this->player1Name) {
            $this->player1Score++;
        } else {
            $this->player2Score++;
        }
    }
}
 
$tennisGame = new TennisGame('player1Name', 'player2Name');

$tennisGame->wonPoint('player1Name');
$tennisGame->wonPoint('player2Name');

echo $tennisGame->getScore();
