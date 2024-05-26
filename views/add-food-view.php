<?php 

    include '../DBConnector.php';

    echo "<link rel='stylesheet' href='../css/cards.css'>";
    echo "<link rel='stylesheet' href='../css/style.css'>";
    echo "<link rel='stylesheet' href='../css/buttons.css'>";

    echo "
        <div class='center-form'>
            <form action='../inserts/insert-food.php' method='post' class='form-control'>
                <h3 class='update-inventory'> Add to Inventory </h3>
                <div class='input-field'>
                    <input type=text value='Food' name='food_name' required class='input'>
                    <label class='label'>Food Name</label>  
                </div>
                <div class='input-field'>
                    <input type=number min=0 value=0 name='price' step=0.01 required class='input'>
                    <label class='label'>Price</label>  
                </div>
                <div class='input-field'>
                    <input type=number min=0 value=0 name='stock' step=0.01 required class='input'>
                    <label class='label'>Stock</label> 
                </div>
                <button type=submit>Add</button>
                <button type='button' onclick='goBack()'>Go Back</button>
            </form>
        </div>";

    echo "<script>
            function goBack(){ window.history.back(); }
        </script>";

?>