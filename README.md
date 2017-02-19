# Silverjack
internet Programming Lab 3
 
 Instructions:
    1) Each player gets the "right amount" of cards to get close to 42 (20pts)
    2) The cards are not duplicated (15pts)
    3) The total points per player is displayed properly (15pts)
    4) The winner(s) is(are) displayed properly with the earned points (15pts)
    5) Players pictures are displayed RANDOMLY (10pts)
    6) Your contribution in GitHub is similar to your teammates (15pts)
    7) There is an external CSS file with 10 rules (10pts)
      
  To-Do:
    1) Make a pickCard function that gets passed the $cardsArr by memory (pass it with an ampersand (&))
            and returns a $card that has been removed from a randomly specified index from 1-52. $cardsArr
            should no longer contain the card after
    2) Create an associative array for a player, containing a "name" , "cardValue" , and maybe a "image" key?
            Im not entirely sure how the players are suposed to be generated and if they need an image, so use
            your best judgement. cardValue will have the sum of the values of the cards given to the player.
    3) Create indexed array to hold players
    4) Think of ways to determine how the turn cycles operate. For example ,since it is automated at what value should a 
            player stop drawing cards?
    5) More to come
    
  Done:
  1)  Made a pickCard function, but it does not remove from the main array. That creates problems when it comes to printing since
      we print a card based on its index. Instead, an array holds cards that have been created, and when another card is chosen
      the function checks to see if that card has been used.
  2)  Currently working on a Player class and it seems straightforward, but I'm not quite sure how to incorporate the image. Since
      only the image has to be random, how about we associate each name with an image, and we choose each player's name randomly?
      It'll be displayed in a random position (1-4), but the image itelf won't be random. Not sure if that's bad.
  4) No need for turn cycles, everyone just gets cards assigned immediately and everything happens simultaneously
    
     
