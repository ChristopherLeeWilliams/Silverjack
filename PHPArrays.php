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
  
    // Array containing player names
    $names = array('Player 1','Player 2','Player 3','Player 4');
    
    $cardsArr = []; // should hold 52 card "objects"
    $usedCards = []; // Holds cards that have already been picked
    $players = [];  // Holds the game's players
    
    initializeCards($cardsArr);
    initializePlayers($players, $names, $cardsArr);
  
  // Test:
  //printArray($cardsArr);
  /*for ($i = 0; $i < 51; $i++)
  {
    $card1 = pickCard($cardsArr, $usedCards);
    printCard($card1);
  }*/

 // Assigns all cards a point value and an image
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
 
 // Defines and names the player, assigns cards, totals points, and determines winner(s)
function initializePlayers(&$players, $names, $cardsArr) {
    
    $userImages = array(false,false,false,false,false,false);
    for ($i = 0; $i < 4; $i++) {
        
        // Assign basic player information
        $player = [];
        $player["name"] = $names[$i];
        $player["points"] = 0;
        $player["winner"] = 0;
        //$player["bgImage"] =  "/Labs/Lab3/players/".rand(1,6).".png";
        $player["bgImage"] = "/Labs/Lab3/players/".getUserImageIndex($userImages).".png";
        $totalCards = 0;
        
  
        // Draw cards, count points, and print each card
        // Each player can draw up to 6 cards, but stops if they exceed 41 points
        $cards = [];
        $points = 0;
        for ($j = 0; $j < 6; $j++) {
          $newCard = pickCard($cardsArr, $usedCards);
          $cards[] = $newCard;
          $points += $newCard["value"];
          $totalCards++;
          
          if ($points >= 42) {
              break;
          }
        }
        
        // Assign hand and total points to the player
        $player["totalCards"] = $totalCards;
        $player["cards"] = $cards;
        $player["points"] = $points;
        
         
        // Adds player to array
        $players[$i] = $player;
        
        //echo "Name: " . $players[$i]["name"];
        //echo ', Points: ' . $players[$i]["points"] . '<br><br>';
    }
    
    // Determines winner(s)
    determineWinner($players);
    
    // Prints the player's information
    for ($i = 0; $i < 4; $i++) {
        printHand($cards, $totalCards, $players[$i]["name"], $players[$i]["points"], $players[$i]["bgImage"], $players[$i]["winner"]);
    }
}

 // Returns the index value of the player's display picture
 function getUserImageIndex(&$userImages) {
    // check to make sure all the values aren't taken
    $allTaken = true;
    for ($i = 0; $i < 6; $i++) { $allTaken = $allTaken && ($userImages[$i] == true); }
    
    if (!$allTaken) {
        $value = rand(0,5);
        while ($userImages[$value]) { $value = rand(0,5); } // if the value is taken (true at index), get a new one
        $userImages[$value] = true;
        //echo "Background index: " . $value;
        return $value+1;
    }
    //echo "All taken, -1 returned";
    return -1;
 }
 
  // Determines which player won the game
 function determineWinner(&$players) {
     $maxPoints = 0;
     $winner = [];
     
     // Loop through each player and determine if their points are greater than
     // or equal to the old max, and that that value is 42 or less
     for ($i = 0; $i < 4; $i++) {
         if (($players[$i]["points"] >= $maxPoints) && ($players[$i]["points"] < 43))  {
             $maxPoints = $players[$i]["points"];
         }
     }
     
     // Adds winner(s) to the winner array (Handles ties)
     for ($i = 0; $i < 4; $i++) {
         if ($players[$i]["points"] == $maxPoints) {
             $winner[] = $players[$i];
         }
     }
     
     // Handle the case where nobody wins
     if (count($winner) == 0) {
         echo "Everyone went over 42. Nobody wins!";
     }
     
     // Flags out the winner(s)
     for ($i = 0; $i < count($winner); $i++) {
         // echo $winner[$i]["name"] . " wins with " . $maxPoints ." points!<br>";
         
         for ($j = 0; $j < 4; $j++)
         {
             if ($winner[$i]["name"] == $players[$j]["name"]) {
                 $players[$j]["winner"] = true;
             }
         }
     }
 }
 
 // Returns a random card and removes it from the deck
 // Needs to take the deck to return a card from it
 // Needs to take usedCards to modify the array
 function pickCard($deck, &$usedCards) {
     
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
     // echo $card["value"]." ". $card["suit"]." ".$card["bgImage"].'<br>';
     echo '<div class = "card" style="background-image: url('. $card["bgImage"].')";> </div>';
 }
 
 // Prints a player's hand horizontally
 function printHand($cards, $totalCards, $playerName, $playerScore, $playerBGImage, $winner) {
    echo '<div class = "suit">';
    echo '<div class = "card" style="background-image: url('. $playerBGImage.')";> </div>';
    echo '<div class = "card"></div>';
    
    // Prints real cards
    for ($i = 0; $i < $totalCards; $i++) {
        printCard($cards[$i]);
     }
     
     // Prints empty cards
     for ($i = 0; $i < ((6-$totalCards) +1); $i++) {
        echo '<div class = "card"> </div>';
     }
     
     // Prints player status
     echo '<div class = "card">'. $playerName.'</div>';
     echo '<div class = "card"> Score: '.$playerScore.'</div>';
     
     if ($winner == true) {
           echo '<div class = "card">' . '<b>Winner!</b>'. '</div>';
     }
     
     echo '</div>';
 }
 
 // Test method to print out all the cards
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