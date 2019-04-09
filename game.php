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
if ($number_of_players < 1 OR $number_of_players > 6) {
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

// Shuffle cards
if ( ! shuffle($deck_of_cards)) {
    echo "There was an error while shuffling the cards, try again!\n";
    exit;
}

// Give cards to players
foreach($players as &$player) {
    // Take 5 from deck
    $player['cards'] = array_splice($deck_of_cards, 0, 5);

    // Calc total for given cards
    $player['card_total'] = array_reduce($player['cards'], function($carry, $item) {
        $carry += $item['numeric_value'];
        return $carry;
    });

    // Sort cards
    uasort($player['cards'], function($card_a, $card_b) {
        if ($card_a['numeric_value'] == $card_b['numeric_value'])
            return 0;

        return ($card_a['numeric_value'] < $card_b['numeric_value']) ? 1 : -1;
    });
}

// Determine player order
uasort($players, function($player_a, $player_b) {
    if ($player_a['numeric_value'] == $player_b['numeric_value'])
        return 0;

    return ($player_a['numeric_value'] < $player_b['numeric_value']) ? -1 : 1;
});

// Main Game Control
while (($command = readline("Enter your option or enter 'q' to quit: ")) !== 'q') {
    echo "Command is {$command}\n";
}

echo "Thanks for playing, good bye!\n";
