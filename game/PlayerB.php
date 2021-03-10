<?php

namespace app\game;

use app\game\interfaces\PlayerBInterface;
use app\game\interfaces\PlayerInterface;

class PlayerB extends PlayerAbstract implements PlayerBInterface, PlayerInterface
{
    protected $score = 400;
    protected $protection = 60;
    protected $hitPower = 150;

    /**
     * @var playerA
     */
    protected $playerA;

    /**
     * @var PlayerC
     */
    protected $playerC;

    public function setPlayerA(PlayerA $playerA) : void
    {
        $this->playerA = $playerA;
    }

    public function setPlayerC(PlayerC $playerC) : void
    {
        $this->playerC = $playerC;
    }

    public function hitToA()
    {
        if ($this->playerA->getScore() == 0) {
            $this->playerA->dead = true;
        }

        if ($this->playerA->dead === true) {
            return false;
        }

        $this->playerA->setScore($this->hit($this->playerA));

        return true;
    }

    public function hitToC()
    {
        if ($this->playerC->getScore() == 0) {
            $this->playerC->dead = true;
        }

        if ($this->playerC->dead === true) {
            return false;
        }

        $this->playerC->setScore($this->hit($this->playerC));

        return true;
    }
}