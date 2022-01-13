<?php

namespace Uniqoders\Tests\Unit\Console;

use Uniqoders\Game\Console\Player;
use Uniqoders\Tests\Unit\UnitTestCase;

class PlayerTest extends UnitTestCase
{
    /**
     *******************
     * TODO Make tests *
     *******************
     */
    protected $player;


    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
        parent::setUp();
        $this->player = new Player("Luis Eduardo", Player::HUMAN);
    }

    /**
     * 
     */
    public function test_add_victory(): void
    {
        $this->player->addVictory();
        $this->assertEquals($this->player->getVictory(), 1);
    }

    /**
     * 
     */
    public function test_add_defeat(): void
    {
        $this->player->addDefeat();
        $this->assertEquals($this->player->getDefeat(), 1);
    }

    /**
     * 
     */
    public function test_add_draw(): void
    {
        $this->player->addDraw();
        $this->assertEquals($this->player->getDraw(), 1);
    }

    /**
     * 
     */
    public function test_to_array_init(): void
    {
        $testArray =  [
            'name' => "Luis Eduardo",
            'victory' => 0,
            'draw' => 0,
            'defeat' => 0,
        ];
        $this->assertSame($this->player->toArray(), $testArray);
    }

    /**
     * 
     */
    public function test_to_array_victory(): void
    {
        $this->player->addVictory();
        $testArray =  [
            'name' => "Luis Eduardo",
            'victory' => 1,
            'draw' => 0,
            'defeat' => 0,
        ];
        $this->assertSame($this->player->toArray(), $testArray);
    }

    /**
     * 
     */
    public function test_round_result_victory(): void
    {
        $this->player->addVictory();
        $result = $this->player->roundResult();
        $this->assertEquals($result,"Luis Eduardo Win!");
    }
    
    /**
     * 
     */
    public function test_round_result_defeat(): void
    {
        $this->player->addDefeat();
        $result = $this->player->roundResult();
        $this->assertEquals($result,"Luis Eduardo Defeat!");
    }

    /**
     * 
     */
    public function test_round_result_draw(): void
    {
        $this->player->addDraw();
        $result = $this->player->roundResult();
        $this->assertEquals($result,"Luis Eduardo Draw!");
    }
}
