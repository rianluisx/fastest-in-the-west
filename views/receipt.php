<?php 

    session_start();
    include '../DBConnector.php';

    if (!isset($_SESSION['orders']) || empty($_SESSION['orders'])) {
        echo "<script>alert('No orders placed yet'); window.location.href = 'menu-view.php';</script>";
        exit();
    }

    echo "<link rel='stylesheet' href='../css/cards.css'> ";
    echo "<link rel='stylesheet' href='../css/style.css'>";
    echo "<link rel='stylesheet' href='../css/table-view.css'>";
    echo "<link rel='stylesheet' href='../css/buttons.css'>";

    echo "<div class='receipt-container'>";
        echo "<h1 style='text-align: center; padding-top: 10px;'>Order Receipt</h1>";
        echo "<br>";

        $totalAmount = 0;

        echo "<table>";
    
        echo "<tr>
                <th>Food Item</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Total</th>
            </tr>";


        foreach ($_SESSION['orders'] as $food_ID => $quantity) {
            
            $foodQuery = "SELECT food_name, price FROM menu WHERE food_ID = $food_ID";
            $result = $conn->query($foodQuery);

            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();
                $foodName = $row['food_name'];
                $price = $row['price'];
                $totalPrice = $price * $quantity;
                $totalAmount += $totalPrice;

                echo "<tr>";
                    echo "<td>" . $foodName . "</td>";
                    echo "<td>" . $quantity . "</td>";
                    echo "<td>$" . number_format($price, 2) . "</td>";
                    echo "<td>$" . number_format($totalPrice, 2) . "</td>";
                echo "</tr>";
            }
        }

        echo "<tr>";
            echo "<td colspan='3' style='text-align:right;'><b>Total Amount</b></td>";
            echo "<td><b>$" . number_format($totalAmount, 2) . "</b></td>";
        echo "</tr>";

        echo "</table>";
        echo "<div style='text-align: center; margin-top: 20px;'>";
        echo "<button onclick='goBack()' class='go-back'>Go Back</button>";
        echo "</div>";

    echo "</div>";

    echo "<script>
            function goBack() {
                window.location.href = 'menu-view.php';
            }
        </script>";

    $conn->close();












    




?>