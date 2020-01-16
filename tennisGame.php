<?php
namespace src;

class tennisGame {
    private $player1Name="";
    private $player2Name="";
    private $score1=0;
    private $score2=0;

    public function __construct($player1Name, $player2Name)
    {
        $this->player1Name=$player1Name;
        $this->player2Name=$player2Name;
    }

    public function wonPoint($playerName)
    {
        if ($playerName=="player1")
        {
            $this->score1++;
            //echo "player1 $this->score1";
        }
        else
        {
            $this->score2++;
            //echo "player2 $this->score1";
        }
    }

    public function getScore()
    {
        $score="";
        if ($this->score1==$this->score2)
        {
            switch ($this->score1)
            {
                case 0:
                    $score="Love-All";
                    break;
                case 1:
                    $score="Fifteen-All";
                    break;
                case 2:
                    $score="Thirty-All";
                    break;
                default:
                    $score="Deuce";
                    break;
            }
        }
        elseif ($this->score1>=4||$this->score2>=4)
        {
            $difScore=$this->score1-$this->score2;
            if ($difScore==1)
            {
                $score="Advantage player1";
            }
            elseif ($difScore==-1)
            {
                $score="Advantage player2";
            }
            elseif ($difScore>=2)
            {
                $score="Win for player1";
            }
            else
            {
                $score="Win for player2";
            }
        }
        else
        {
            for ($i=1;$i<3;$i++)
            {
                if ($i==1)
                {
                    $tempScore=$this->score1;
                }
                else
                {
                    $tempScore=$this->score2;
                    $score.="-";
                }
                switch ($tempScore)
                {
                    case 0:
                        $score.="Love";
                        break;
                    case 1:
                        $score.="Fifteen";
                        break;
                    case 2:
                        $score.="Thirty";
                        break;
                    case 3:
                        $score.="Forty";
                        break;
                }
            }
        }
        return $score;
    }
}
