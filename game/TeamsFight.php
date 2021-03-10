<?php

namespace app\game;

use app\game\interfaces\TeamsFightInterface;

class TeamsFight implements TeamsFightInterface
{
    /**
     * @var string
     */
    protected $expression;

    /**
     * @var Team[]
     */
    protected $teams = [];

    /**
     * Ex. ABCCBA [team1[PlayerA, PlayerB, PlayerC], team2[PlayerC, PlayerB, PlayerA]]
     *
     * @param string $expression
     */
    public function setExpression(string $expression): void
    {
        $this->expression = $expression;
    }

    public function setTeams(Team $team): void
    {
        $this->teams[] = $team;
    }

    protected function preparePlayersToGame()
    {
        for ($i = 3; $i < strlen($this->expression); $i += 3) {
            $player1Code = substr($this->expression, $i - 1, 1);
            $player2Code = substr($this->expression, $i - 2, 1);
            $player3Code = substr($this->expression, $i - 3, 1);

            $player1 = PlayerFactory::getPlayerFactory($player1Code);
            $player2 = PlayerFactory::getPlayerFactory($player2Code);
            $player3 = PlayerFactory::getPlayerFactory($player3Code);

            $team = new Team();
            $team->setPlayers($player1, $player2, $player3);
            $this->setTeams($team);
            $this->teams[] = $team;
        }

        foreach ($this->teams as $k => $team) {
            if (isset($this->teams[$k + 1])) {
                $this->teams[$k]->setAgainstTeam($this->teams[$k + 1]);
            }
        }
    }

    protected function fightTeamMembersRandomly()
    {
        foreach ($this->teams as $k => $team) {
            $i = 0;
            $playerAScores = $team->getPlayerA()->getScore();
            $playerBScores = $team->getAgainstTeam()->getPlayerB()->getScore();
            while ($team->getPlayerA()->dead === false && $team->getAgainstTeam()->getPlayerB()->dead === false) {
                if ($i > 20) exit('Reached to limit, try again!');

                $team->getPlayerA()->hitToB();
                $team->getAgainstTeam()->getPlayerB()->hitToA();

                echo sprintf('Player A scores %s .', $team->getPlayerA()->getScore()), '<br>';
                echo sprintf('Player B scores %s .', $team->getAgainstTeam()->getPlayerB()->getScore()), '<br>';
                $i++;
            }

            if ($team->getPlayerA()->dead === true) {
                echo sprintf('Player A from team %d has wined to B.<br>', $k);
            }

            if ($team->getAgainstTeam()->getPlayerB()->dead === true) {
                echo sprintf('Player B from team %d has wined to A.<br>', $k);
            }

            $team->getPlayerA()->setScore($playerAScores);
            $team->getAgainstTeam()->getPlayerB()->setScore($playerBScores);



            echo '<br>';
            echo '<br>';

            $i = 0;
            $playerAScores = $team->getPlayerA()->getScore();
            $playerCScores = $team->getAgainstTeam()->getPlayerc()->getScore();
            while ($team->getPlayerA()->dead === false && $team->getAgainstTeam()->getPlayerC()->dead === false) {
                if ($i > 20) exit('Reached to limit, try again!');

                $team->getPlayerA()->hitToC();
                $team->getAgainstTeam()->getPlayerC()->hitToA();

                echo sprintf('Player A scores %s .', $team->getPlayerA()->getScore()), '<br>';
                echo sprintf('Player C scores %s .', $team->getAgainstTeam()->getPlayerC()->getScore()), '<br>';
                $i++;
            }

            if ($team->getPlayerA()->dead === true) {
                echo sprintf('Player A from team %d has wined to C.<br>', $k);
            }

            if ($team->getAgainstTeam()->getPlayerC()->dead === true) {
                echo sprintf('Player C from team %d has wined to A.<br>', $k);
            }

            $team->getPlayerA()->setScore($playerAScores);
            $team->getAgainstTeam()->getPlayerC()->setScore($playerCScores);
        }
    }

    protected function fightTeams()
    {
        foreach ($this->teams as $k => $team) {
            $team->getPlayerA()->hitToB();
            $team->getAgainstTeam()->getPlayerB()->hitToA();

            echo sprintf('Player A scores %s .', $team->getPlayerA()->getScore()), '<br>';
            echo sprintf('Player B scores %s .', $team->getAgainstTeam()->getPlayerB()->getScore()), '<br>';

            $team->getPlayerA()->hitToB();
            $team->getAgainstTeam()->getPlayerB()->hitToA();

            echo sprintf('Player A scores %s .', $team->getPlayerA()->getScore()), '<br>';
            echo sprintf('Player B scores %s .', $team->getAgainstTeam()->getPlayerB()->getScore()), '<br>';

            if ($team->getPlayerA()->dead === true) {
                echo sprintf('Player A from team %d has wined to B.<br>', $k);
            }

            if ($team->getPlayerB()->dead === true) {
                echo sprintf('Player B from team %d has wined to A.<br>', $k);
            }
        }
    }

    public function play()
    {
        $this->preparePlayersToGame();

        $this->fightTeamMembersRandomly();
    }
}