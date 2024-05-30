<?php 
    session_start();
    include "../DBConnector.php";

    $foodID = $_POST["food_ID"];
    $orderQuantity = $_POST["quantity"];

    $newOrder = array("food_ID" => $foodID, "quantity"=> $orderQuantity);
    
    if(isset($_SESSION['orders'])){

        if ($orderQuantity > 0){
            $_SESSION['orders'][$foodID] = $orderQuantity;
        } else {
            unset($_SESSION['orders'][$foodID]);
        }
        header('Location: ../views/menu-view.php');
        exit();
    }else{
        echo "<script>
            Error occured with appending order
        </script>";
    }

    
?>
