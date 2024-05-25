<?php 

    include "../DBConnector.php";

    $food_name = $_POST["food_name"];
    $price = $_POST["price"];
    $stock = $_POST["stock"];

    $food_exists_qry = "SELECT * FROM menu WHERE food_name='$food_name';";
    $food_exists = $conn->query( $food_exists_qry);
    if($food_exists->num_rows > 0){
        echo "<script>alert('Food name already exists!')</script>";
    }else{
        $insertOrders = "INSERT into menu (food_name, price, stock, food_image) VALUES ('$food_name', $price, $stock, '../foodImages/placeholder.png')";
        $conn->query($insertOrders);
    }

    header("refresh: 1;url=../views/manage-menu-view.php");
?>