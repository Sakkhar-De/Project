<?php
 function display_players_from_match($match)
   {
      $con=mysqli_connect("localhost", "root", "") or
        die("Could not connect: " . mysqli_error());
      mysqli_select_db($con,"GamerZone");

    $result = mysqli_query($con,"SELECT username FROM $match");

    while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
       echo "<br>";
       printf ("Name: %s " ,$row["username"]);
    }

    mysqli_free_result($result);
}
?>