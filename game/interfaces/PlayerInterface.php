<?php

namespace app\game\interfaces;

interface PlayerInterface
{
    public function hit(PlayerInterface $againstPlayer);
}