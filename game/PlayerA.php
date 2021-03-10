<?php

namespace app\game;

use app\game\interfaces\PlayerAInterface;
use app\game\interfaces\PlayerInterface;

class PlayerA extends PlayerAbstract implements PlayerAInterface, PlayerInterface
{
    protected $score = 500;
    protected $protection = 50;
    protected $hitPower = 100;

    /**
     * @var PlayerB
     */
    protected $playerB;

    /**
     * @var PlayerC
     */
    protected $playerC;

    public function setPlayerB(PlayerB $playerB): void
    {
        $this->playerB = $playerB;
    }

    public function setPlayerC(PlayerC $playerC): void
    {
        $this->playerC = $playerC;
    }

    public function hitToB()
    {
        if ($this->playerB->getScore() == 0) {
            $this->playerB->dead = true;
        }

        if ($this->playerB->dead === true) {
            return false;
        }

        $this->playerB->setScore($this->hit($this->playerB));

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