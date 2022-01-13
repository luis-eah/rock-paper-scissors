<?php

namespace Uniqoders\Game\Console\Weapons;
abstract class Weapon
{

    /**
     * List of rules weapon can win
     */
    protected $rule_win = [ ];


    /**
     * List of rules weapon can defeat
     */
    protected $rule_defeat = [ ];

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

    /**
     * 
     */
    public function getRuleWin()
    {
       return $this->rule_win;
    }


    /**
     * 
     */
    public function getRuleDefeat()
    {
       return $this->rule_defeat;
    }


    /**
     * 
     */
    public function __toString()
    {
        return get_class($this);
    }

}