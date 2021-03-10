<?php

namespace app\game\interfaces;

use app\game\Team;

interface TeamsFightInterface
{
    /**
     * @param Team $team
     * @return mixed
     */
    public function setTeams(Team $team): void;

    public function setExpression(string $expression): void;

    public function play();
}