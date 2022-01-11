<?php

namespace Uniqoders\Game\Console;

use Uniqoders\Game\Console\Weapons\Weapon;

class Player
{

    const COMPUTER = 0;

    const HUMAN = 1;

    /** name player */
    private $name;

    /** number of rounds won */
    private $victory;

    /** number of rounds defeated */
    private $defeat;

    /** number of rounds draw */
    private $draw;

    /** type of player */
    private $type;

    /** last round of player */
    private $lastRound;


    private $roundOptions;


    /**
     * construct class
     */
    function __construct($name = 'Player # 1', $type = self::HUMAN, $options = [])
    {
        $this->name     = $name;
        $this->type     = $type;
        $this->roundOptions  = $options;
        $this->victory  = 0;
        $this->defeat   = 0;
        $this->draw     = 0;
    }

    /**
     * get name player
     */
    public function getName(): string
    {
        return $this?->name;
    }

    /**
     * add wins
     */
    public function addVictory(): void
    {
        $this->setLastRound(Weapon::VICTORY);
        $this->victory++;
    }

    /**
     * add
     */
    public function addDefeat(): void
    {
        $this->setLastRound(Weapon::DEFEAT);
        $this->defeat++;
    }

    /**
     * 
     */
    public function addDraw(): void
    {
        $this->setLastRound(Weapon::DRAW);
        $this->draw++;
    }

    /**
     * 
     */
    public function getDefeat(): int
    {
        return $this->defeat;
    }

    /**
     * 
     */
    public function getVictory(): int
    {
        return $this->victory;
    }

    /**
     * 
     */
    public function getDraw(): int
    {
        return $this->draw;
    }


    /**
     * 
     */
    public function getLastRound(): string
    {
        return $this->lastRound;
    }

    /**
     * 
     */
    public function getRoundOptions(): array
    {
        return $this->roundOptions;
    }

    /**
     * get type player Attribute
     * @return int Type Player
     */
    public function getType(): int
    {
        return $this->type;
    }

    /**
     * 
     */
    public function setDefeat($value): void
    {
        $this->defeat = $value;
    }


    /**
     * set Victory Attribute
     */
    public function setVictory($value): void
    {
        $this->defeat = $value;
    }

    /**
     * set Draw Attribute
     */
    public function setDraw($value): void
    {
        $this->defeat = $value;
    }


    /**
     * set Last round Attribute
     */
    public function setLastRound($value): void
    {
        $this->lastRound = $value;
    }


    /**
     * return class attributes as array
     */
    public function toArray(): array
    {
        return [
            'name' => $this->name,
            'victory' => $this->victory,
            'draw' => $this->draw,
            'defeat' => $this->defeat,
        ];
    }

    /**
     * 
     */
    public function __toString()
    {
        return json_encode($this->toArray());
    }



    /**
     * Print the result of the round 
     */
    public function roundResult(): string
    {
        $result = "";
        switch ($this->getLastRound()) {
            case Weapon::VICTORY: // When Player wins
                $result = "{$this->getName()} Win!";
                break;
            case Weapon::DRAW:  // When Draw
                $result = "{$this->getName()} Draw!";
                break;
            case Weapon::DEFEAT:  // When computer Lose 
                $result = "{$this->getName()} Defeat!";
                break;
        }
        return $result;
    }
}
