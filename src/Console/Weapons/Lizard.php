<?php

namespace Uniqoders\Game\Console\Weapons;

class Lizard extends Weapon
{
    /**
     * List of rules weapon can win
     */
    protected $rule_win = [
        Paper::class,
        Spock::class,
    ];


    /**
     * List of rules weapon can defeat
     */
    protected $rule_defeat = [
        Scissors::class,
        Rock::class,
    ];

    /**
     * initialize weapon attributes
     */
    function __construct($name = "Lizard")
    {
        $this->name = $name;
    }
}
