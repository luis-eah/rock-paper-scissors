<?php

namespace Uniqoders\Game\Console\Weapons;

class Scissors extends Weapon
{

    /**
     * List of rules weapon can win
     */
    protected $rule_win = [
        Paper::class,
        Lizard::class,
    ];

    /**
     * List of rules weapon can defeat
     */
    protected $rule_defeat = [
        Rock::class,
        Spock::class,
    ];

    /**
     * initialize weapon attributes
     */
    function __construct($name = "Scissors")
    {
        $this->name = $name;
    }

}
