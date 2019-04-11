<?php

/**
 * Additional reference used for this script:
 * Playing Card Suit: https://en.wikipedia.org/wiki/Playing_card_suit
 * Cards Visual Reference: http://www.milefoot.com/math/discrete/counting/images/cards.png
 */

require_once 'vendor/autoload.php';

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
$number_of_players = readline('Enter number of players [2 to 6]: ');
if ( ! is_numeric($number_of_players)) {
    echo $number_of_players . " is a not valid number, please enter a value between 2 and 6, try again!\n";
    exit;
}

// Validate min/max number of players
if ($number_of_players < 2 OR $number_of_players > 6) {
    echo "Game only allows up to 6 players, you entered {$number_of_players}, try again!\n";
    exit;
}

echo "{$number_of_players} players on the game\n\n";

// "Create" players
$players = [];
for ($player_number = 1; $player_number <= $number_of_players; $player_number++) {
    $players[] = [
        'name' => 'Player ' . $player_number,
        'number' => 'p' . $player_number,
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

    // Sort cards by numeric value, desc
    array_multisort(array_column($player['cards'], 'numeric_value'), SORT_DESC, $player['cards']);
}

// Assign main player
$main_player = $players[0];
echo "You are playing as " . $main_player['name'] . "\n";

// Pick first player
$first_player_number = GameHelper::decide_who_goes_first($players);
$player_position = array_search($first_player_number, array_column($players, 'number'));
$first_player = $players[$player_position];
echo $first_player['name'] . " starts the game\n";

// Show cards to the main player
echo "\tYour cards are " . implode(' ', array_column($main_player['cards'], 'card')) . "\n";

// Play first card from deck of cards
$first_played_card = current(array_splice($deck_of_cards, 0, 1));
echo "First played card is " . $first_played_card['card'] . "\n";

// Main Game Control
while (($command = readline("Enter your option or enter 'q' to quit: ")) !== 'q') {
    echo "Command is {$command}\n";
}

echo "Thanks for playing, good bye!\n";
