<?php

namespace Uniqoders\Game\Console\Weapons;

class Spock extends Weapon
{

    /**
     * 
     */
    function __construct($name = "Spock")
    {
        $this->name = $name;
    }
    
    /**
     * function that implements the confrontation of each weapon in the game
     */
    public function play(Move $weapon)
    {
        return $weapon->playVSSpock($this);
    }

    /**
     * clash with the Paper weapon
     */
    public function playVSPaper(Paper $paper) :string
    {
        return Weapon::VICTORY;
    }

    /**
     * clash with the Rock weapon
     */
    public function playVSRock(Rock $rock) :string
    {
        return Weapon::DEFEAT;
    }

    /**
     * clash with the Scissors weapon
     */
    public function playVSScissors(Scissors $scissors) :string
    {
        return Weapon::DRAW;
    }

    /**
     * clash with the Lizard weapon
     */
    public function playVSLizard(Lizard $lizard) :string
    {
        return Weapon::DEFEAT;
    }
    
    /**
     * clash with the Spock weapon
     */
    public function playVSSpock(Spock $spock) :string
    {
        return Weapon::DRAW;
    }
}
