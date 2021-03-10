<?php

namespace app\game\interfaces;

use app\game\PlayerA;
use app\game\PlayerB;

interface PlayerCInterface
{
    /**
     * @param PlayerA $playerB
     * @return mixed
     */
    public function setPlayerB(PlayerB $playerB) : void;

    /**
     * @param PlayerA $playerA
     * @return mixed
     */
    public function setPlayerA(PlayerA $playerA) : void ;

    public function hitToA();

    public function hitToB();
}