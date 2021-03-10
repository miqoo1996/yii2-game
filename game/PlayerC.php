<?php

namespace app\game;

use app\game\interfaces\PlayerCInterface;
use app\game\interfaces\PlayerInterface;

class PlayerC extends PlayerAbstract implements PlayerCInterface, PlayerInterface
{
    protected $score = 300;
    protected $protection = 50;
    protected $hitPower = 160;

    /**
     * @var playerB
     */
    protected $playerB;

    /**
     * @var PlayerA
     */
    protected $playerA;

    public function setPlayerB(PlayerB $playerB) : void
    {
        $this->playerB = $playerB;
    }

    public function setPlayerA(PlayerA $playerA) : void
    {
        $this->playerA = $playerA;
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
}