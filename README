## Objective

We would like you to develop a game simulation based on the rules below. Although desired, the end result does not need to be a fully working application, but we would like to see how you approach the problem even if the result is not fully functional.

How you build the application is up to you, however:
- The code should be in PHP (either plain or with a framework of your choice)
- It can be command-line based or via a simple web interface.
- A git log should be provided to show how your code evolves.
- Code comments are desired.
- Optionally it can include tests and documentation.

We suggest spending no longer than six to eight hours.

## Rules

* Take a deck of 52 cards (Ace to King, four suits, no jokers) and shuffle
* Give five cards to each player (up to six players). The remaining cards become the *drawing stack*
* To determine the player order, count each players cards and sort from highest to lowest. For example, if a player holds Ace, Two, Five, Seven, Nine, their total is 24. If there are conflicts, then randomly select who goes first in the conflicting group
* Reveal one card from the drawing stack. This is the *played stack*
* Each player can play a card if one of their cards matches the topmost card in the played stack either by suit or by value - for example, if the top-most card is a 7 of hearts, the player can play any suit with a value of 7, or any card with a suit of hearts.
* If the player does not have any cards that can be played, they must take a card from the drawing stack
* The game loops until a player has zero cards (the game immediately ends and becomes the winner), or the drawable stack is empty and no cards can be played by any player (an impossible game)

