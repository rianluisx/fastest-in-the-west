<?php 

    include '../DBConnector.php';

    echo "<style>
        label{
            display: block;
        }
        button{
            display: block;
        }
    </style>";
    echo "
    <form action='../inserts/insert-food.php' method='post'>
        <label>Food Name</label>
        <input type=text value='Food' name='food_name' required>
        <label>Price</label>
        <input type=number min=0 value=0 name='price' step=0.01 required>
        <label>Stock</label>
        <input type=number min=0 value=0 name='stock' step=0.01 required>
        <button type=submit>save</button>
    </form>
    ";
?>