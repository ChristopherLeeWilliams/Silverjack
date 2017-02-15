
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
  
  $cards = []; // should hold 52 card objects
  $card = [];  // holds value, suit, and background image
  $i;
  $temp;

    for ($i=0; $i<52;++$i) {
        //echo ($i%13) . '<br />';
        $card["value"] = (($i/13) + 1);
        $card["Suit"] = "clubs";
        //$card["bgImage"] = 
       /*
       if($condition == "parameter") {
           $value .= "<img src='path/to/img' alt='img' />";
       }

       unset($value);
       */
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