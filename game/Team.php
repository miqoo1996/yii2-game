<?php

namespace app\game;

use app\game\interfaces\PlayerAInterface;
use app\game\interfaces\PlayerBInterface;
use app\game\interfaces\PlayerCInterface;
use app\game\interfaces\PlayerInterface;
use app\game\interfaces\TeamInterface;

class Team implements TeamInterface
{
    /**
     * @var PlayerA
     */
    protected $playerA;

    /**
     * @var PlayerB
     */
    protected $playerB;

    /**
     * @var PlayerC
     */
    protected $playerC;

    /**
     * @var Team
     */
    protected $againstTeam;

    public function __construct()
    {
        
    }

    public function setPlayerA(PlayerA $playerA): void
    {
        $this->playerA = $playerA;
    }

    public function setPlayerB(PlayerB $playerB): void
    {
        $this->playerB = $playerB;
    }

    public function setPlayerC(PlayerC $playerC): void
    {
        $this->playerC = $playerC;
    }

    /**
     * @return PlayerA
     */
    public function getPlayerA() : PlayerA
    {
        return $this->playerA;
    }

    /**
     * @return PlayerB
     */
    public function getPlayerB() : PlayerB
    {
        return $this->playerB;
    }

    /**
     * @return PlayerC
     */
    public function getPlayerC() : PlayerC
    {
        return $this->playerC;
    }

    /**
     * @return Team
     */
    public function getAgainstTeam() : Team
    {
        return $this->againstTeam;
    }

    public function sortPlayers(PlayerInterface $player1, PlayerInterface $player2, PlayerInterface $player3): array
    {
        if ($player1 instanceof PlayerAInterface) {
            $playerA = $player1;
        }

        if ($player1 instanceof PlayerBInterface) {
            $playerB = $player1;
        }

        if ($player1 instanceof PlayerCInterface) {
            $playerC = $player1;
        }

        if ($player2 instanceof PlayerAInterface) {
            $playerA = $player2;
        }

        if ($player2 instanceof PlayerBInterface) {
            $playerB = $player2;
        }

        if ($player2 instanceof PlayerCInterface) {
            $playerC = $player2;
        }

        if ($player3 instanceof PlayerAInterface) {
            $playerA = $player3;
        }

        if ($player3 instanceof PlayerBInterface) {
            $playerB = $player3;
        }

        if ($player3 instanceof PlayerCInterface) {
            $playerC = $player3;
        }

        return [$playerA, $playerB, $playerC];
    }

    /**
     * @param Team $againstTeam
     */
    public function setAgainstTeam(Team $againstTeam)
    {
        $this->againstTeam = $againstTeam;

        $this->playerA->setPlayerB($this->againstTeam->playerB);
        $this->playerA->setPlayerC($this->againstTeam->playerC);

        $this->playerB->setPlayerA($this->againstTeam->playerA);
        $this->playerB->setPlayerC($this->againstTeam->playerC);

        $this->playerC->setPlayerA($this->againstTeam->playerA);
        $this->playerC->setPlayerB($this->againstTeam->playerB);
    }

    public function setPlayers(PlayerInterface $player1, PlayerInterface $player2, PlayerInterface $player3): void
    {
        list($playerA, $playerB, $playerC) = $this->sortPlayers($player1, $player2, $player3);

        $this->setPlayerA($playerA);
        $this->setPlayerB($playerB);
        $this->setPlayerC($playerC);
    }
}
