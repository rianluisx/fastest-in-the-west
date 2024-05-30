<?php 

    include "../DBConnector.php";

    $foodID = $_POST["food_ID"];
    $foodName = $_POST["new_food_name"];
    $price = $_POST["new_price"];
    $stock = $_POST["new_stock"];

    
    $getFood = "SELECT * FROM menu WHERE food_name='$foodName';";
    $foodExists = $conn->query($getFood)->fetch_assoc();
    if($foodExists && $foodID != $foodExists['food_ID']){
        echo "<script>alert('Food name already exists!')</script>";
    }else{
        $updateFood = "UPDATE menu SET food_name='$foodName', price='$price', stock='$stock' WHERE food_ID = $foodID;";
        $conn->query($updateFood);
    }

    header("refresh: 1;url=../views/manage-menu-view.php");
?>