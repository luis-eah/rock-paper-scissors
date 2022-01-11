<?php

namespace Uniqoders\Game\Console\Weapons;

use Uniqoders\Game\Console\Weapons\Move;

abstract class Weapon implements Move {

    const VICTORY = "Victory";
    const DEFEAT = "Defeat";
    const DRAW = "Draw";

    /**
     * Name weapon
     */
    protected $name;

    /**
     * get Name of the weapon
     */
    public function getName() :string{
        return $this->name;
    }

    /**
     * get Name of the weapon
     */
    public function setName($value) :void {
         $this->name = $value;
    }

}