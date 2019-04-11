<?php

class GameHelper
{
    /**
     * This function decides which players goes first
     *
     * @param   array   $players    Array of Players
     * @return  integer             The player number
     */
    public static function decide_who_goes_first(array $players) {

        if (count($players) == 0) {
            throw new Exception('Provided array does not have any players');
        }

        // We sort players by their card total, desc
        array_multisort(array_column($players, 'card_total'), SORT_DESC, $players);

        // We now group players by their card total
        $players_by_totals = [];
        foreach($players as $player) {
            $players_by_totals[$player['card_total']][] = $player['number'];
        }

        // Players grouped in the first element of the array are the
        // ones with the greatest total
        $selected_players = reset($players_by_totals);

        // If there is only one player with the greatest total,
        // return that player
        if (count($selected_players) == 1) {
            return current($selected_players);
        }
        else {
            // if not, shuffle the group of players
            // and return the first player in the array
            shuffle($selected_players);
            return current($selected_players);
        }
    }
}
