<?php

namespace app\game\interfaces;

use app\game\PlayerB;
use app\game\PlayerC;

interface PlayerAInterface
{
    /**
     * @param PlayerB $playerB
     * @return mixed
     */
    public function setPlayerB(PlayerB $playerB) : void;

    /**
     * @param PlayerC $playerC
     * @return mixed
     */
    public function setPlayerC(PlayerC $playerC) : void;

    public function hitToB();

    public function hitToC();
}