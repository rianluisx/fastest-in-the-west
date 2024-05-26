<?php 

    include '../DBConnector.php';


    $order_ID = $_POST['order_ID'];
    $customer_ID = $_POST['customer_ID'];
    $deleteOrderQuery = "DELETE FROM orders WHERE order_ID = '$order_ID';";
    $conn->query($deleteOrderQuery);
    $deleteCustomerQuery = "DELETE FROM customer WHERE customer_ID = '$customer_ID';";
    $conn->query($deleteCustomerQuery);
    $deleteDetailsQuery = "DELETE FROM order_details WHERE order_ID = '$order_ID';";
    $conn->query($deleteDetailsQuery);

    $conn->close();
    header("Location: ../views/manage-order-view.php");
?>