<?php 
    session_start();
    include '../DBConnector.php';

    if(!isset($_SESSION['customer_name'])){
        $_SESSION['customer_name'] = $_POST['customer_name'];
    }
    
    if(!isset($_SESSION['customer_address'])){
        $_SESSION['customer_address'] = $_POST['customer_address'];
    }

    if(!isset($_SESSION['orders'])){
        $_SESSION['orders'] = array();
    }

    if(!isset($_SESSION['order_ID'])){
        $new_order_ID_qry = "SELECT MAX('order_ID') AS last_ID FROM orders"; 
        $order_ID = $conn->query($new_order_ID_qry)->fetch_assoc()['last_ID'] ?? 0;
        $_SESSION['order_ID'] = $order_ID;
    }
    header("refresh: 0.5; url=../views/menu-view.php");
?>