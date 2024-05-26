<?php 

    include '../DBConnector.php';
    $food_ID = $_POST["food_ID"];
    $food_qry = "SELECT * FROM menu WHERE food_ID = '$food_ID'";
    $food_result = $conn->query($food_qry)->fetch_assoc();

    echo "<link rel='stylesheet' href='../css/cards.css'>";
    echo "<link rel='stylesheet' href='../css/style.css'>";
    echo "<link rel='stylesheet' href='../css/buttons.css'>";

    echo "
        <div class='center-form'>
            <form action='../updates/update-food.php' method='post' class='form-control'>
                <h3 class='update-inventory'> Update Inventory </h3>
                <div class='container-update'></div>
                    <div class='input-field'>
                        <input type=text value='".$food_result['food_name']."' name='new_food_name' required class='input'>
                        <label class='label'>Food Name</label> 
                    </div>
                    <div class='input-field'>
                        <input type=number min=0 value=".$food_result['price']." name='new_price' step=0.01 required class='input'>
                        <label class='label'>Price</label>
                    </div>
                    <div class='input-field'>
                        <input type=number min=0 value=".$food_result['stock']." name='new_stock' required class='input'>
                        <label class='label'>Stock</label>
                        <input type='hidden' name=food_ID value=$food_ID>
                    </div>
                    <button type='submit'>Update</button>
                    <button type='button' onclick='goBack()'>Go Back</button>
                </div>
            </form>
        </div>

    ";

    echo "<script>
            function goBack(){ window.history.back() }
        </script>";

?>