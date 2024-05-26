<?php 
include '../DBConnector.php';

$orderQuery = "SELECT * FROM orders";
$orderResult = $conn->query($orderQuery);

echo "<link rel='stylesheet' href='../css/cards.css'> ";
echo "<link rel='stylesheet' href='../css/style.css'>";
echo "<link rel='stylesheet' href='../css/buttons.css'>";

if ($orderResult->num_rows > 0) {
    echo "<h2 class='inventory'>Ongoing orders</h2>" .


    "<div class='cards-grid-container'>";

    while ($row = $orderResult->fetch_assoc()) {
        $customerQuery = "SELECT * FROM customer WHERE customer_ID = '".$row['customer_ID']."';";
        $customer = $conn->query($customerQuery)->fetch_assoc();
        $totalPriceQuery = "SELECT SUM(order_price) AS total_price FROM order_details WHERE order_ID = '".$row['order_ID']."';";
        $totalPrice = $conn->query($totalPriceQuery)->fetch_assoc()['total_price'];
        
        echo "<div class='cards-container'>" .
                "<div class='cards'>".
                    "<div class='order-info'>";

                        echo "<h1 class='orderID'>Order #" . $row['order_ID'] . "</h1>";
                        echo "<div class='order-details'>";
                        echo "<p class='customerName'>Customer: ". $customer['customer_name'] . "</p>";

                        if (!empty($customer['customer_address'])) {
                            echo "<p class='customerAdd'>Address: ". $customer['customer_address'] . "</p>";
                        } else {
                            echo "<p class='noAdd'> No address provided </p>";
                        }

                        echo "<p class='total'>Total: $". $totalPrice . "</p>" .
                            "<p class='date'>Time: ". $row['order_date']. "</p>";
            
                    echo "</div>" .

                    "<div class ='form-container'>".
                        "<form action='order-receipt.php' method='post'>
                            <input type='hidden' name='order_ID' value=" . $row['order_ID'] . ">
                            <button type='submit'>View Receipt</button>
                        </form>
                        <form action='../updates/send-out.php' method='post'>
                            <input type='hidden' name='order_ID' value=" . $row['order_ID'] . ">
                            <input type='hidden' name='customer_ID' value=" . $row['customer_ID'] . ">
                            <button type='submit'>Send Out</button>
                        </form>" .
                    "</div>".
                "</div>".
            "</div>".
         "</div>";

    }

    echo "</div>";


    echo "<div class='button-container'>
                <form action='../src/index.php' method='post'>
                    <button type='submit' class='wide-button'>Return</button>
                </form>
            </div>
    ";
} else {
    echo "<script>alert('No orders placed yet'); window.location.href = '../src/index.php';</script>";
    exit();
}
?>
