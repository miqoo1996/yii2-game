<?php

namespace app\game;

use app\game\interfaces\PlayerInterface;

abstract class PlayerAbstract
{
    protected $score;
    protected $protection;
    protected $hitPower;

    public $dead = false;

    /**
     * @param mixed $score
     */
    public function setScore($score)
    {
        $this->score = $score;
    }

    /**
     * @param mixed $protection
     */
    public function setProtection($protection)
    {
        $this->protection = $protection;
    }

    /**
     * @param mixed $hitPower
     */
    public function setHitPower($hitPower)
    {
        $this->hitPower = $hitPower;
    }

    /**
     * @return mixed
     */
    public function getHitPower()
    {
        return $this->hitPower;
    }

    /**
     * @return mixed
     */
    public function getProtection()
    {
        return $this->protection;
    }

    /**
     * @return mixed
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Returns against player's remaining scores
     *
     * @param PlayerInterface $againstPlayer
     * @return int|mixed
     */
    public function hit(PlayerInterface $againstPlayer)
    {
        $selfHitPower = $this->getHitPower();

        if ($againstPlayer->getProtection() > $selfHitPower) {
            Throw new \Exception("Against player's protection too higher, You can't fight with him.");
        }

        $scores = $againstPlayer->getScore() - $selfHitPower + $againstPlayer->getProtection();

        return $scores < 0 ? 0 : $scores;
    }
}