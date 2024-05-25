<?php 

    include '../DBConnector.php';
    include 'render-receipt.php';


    $order_ID = $_POST['order_ID'];
    $order_array = array();
    $orderQuery = "SELECT * FROM order_details WHERE order_ID = '$order_ID';";
    $orders = $conn->query($orderQuery);
    while ($order = $orders->fetch_assoc()) {
        $order_array[$order['food_ID']] = $order['quantity'];
    }


    renderReceipt($order_array, $conn);
    
    echo "<script>
            function goBack() {
                window.location.href = 'manage-order-view.php';
            }
        </script>";

    $conn->close();

?>