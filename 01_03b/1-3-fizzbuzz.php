<?php
/*CHALLENGE:
Print numbers 1 to 100 (inclusive), while making important substitutions.

REQUIREMENTS:
1. Replace all multiples of 3 with the word "Fizz."
2. Replace all multiples of 5 with the word "Buzz."
3. Replace any numbers that are multiples of 3 and 5 with
the word "FizzBuzz."
*/

for ($i=1; $i <= 100; $i++) {
  if ($i % 3 == 0 && $i % 5 == 0) {
    echo "FizzBuzz.";
  } else if ($i % 3 == 0) {
    echo "Fizz.";
  } else if ($i % 5 == 0) {
    echo "Buzz.";
  } else {
    echo $i;
  }

  echo "<br>";
}