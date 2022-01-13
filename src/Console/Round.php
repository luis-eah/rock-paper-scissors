<?php

namespace Uniqoders\Game\Console;

use Uniqoders\Game\Console\Player;

class Round
{
    const VICTORY = "Victory";
    const DEFEAT = "Defeat";
    const DRAW = "Draw";

    /** player attribute */
    protected $player;

    /** computer attribute */
    protected $computer;

    /**
     * 
     */
    function __construct(Player $player, Player $computer)
    {
        $this->player = $player;
        $this->computer = $computer;
    }

    /**
     * clash between the weapons in a round
     */
    public function fight(): void
    {
        $result = $this->roundResult();

        switch ($result) {
            case self::VICTORY: // When Player wins
                $this->player->addVictory();
                $this->computer->addDefeat();
                break;
            case self::DRAW: // When Draw 
                $this->player->addDraw();
                $this->computer->addDraw();
                break;
            case self::DEFEAT: // When computer Lose 
                $this->player->addDefeat();
                $this->computer->addVictory();
                break;

            default:
                throw new Exception("Error Round");
                break;
        }
    }


    /**
     * Round result of the battle
     */
    public function roundResult(): string
    {
        $weaponPlayer = $this->player->getWeapon();
        $weaponComputer = $this->computer->getWeapon();

        // valid by default that the result is a draw
        $result = self::DRAW;
        $rule_win = $weaponPlayer->getRuleWin();

        foreach ($rule_win as $rule) {
            if ($rule == $weaponComputer) {
                $result = self::VICTORY;
                break;
            }
        }

        // validate if the result of the round is draw
        if ($result == self::DRAW) {
            $rule_defeat = $weaponPlayer->getRuleDefeat();

            foreach ($rule_defeat as $rule) {
                if ($rule == $weaponComputer) {
                    $result = self::DEFEAT;
                    break;
                }
            }
        }

        return $result;
    }
}
