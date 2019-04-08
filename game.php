<?php

/**
 * Additional reference used for this script:
 * Playing Card Suit: https://en.wikipedia.org/wiki/Playing_card_suit
 * Cards Visual Reference: http://www.milefoot.com/math/discrete/counting/images/cards.png
 */

// Suits of Cards
$suits = ['♦', '♣', '♥', '♠'];

// Pips
$pips = ['A', '2', '3', '4', '5', '6', '7', '8', '9', 'T', 'J', 'Q', 'K'];

// Deck of Cards (Suites x Pipes)
$deck_of_cards = [];
foreach ($pips as $index => $pip) {
    foreach($suits as $suit) {
        $deck_of_cards[] = [
            'card' => '[' . $suit . $pip . ']',
            'numeric_value' => ($index + 1),
            'suit' => $suit,
            'pip' => $pip
        ];
    }
}

// Main Game Control
while (($command = readline("Enter your option or enter 'q' to quit: ")) !== 'q') {
    echo "Command is {$command}\n";
}

echo "Thanks for playing, good bye!\n";
