<?php

class Cards
{
    // Suits of Cards
    private $suits = ['♦', '♣', '♥', '♠'];

    // Pips
    private $pips = ['A', '2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K'];

    // Deck of Cards
    private $deck_of_cards = [];

    /**
     * Class constructor
     *
     * @return
     */
    public function __construct() {
        // Deck of Cards (Suites x Pipes)
        foreach ($this->pips as $index => $pip) {
            foreach($this->suits as $suit) {
                $this->deck_of_cards[] = [
                    'card' => '[' . $suit . $pip . ']',
                    'numeric_value' => ($index + 1),
                    'suit' => $suit,
                    'pip' => $pip
                ];
            }
        }

        // Shuffle cards
        if ( ! shuffle($this->deck_of_cards)) {
            throw new Exception('There was an error while shuffling the cards, try again!');
        }
    }

    /**
     * Returns the full deck of cards
     *
     * @return  array   Deck of Cards
     */
    public function get_deck_of_cards() {
        return $this->deck_of_cards;
    }

    /**
     * Takes 5 cards from the deck of cards
     *
     * @return  array   Cards removed from the deck
     */
    public function take_cards() {
        return array_splice($this->deck_of_cards, 0, 5);
    }

    /**
     * Play first card from the deck
     *
     * @return  array   First card played
     */
    public function play_first_card() {
        return current(array_splice($this->deck_of_cards, 0, 1));
    }
}
