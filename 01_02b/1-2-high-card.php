<?php
  //Assume Ace is high card.
  $values = ['2', '3', '4', '5', '6', '7', '8', '9', '10', 'J', 'Q', 'K', 'A'];
  $suits = ['C', 'D', 'H', 'S'];// Clubs, Diamonds, Hearts, Spades

  /* 
  create a 2 player game, ex.: generate 2 cards
  determine which card is higher
  print who won
  */

  $p1CardValue = array_rand($values, 1);
  $p1CardSuit = array_rand($suits, 1);

  $p2CardValue = array_rand($values, 1);
  $p2CardSuit = array_rand($suits, 1);

  echo "Player 1 card: " . $values[$p1CardValue] . $suits[$p1CardSuit];
  echo "<br>";
  echo "Player 2 card: " . $values[$p2CardValue] . $suits[$p2CardSuit];
  echo "<br>";

  if ($p1CardValue > $p2CardValue) {
    echo "Player 1 wins!";
  } else if ($p1CardValue < $p2CardValue) {
    echo "Player 2 wins!";
  } else {
    echo "It's a draw!";
  }