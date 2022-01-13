<?php

namespace Uniqoders\Game\Console;

use Exception;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Question\ChoiceQuestion;
use Symfony\Component\Console\Question\ConfirmationQuestion;
use Uniqoders\Game\Console\Player;
use Uniqoders\Game\Console\Weapons\Lizard;
use Uniqoders\Game\Console\Weapons\Paper;
use Uniqoders\Game\Console\Weapons\Rock;
use Uniqoders\Game\Console\Weapons\Scissors;
use Uniqoders\Game\Console\Weapons\Spock;
use Uniqoders\Game\Console\Weapons\Weapon;

class GameCommand extends Command
{
    public $players;
    public $currentRound;
    public $roundMaxWinner;
    public $maxRound;
    public $weapons;

    /**
     * Configure the command options.
     *
     * @return void
     */
    protected function configure()
    {
        $this->setName('game')
            ->setDescription('New game: you vs computer')
            ->addArgument('name', InputArgument::OPTIONAL, 'What is your name?', 'Player 1')
            ->addArgument('players', InputArgument::OPTIONAL, 'Would you like to add player information?', []);

        $this->currentRound = 1;
        $this->roundMaxWinner = 3;
        $this->maxRound = 5;
    }

    /**
     * 
     */
    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $output->write(PHP_EOL . 'Made with ♥ by Uniqoders.' . PHP_EOL . PHP_EOL);

        $player_name = $input->getArgument('name');

        $playersDefault = [
            'player' => [
                'name' => $player_name,
                'type' => Player::HUMAN,
            ],
            'computer' => [
                'name' => 'Computer',
                'type' => Player::COMPUTER,
            ]
        ];

        $players = $input->getArgument('players') ?: $playersDefault;

        $this->players = Game::initPlayers($players);
        $ask = $this->getHelper('question');

        // init weapons defaults
        $this->weapons[] = new Scissors();
        $this->weapons[] = new Rock();
        $this->weapons[] = new Paper();

        $question = new ConfirmationQuestion('Would you like to play "The Big Bang Theory" rules? y/n ' . PHP_EOL, false, '/^(y|j)/i');
        $resultQuestion = $ask->ask($input, $output, $question);

        // add the new weapons if user wants to play the version "The Big Bang Theory"
        if ($resultQuestion) {
            $this->weapons[] = new Lizard();
            $this->weapons[] = new Spock();
        }

        $weaponsText = Game::getTextWeapons($this->weapons);

        do {
            // User selection
            $player = $this->players['player'];
            $computer = $this->players['computer'];
            
            $optionPlayer = array_rand($this->weapons);

            // ask player for weapon to use
            $question = new ChoiceQuestion('Please select your weapon', array_values($weaponsText), $optionPlayer);
            $question->setErrorMessage('Weapon %s is invalid.');
            $user_weapon_text = $ask->ask($input, $output, $question);

            $output->writeln('You have just selected: ' . $user_weapon_text);

            // search index reponse array
            $user_weapon = array_search($user_weapon_text, $weaponsText);

            // set weapon computer or generate random option
            $computer_weapon = array_rand($this->weapons);

            $output->writeln('Computer has just selected: ' . $weaponsText[$computer_weapon]);
            
            $player->setWeapon($this->weapons[$user_weapon]);
            $computer->setWeapon($this->weapons[$computer_weapon]);
    
            $round = new Round($player,$computer);
            $round->fight();

            // Print round result 
            $output->writeln("{$player?->roundResult()}");
            $output->writeln("{$computer?->roundResult()}");
            $output->writeln("-----------------------------------------");

            $playersVictories = [$player->getVictory(), $computer->getVictory()];

            // Break loop when any player reach limit 
            if (in_array($this->roundMaxWinner, $playersVictories)) {
                break;
            }

            $this->currentRound++;
        } while ($this->currentRound <= $this->maxRound);

        // Display stats
        $stats = $this->players;

        $stats = array_map(function ($player) {
            return $player->toArray();
        }, $stats);

        $table = new Table($output);
        $table
            ->setHeaders(['Player', 'Victory', 'Draw', 'Defeat'])
            ->setRows($stats);
        $table->render();

        return Command::SUCCESS;
    }

}
