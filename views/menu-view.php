<?php 

    include '../DBConnector.php';

    $menuQuery = "SELECT * FROM menu";
    $menuResult = $conn->query($menuQuery);
    echo "<style>
    img{
        object-fit: cover;
        width: 100px;
        height: 100px;
    }
    table{
        width: 100%;
        text-align: center;
    }
    </style>";
    echo "<table><tr><th>Food Name</th><th>Price</th><th>Stock</th><th>Image</th><th>Action</th></tr>";
    while ($row = $menuResult->fetch_assoc()) {
        echo "<tr>
                <td>".$row['food_name']."</td>
                <td>".$row['price']."</td>
                <td>".$row['stock']."</td>
                <td><img src='".$row['food_image']."'></td>
                
                <td>
                    <form action='food-view.php' method='post'>
                    <input type='text' name='food_ID' value=" . $row['food_ID'] . " style='display:none'>
                    <button type='submit'>order</button>
                    </form>
                </td>
            </tr>";
    }


?>