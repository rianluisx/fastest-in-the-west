<?php 

    include '../DBConnector.php';
    $food_ID = $_POST["food_ID"];
    $food_qry = "SELECT * FROM menu WHERE food_ID = '$food_ID'";
    $food_result = $conn->query($food_qry)->fetch_assoc();
    echo "<style>
        label{
            display: block;
        }
        button{
            display: block;
        }
    </style>";
    echo "
    <form action='../updates/update-food.php' method='post'>
        <label>Food Name</label>
        <input type=text value='".$food_result['food_name']."' name='new_food_name' required>
        <label>Price</label>
        <input type=number min=0 value=".$food_result['price']." name='new_price' step=0.01 required>
        <label>Stock</label>
        <input type=number min=0 value=".$food_result['stock']." name='new_stock' required>
        <input type='hidden' name=food_ID value=$food_ID>
        <button type=submit>save</button>
    </form>
    ";
?>