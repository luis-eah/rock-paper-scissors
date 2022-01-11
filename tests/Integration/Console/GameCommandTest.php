<?php

namespace Uniqoders\Tests\Integration\Console;

use Symfony\Component\Console\Tester\CommandTester;
use Uniqoders\Game\Console\GameCommand;
use Uniqoders\Game\Console\Player;
use Uniqoders\Tests\Integration\IntegrationTestCase;
use Symfony\Component\Console\Helper\Table;


class GameCommandTest extends IntegrationTestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->application->add(new GameCommand());
    }

    public function test_game_command(): void
    {
        /**
         *******************
         * TODO Make tests *
         *******************
         */
        $command = $this->application->find('game');
        $commandTester = new CommandTester($command);

        $player_name = "Luis Eduardo";

        $playersDefault = [
            'player' => [
                'name' => $player_name,
                'type' => Player::HUMAN,
                'options' => [1,1,1,1,1,1,1,1,1,1],
            ],
            'computer' => [
                'name' => 'Computer',
                'type' => Player::COMPUTER,
                'options' => [1,1,1,1,1,1,1,1,1,1],
            ]
        ];

        $commandTester->execute([
            'command' => $command->getName(),
            'name' => $command->getName(),
            'players' => $playersDefault,
        ]);

        $output = $commandTester->getDisplay();

        $this->assertSame([], $output);



    }
}
