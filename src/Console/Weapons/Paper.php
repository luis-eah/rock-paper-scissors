<?php

namespace Uniqoders\Game\Console\Weapons;


class Paper extends Weapon
{

    /**
     * 
     */
    function __construct($name = "Paper")
    {
        $this->name = $name;
    }

    /**
     * function that implements the confrontation of each weapon in the game
     */
    public function play(Move $weapon)
    {
        return $weapon->playVSPaper($this);
    }

    /**
     * clash with the Paper weapon
     */
    public function playVSPaper(Paper $paper) :string
    {
        return Weapon::DRAW;
    }

    /**
     * clash with the Rock weapon
     */
    public function playVSRock(Rock $rock) :string
    {
        return Weapon::VICTORY;
    }

    /**
     * clash with the Scissors weapon
     */
    public function playVSScissors(Scissors $scissors) :string
    {
        return Weapon::DEFEAT;
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
        return Weapon::VICTORY;
    }
}
