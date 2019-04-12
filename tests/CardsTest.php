<?php

use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_Constraint_IsType as PHPUnit_IsType;

final class CardsTest extends TestCase
{
    public function testFullDeckIsCreated()
    {
        $cards = new Cards();
        $this->assertEquals(52, count($cards->get_deck_of_cards()));
    }

    public function testVerifyCardsTakenFromDeck()
    {
        $cards = new Cards();
        $cards_taken = $cards->take_cards();
        $this->assertEquals(5, count($cards_taken));
        $this->assertEquals(47, count($cards->get_deck_of_cards()));
    }

    public function testVerifyFirstCardPlayed()
    {
        $cards = new Cards();
        $first_card_played = $cards->play_first_card();
        $this->assertInternalType(PHPUnit_IsType::TYPE_ARRAY, $first_card_played);
        $this->assertEquals(51, count($cards->get_deck_of_cards()));
    }
}
