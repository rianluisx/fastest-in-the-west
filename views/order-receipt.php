<?php 

    include '../DBConnector.php';
    include 'render-receipt.php';


    $orderID = $_POST['order_ID'];
    $orderArray = array();
    $orderQuery = "SELECT * FROM order_details WHERE order_ID = '$orderID';";
    $orders = $conn->query($orderQuery);
    while ($order = $orders->fetch_assoc()) {
        $orderArray[$order['food_ID']] = $order['quantity'];
    }


    renderReceipt($orderArray, $conn);
    
    echo "<script>
            function goBack() {
                window.location.href = 'manage-order-view.php';
            }
        </script>";

    $conn->close();

?>