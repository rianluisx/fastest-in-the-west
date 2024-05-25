<?php

function renderReceipt($order_array, $conn){

    echo "<link rel='stylesheet' href='../css/cards.css'> ";
    echo "<link rel='stylesheet' href='../css/style.css'>";
    echo "<link rel='stylesheet' href='../css/buttons.css'>";

    echo "<h1 style='text-align: center; padding-top: 10px;'> Order Receipt </h1><br><br>";

        $totalAmount = 0;

        foreach ($order_array as $food_ID => $quantity) {
            if ($quantity > 0) {
                $foodQuery = "SELECT food_name, price, food_image FROM menu WHERE food_ID = $food_ID";
                $result = $conn->query($foodQuery);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $foodName = $row['food_name'];
                    $price = $row['price'];
                    $foodImage = $row['food_image'];
                    $totalPrice = $price * $quantity;
                    $totalAmount += $totalPrice;

                    echo "<div class='cards'>";
                        echo "<img src='$foodImage' alt='$foodName' class='center'>";
                        echo "<div class='container'>";
                            echo "<h4><b>$foodName</b></h4>";
                            echo "<p>Quantity: $quantity</p>";
                            echo "<p>Price: $" . number_format($price, 2) . "</p>";
                            echo "<p>Total: $" . number_format($totalPrice, 2) . "</p>";
                        echo "</div>";
                    echo "</div>" . "<br> ";
                }
            }
        }
        
        echo "<div class='total-amount'>
                <p>Total Amount: $" . number_format($totalAmount, 2) . "</p>" .
            "</div>";


        echo "<div class='go-back'>
                <button onclick='goBack()' >Go Back</button>
            </div>";



        echo "<script>
                function goBack(){
                    window.history.back();
                }
            </script>";
}

?>


