
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
  
  $cards = []; // should hold 52 card "objects"
  //$card = [];  // holds value, suit, and background image
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
                    $card["bgImage"] = "/Labs/Lab3/cards/diamonds".$i.".png";
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
                echo $cards[$cardInd]["value"]." ". $cards[$cardInd]["suit"]." ".$cards[$cardInd]["bgImage"].'<br>';
                $cardInd += 1;
        }
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