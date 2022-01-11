<?php

namespace Uniqoders\Game\Console\Weapons;

use Uniqoders\Game\Console\Weapons\Paper;
use Uniqoders\Game\Console\Weapons\Rock;
use Uniqoders\Game\Console\Weapons\Scissors;
use Uniqoders\Game\Console\Weapons\Weapon;


interface Move {
    
    /**
     * function that implements the confrontation of each weapon in the game
     */
    public function play(Move $weapon);

    /**
     * clash with the Paper weapon
     */
    public function playVSPaper(Paper $paper) :string;

    /**
     * clash with the Rock weapon
     */
    public function playVSRock(Rock $rock) :string;


    /**
     * clash with the Scissors weapon
     */
    public function playVSScissors(Scissors $scissors) :string;

    /**
     * clash with the Lizard weapon
     */
    public function playVSLizard(Lizard $lizard) :string;


    /**
     * clash with the Spock weapon
     */
    public function playVSSpock(Spock $spock) :string;
}