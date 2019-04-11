<?php

use PHPUnit\Framework\TestCase;

final class GameHelperTest extends TestCase
{
    public function testHandlesInvalidParameter()
    {
        $this->expectException(TypeError::class);

        GameHelper::decide_who_goes_first('invalid');
    }

    public function testHandlesNoPlayersInArray()
    {
        $this->expectException(Exception::class);

        GameHelper::decide_who_goes_first([]);
    }

    public function testPickCorrectPlayerSingle()
    {
        $players = [
            [
                'number' => 'p1',
                'card_total' => 43
            ],
            [
                'number' => 'p2',
                'card_total' => 15
            ],
            [
                'number' => 'p3',
                'card_total' => 65
            ],
            [
                'number' => 'p4',
                'card_total' => 15
            ]
        ];
        $this->assertEquals(
            'p3',
            GameHelper::decide_who_goes_first($players)
        );
    }

    public function testPickCorrectPlayerFromGroup()
    {
        $players = [
            [
                'number' => 'p1',
                'card_total' => 43
            ],
            [
                'number' => 'p2',
                'card_total' => 15
            ],
            [
                'number' => 'p3',
                'card_total' => 43
            ],
            [
                'number' => 'p4',
                'card_total' => 15
            ],
            [
                'number' => 'p5',
                'card_total' => 24
            ],
            [
                'number' => 'p6',
                'card_total' => 43
            ]
        ];

        $selected_players = ['p1', 'p3', 'p6'];

        $picked_player = GameHelper::decide_who_goes_first($players);

        $this->assertContains($picked_player, $selected_players);
    }
}
