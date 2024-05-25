<?php 
    session_start();
    include '../DBConnector.php';
    echo "HAHA";
    if(!isset($_SESSION['customer_name']) && !isset($_SESSION['customer_address'])){
        $_SESSION['customer_name'] = $_POST['customer_name'];
        $_SESSION['customer_address'] = $_POST['customer_address'];
    }
    $customerName = $_SESSION['customer_name'];
    $customerAddress = $_SESSION['customer_address'];
    $insertCustomer = "INSERT INTO customer (customer_name, customer_address) VALUES ('$customerName', '$customerAddress')";
    if ($conn->query($insertCustomer) === TRUE) {
        $_SESSION["customer_ID"] = $conn->insert_id;
        header("refresh: 1; url=../views/menu-view.php");
    }
?>