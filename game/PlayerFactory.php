<?php

namespace app\game;

class PlayerFactory
{
    const PLAYER_A = 'A';
    const PLAYER_B = 'B';
    const PLAYER_C = 'C';

    /**
     * @param $playerCode
     * @return PlayerA|PlayerB|PlayerC
     * @throws \Exception
     */
    public static function getPlayerFactory($playerCode)
    {
        switch ($playerCode) {
            case self::PLAYER_A:
                return new PlayerA();
                break;
            case self::PLAYER_B:
                return new PlayerB();
                break;
            case self::PLAYER_C:
                return new PlayerC();
                break;
        }

        Throw new \Exception(sprintf('Player with code %s does not found', $playerCode));
    }
}