<?php

namespace app\game\interfaces;

use app\game\PlayerA;
use app\game\PlayerC;

interface PlayerBInterface
{
    /**
     * @param PlayerA $playerB
     * @return mixed
     */
    public function setPlayerA(PlayerA $playerA) : void;

    /**
     * @param PlayerC $playerC
     * @return mixed
     */
    public function setPlayerC(PlayerC $playerC) : void ;

    public function hitToA();

    public function hitToC();
}