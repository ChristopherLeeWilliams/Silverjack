
<?php

  $cardsArr = []; // should hold 52 card "objects"
  initializeCards($cardsArr);

  
  // Test:
  printArray($cardsArr);

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


<!DOCTYPE html>
<html>
    <link rel="stylesheet" type="text/css"  href="/Labs/Lab3/CSS/LAB3.css">
    
    <head>
        
        <title> LAB 3: PHP Arrays</title>
    </head>

    
    <body>

    </body>
</html>