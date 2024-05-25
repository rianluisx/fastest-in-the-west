<?php 
    session_start();
    include "../DBConnector.php";

    $food_ID = $_POST["food_ID"];
    $order_quantity = $_POST["quantity"];

    $new_order = array("food_ID" => $food_ID, "quantity"=> $order_quantity);
    
    if(isset($_SESSION['orders'])){
        $_SESSION['orders'][$food_ID] = $order_quantity;
        echo "<script>
            var orderAgain = confirm('Order placed successfully! Would you like to order again?');
            if (orderAgain) {
                window.location.href = '../views/menu-view.php';
            } else {
                window.location.href = '../src/index.php';
            }

        </script>";
    }else{
        echo "<script>
            Error occured with appending order
        </script>";
    }

    
?>
