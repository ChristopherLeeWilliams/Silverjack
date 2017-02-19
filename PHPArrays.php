<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css"  href="/Labs/Lab3/CSS/LAB3.css">
    <head>
        <title> LAB 3: PHP Arrays</title>
    </head>
    <body>
        <h1>Silverjack</h1>
        <?php
  /*
    1) Each player gets the "right amount" of cards to get close to 42 (20pts)
    2) The cards are not duplicated (15pts)
    3) The total points per player is displayed properly (15pts)
    4) The winner(s) is(are) displayed properly with the earned points (15pts)
    5) Players pictures are displayed RANDOMLY (10pts)
    6) Your contribution in GitHub is similar to your teammates (15pts)
    7) There is an external CSS file with 10 rules (10pts)
  */
 
 /* 
  class Player {
      var $name;
      var $points;
      var $totalCards;
      var $cards = array();
      
      public function __construct($name) {
        $this->name = $name;
        $this->points = 0;
        $this->totalCards = 0;
        $this->cards = [];
    }
      
      function getName() {
          return $this->name;
      }
      
      function getPoints() {
          return $this->points;
      }
      
      // Assigns a player 4-6 random cards
      function assignCards(&$cardsArr, &$usedCards) {
          // Each player gets 4 to 6 cards, randomly
          $totalCards = rand(4, 6);
          
          // Choose cards
          for ($i = 0; $i < $totalCards; $i++)
          {
              $newCard = pickCard($cardsArr, $usedCards);
              $this->cards[] = $newCard;
              printCard($newCard);
          }
      }
      
      // Sums up the values of the cards in hand
      function countPoints() {
          for ($i = 0; $i < $totalCards; $i++)
          {
              $this->points += $cards[$i]["value"];
          }
      }
  }
  */
  
  $cardsArr = []; // should hold 52 card "objects"
  $usedCards = []; // Holds cards that have already been picked
  $players = [];
  initializeCards($cardsArr);
  for ($i = 0; $i < 4; $i++) {
      
  }
  $players["name"] = array(0 => 'Bob', 1 => 'Bill');
  echo $players[0]["name"];
  
  // Test:
  printArray($cardsArr);
  /*for ($i = 0; $i < 51; $i++)
  {
    $card1 = pickCard($cardsArr, $usedCards);
    printCard($card1);
  }*/

 function initializeCards(&$cards) {
  $i;
  $j;
  $cardInd = 0;

    for ($j=1; $j<=4;++$j) {
        for ($i = 1; $i <= 13; ++$i) {
            $card = [];
            $card["value"] = $i;
            switch ($j) {
                case 1:
                    $card["suit"] = "clubs";
                    $card["bgImage"] = "/Labs/Lab3/cards/clubs/".$i.".png";
                    break;
                case 2:
                    $card["suit"] = "diamonds";
                    $card["bgImage"] = "/Labs/Lab3/cards/diamonds/".$i.".png";
                    break;
                case 3:
                    $card["suit"] = "hearts";
                    $card["bgImage"] = "/Labs/Lab3/cards/hearts/".$i.".png";
                    break;
                case 4:
                    $card["suit"] = "spades";
                    $card["bgImage"] = "/Labs/Lab3/cards/spades/".$i.".png";
                    break;
                default:
                    break;
            }
                $cards[$cardInd] = $card;
                //echo $cards[$cardInd]["value"]." ". $cards[$cardInd]["suit"]." ".$cards[$cardInd]["bgImage"].'<br>';
                $cardInd += 1;
        }
    }
 }
 
 // Returns a random card and removes it from the deck
 // Needs to take the deck to return a card from it
 // Needs to take usedCards to modify the array
 function pickCard(&$deck, &$usedCards) {
     
    $chosenCard = rand(0, 51);
    for ($i = 0; $i < count($usedCards); $i++) {
        
        // If the chosen card was already removed,
        // choose another and loop through again
         if ($chosenCard == $usedCards[$i]) {
             $chosenCard = rand(0, 51);
             $i = 0;
         }
     }
     
     // Return the random card and remove it from the deck
     $usedCards[] = $chosenCard;
     return $deck[$chosenCard];
 }
 
 // Prints an individual card
 function printCard($card) {
     echo $card["value"]." ". $card["suit"]." ".$card["bgImage"].'<br>';
 }
 
 function printArray($cards) {
        $tmp;
        echo '<div class = "suit">';
        for($tmp = 0; $tmp<13;$tmp++) {
            echo '<div class = "card" style="background-image: url('. $cards[$tmp]["bgImage"].')";> </div>';
        }
        echo '</div>';
        
        
        echo '<div class = "suit">';
        for($tmp = 13; $tmp<26;$tmp++) {
            echo '<div class = "card" style="background-image: url('. $cards[$tmp]["bgImage"].')";> </div>';
        }
        echo '</div>';
        
        echo '<div class = "suit">';
        for($tmp = 26; $tmp<39;$tmp++) {
            echo '<div class = "card" style="background-image: url('. $cards[$tmp]["bgImage"].')";> </div>';
        }
        echo '</div>';
        
        echo '<div class = "suit">';
        for($tmp = 39; $tmp<52;$tmp++) {
            echo '<div class = "card" style="background-image: url('. $cards[$tmp]["bgImage"].')";> </div>';
        }
        echo '</div>';
 }
  
?>

    </body>
</html>