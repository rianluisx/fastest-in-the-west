<?php 

    include '../DBConnector.php';


    $orderID = $_POST['order_ID'];
    $customerID = $_POST['customer_ID'];
    $deleteOrder = "DELETE FROM orders WHERE order_ID = '$orderID';";
    $conn->query($deleteOrder);
    $deleteCustomer = "DELETE FROM customer WHERE customer_ID = '$customerID';";
    $conn->query($deleteCustomer);
    $deleteDetails = "DELETE FROM order_details WHERE order_ID = '$orderID';";
    $conn->query($deleteDetails);

    $conn->close();
    header("Location: ../views/manage-order-view.php");
?>