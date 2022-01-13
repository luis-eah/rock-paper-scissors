<?php

namespace Uniqoders\Tests\Unit\Console;

use Uniqoders\Game\Console\Game;
use Uniqoders\Game\Console\Player;
use Uniqoders\Game\Console\Round;
use Uniqoders\Game\Console\Weapons\Paper;
use Uniqoders\Game\Console\Weapons\Rock;
use Uniqoders\Game\Console\Weapons\Scissors;
use Uniqoders\Tests\Unit\UnitTestCase;

class RoundTest extends UnitTestCase
{
    /**
     *******************
     * TODO Make tests *
     *******************
     */
    protected $players;


    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $player_name = "Luis Eduardo";

        $playersDefault = [
            'player' => [
                'name' => $player_name,
                'type' => Player::HUMAN
            ],
            'computer' => [
                'name' => 'Computer',
                'type' => Player::COMPUTER
            ]
        ];

        $this->players = Game::initPlayers($playersDefault);    }

    /**
     * 
     */
    public function test_fight_round(): void
    {
        $player = $this->players['player'];
        $computer = $this->players['computer'];

        // Round # 1
        $player->setWeapon(new Paper());
        $computer->setWeapon(new Paper());

        $round = new Round($player,$computer);
        $round->fight();
        $this->assertTrue( $player->getDraw() == $computer->getDraw());

        // Round # 2
        $player->setWeapon(new Rock());
        $computer->setWeapon(new Paper());

        $round = new Round($player,$computer);
        $round->fight();
        $this->assertTrue( $player->getLastRound() == Round::DEFEAT);

        // Round # 3
        $player->setWeapon(new Rock());
        $computer->setWeapon(new Scissors());

        $round = new Round($player,$computer);
        $round->fight();
        $result = $player->getLastRound() == Round::DEFEAT;
        $this->assertFalse( $result);

    }

}
