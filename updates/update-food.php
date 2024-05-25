<?php 

    include "../DBConnector.php";

    $food_ID = $_POST["food_ID"];
    $food_name = $_POST["new_food_name"];
    $price = $_POST["new_price"];
    $stock = $_POST["new_stock"];

    
    $food_exists_qry = "SELECT * FROM menu WHERE food_name='$food_name';";
    $food_exists = $conn->query( $food_exists_qry)->fetch_assoc();
    if($food_exists && $food_ID != $food_exists['food_ID']){
        echo "<script>alert('Food name already exists!')</script>";
    }else{
        $food_update_qry = "UPDATE menu SET food_name='$food_name', price='$price', stock='$stock' WHERE food_ID = $food_ID;";
        $conn->query($food_update_qry);
    }

    header("refresh: 1;url=../views/manage-menu-view.php");
?>