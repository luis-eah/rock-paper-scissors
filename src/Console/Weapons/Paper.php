<?php

namespace Uniqoders\Game\Console\Weapons;


class Paper extends Weapon
{
    /**
     * List of rules weapon can win
     */
    protected $rule_win = [
        Rock::class,
        Spock::class,
    ];

    /**
     * List of rules weapon can defeat
     */
    protected $rule_defeat = [
        Scissors::class,
        Lizard::class,
    ];

    /**
     * initialize weapon attributes
     */
    function __construct($name = "Paper")
    {
        $this->name = $name;
    }

}
