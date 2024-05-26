<?php 

    include '../DBConnector.php';
    $menuQuery = "SELECT * FROM menu";
    $menuResult = $conn->query($menuQuery);

    echo "<link rel='stylesheet' href='../css/cards.css'> ";
    echo "<link rel='stylesheet' href='../css/style.css'>";
    echo "<link rel='stylesheet' href='../css/buttons.css'>";

    echo "<h3 class='update'> Manage Inventory </h3><br>";

    while ($row = $menuResult->fetch_assoc()) {

        echo "<div class='cards-manager'>";
            echo "<img class='img-manager' src='".$row['food_image']."'>";
            echo "<h3 class='food-name'>". $row['food_name'] . ", $" . $row['price'] . "</h3>";
            echo "<p class='stock'> Remaining: " . $row['stock'] . "</p>";

            echo "<form action='update-food-view.php' method='post' class='manage'>
                <input type='hidden' name='food_ID' value=" . $row['food_ID'] . ">
                <button type='submit'>Edit Item</button>
            </form>";

        echo "</div> <br>";
    }

    echo "<div class ='form-container'>" .
            "<form action='add-food-view.php' method='post'>
                <button type='submit'>Add</button>
            </form>" .
            "<form action='../src/index.php' method='post'>
                <button type='submit'>Return</button>
            </form> ".
        "</div>";
?>