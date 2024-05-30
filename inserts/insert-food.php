<?php 

    include "../DBConnector.php";

    $foodName = $_POST["food_name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    $getFood = "SELECT * FROM menu WHERE food_name='$foodName';";
    $foodExists = $conn->query( $getFood);
    if($foodExists->num_rows > 0){
        echo "<script>alert('Food name already exists!')</script>";
    }else{
        $insertOrders = "INSERT into menu (food_name, price, stock, food_image) VALUES ('$foodName', $price, $stock, '../foodImages/placeholder.png')";
        $conn->query($insertOrders);
    }

    header("refresh: 1;url=../views/manage-menu-view.php");
?>