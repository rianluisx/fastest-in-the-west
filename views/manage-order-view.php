<?php 

    include '../DBConnector.php';
    $orderQuery = "SELECT * FROM orders";
    $orderResult = $conn->query($orderQuery);

    echo "<link rel='stylesheet' href='../css/table-view.css'>";
    echo "<h2>Inventory</h2><table><tr><th>Order ID</th><th>Customer Name</th><th>Customer Address</th><th>Total Price</th><th>Order Date</th><th>Action</th></tr>";

    while ($row = $orderResult->fetch_assoc()) {
        $customerQuery = "SELECT * FROM customer WHERE customer_ID = '".$row['customer_ID']."';";
        $customer = $conn->query($customerQuery)->fetch_assoc();
        $totalPriceQuery = "SELECT SUM(order_price) AS total_price FROM order_details WHERE order_ID = '".$row['order_ID']."';";
        $totalPrice = $conn->query($totalPriceQuery)->fetch_assoc()['total_price'];
        echo "<tr>
                <td>".$row['order_ID']."</td>
                <td>".$customer['customer_name']."</td>
                <td>".$customer['customer_address']."</td>
                <td>".$totalPrice."</td>
                <td>".$row['order_date']."</td>
                <td>
                    <form action='order-receipt.php' method='post'>
                        <input type='hidden' name='order_ID' value=" . $row['order_ID'] . ">
                        <input type='hidden' name='customer_ID' value=" . $row['customer_ID'] . ">
                        <button type='submit'>View Receipt</button>
                    </form>
                    <form action='.php' method='post'>
                        <input type='hidden' name='order_ID' value=" . $row['order_ID'] . ">
                        <input type='hidden' name='customer_ID' value=" . $row['customer_ID'] . ">
                        <button type='submit'>Send Out</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
    echo "<div class='button-container'><form action='add-food-view.php' method='post'>
                <button type='submit' id='add-button'>Add</button>
        </form></div>
    ";
    




?>