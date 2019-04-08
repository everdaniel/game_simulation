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


// Welcome Message
echo "Welcome to this Card Game Simulation!\n";
echo str_repeat('=', 37) . "\n";

// Ask the user how many players
$number_of_players = readline('Enter number of players [1 to 6]: ');
if ( ! is_numeric($number_of_players)) {
    echo $number_of_players . " is a not valid number, please enter a value between 1 and 6, try again!\n";
    exit;
}

// Validate min/max number of players
if ($number_of_players < 1 OR $number_of_players > 5) {
    echo "Game only allows up to 6 players, you entered {$number_of_players}, try again!\n";
    exit;
}

// "Create" players
$players = [];
for ($player = 1; $player <= $number_of_players; $player++) {
    $players[] = [
        'name' => 'Player ' . $player,
        'cards' => []
    ];
}

// Main Game Control
while (($command = readline("Enter your option or enter 'q' to quit: ")) !== 'q') {
    echo "Command is {$command}\n";
}

echo "Thanks for playing, good bye!\n";
