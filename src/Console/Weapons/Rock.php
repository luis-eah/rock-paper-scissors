<?php

namespace Uniqoders\Game\Console\Weapons;


class Rock extends Weapon
{
    /**
     * List of rules weapon can win
     */
    protected $rule_win = [
        Scissors::class,
        Lizard::class,
    ];

    /**
     * List of rules weapon can defeat
     */
    protected $rule_defeat = [
        Paper::class,
        Spock::class,
    ];

    /**
     * initialize weapon attributes
     */
    function __construct($name = "Rock")
    {
        $this->name = $name;
    }

}
