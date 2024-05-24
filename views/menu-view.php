<?php 

    include '../DBConnector.php';

    $getItems = "SELECT * from menu";
    $result = $conn->query($getItems);
    if ($result->num_rows > 0) {

        while ($row = $result->fetch_assoc()) {

            echo "<link rel='stylesheet' href='../css/cards.css'>";

            echo "<div class ='menu-card'>";
               
            
                echo "<img src = ' ". $row["food_image"] . "' alt = ' ". $row["food_name"] . "' >";
                echo $row["food_name"];



            echo "</div>";



        }
    } else {

    }


    



?>