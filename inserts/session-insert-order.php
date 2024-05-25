<?php 
    session_start();
    include "../DBConnector.php";

    $food_ID = $_POST["food_ID"];
    $order_quantity = $_POST["quantity"];

    $new_order = array("food_ID" => $food_ID, "quantity"=> $order_quantity);
    
    if(isset($_SESSION['orders'])){

        if ($order_quantity > 0){
            $_SESSION['orders'][$food_ID] = $order_quantity;
        } else {
            unset($_SESSION['orders'][$food_ID]);
        }
        header('Location: ../views/menu-view.php');
        exit();
    }else{
        echo "<script>
            Error occured with appending order
        </script>";
    }

    
?>
