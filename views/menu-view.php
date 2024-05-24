<?php 

    include '../DBConnector.php';

    $menuQuery = "SELECT * FROM menu";
    $menuResult = $conn->query($menuQuery);

    if ($menuResult->num_rows > 0) {

    
        while ($row = $menuResult->fetch_assoc()) {

            echo "<link rel='stylesheet' href='../css/cards.css'> ";
            echo "<link rel='stylesheet' href='../css/style.css'>";
            echo "<link rel='stylesheet' href='../css/buttons.css'>";

            echo "<div class='cards-container'>" .
                "<div class='cards'>" .

                    "<form action='food-view.php' method='post'>" .
                        "<input type='image' class='center' src='" . $row['food_image'] . "' alt='" . $row['food_name'] . "'>" .
                        "<input type='hidden' name='food_id' value='" . $row['food_ID'] . "'>" .
                    "</form>" .

                    "<div class='container'>" .
                        "<h4><b>" . $row["food_name"] . "</b></h4>" .
                    "</div>" .
                    
                "</div>" .
                "<br>" .
            "</div>";

        }


    }

?>