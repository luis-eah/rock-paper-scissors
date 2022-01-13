<?php

namespace Uniqoders\Game\Console\Weapons;

class Spock extends Weapon
{
    /**
     * List of rules weapon can win
     */
    protected $rule_win = [
        Scissors::class,
        Rock::class,
    ];

    /**
     * List of rules weapon can defeat
     */
    protected $rule_defeat = [
        Paper::class,
        Lizard::class,
    ];

    /**
     * initialize weapon attributes
     */
    function __construct($name = "Spock")
    {
        $this->name = $name;
    }
 
}
