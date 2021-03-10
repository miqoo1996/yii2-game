<?php

namespace app\game\interfaces;

use app\game\PlayerA;
use app\game\PlayerB;
use app\game\PlayerC;

interface TeamInterface
{
    /**
     * @param PlayerA $playerA
     * @return mixed
     */
    public function setPlayerA(PlayerA $playerA) : void;

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

    /**
     * @param PlayerInterface $player1
     * @param PlayerInterface $player2
     * @param PlayerInterface $player3
     */
    public function setPlayers(PlayerInterface $player1, PlayerInterface $player2, PlayerInterface $player3): void;
}