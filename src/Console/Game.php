<?php

namespace Uniqoders\Game\Console;

use Uniqoders\Game\Console\Player;

class Game
{
    /**
     * 
     */
    public static function initPlayers($players) : Array
    {
        $result = [];
        foreach ($players as $key => $player) {
            $result[$key] = new Player($player['name'], $player['type']);
        }
        return $result;
    }


    /**
     * @return ARRAY $result weapons list text
     */
    public static function getTextWeapons($weapons )
    {
        $result = [];
        foreach ($weapons as $key => $weapon) {
            $result[$key] = $weapon?->getName();
        }
        return $result;
    }



}
