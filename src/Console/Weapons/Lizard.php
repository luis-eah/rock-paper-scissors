<?php

namespace Uniqoders\Game\Console\Weapons;

class Lizard extends Weapon
{

    /**
     * 
     */
    function __construct($name = "Lizard")
    {
        $this->name = $name;
    }

    /**
     * function that implements the confrontation of each weapon in the game
     * @param Move $weapon parameter modeling hand movement type
     */
    public function play(Move $weapon)
    {
        return $weapon->playVSLizard($this);
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
        return Weapon::DRAW;
    }
    
    /**
     * clash with the Spock weapon
     */
    public function playVSSpock(Spock $spock) :string
    {
        return Weapon::VICTORY;
    }
}
