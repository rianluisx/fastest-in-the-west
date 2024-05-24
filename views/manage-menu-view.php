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
            border-collapse: collapse;
        }
        td, th{
            padding: 10px;
            border: 1px solid;
        }
        h2{
            text-align: center;
        }
        #add-button{
            width: 35%;
            height: 30px;
            text-align: center;
        }
        .button-container{
            margin: 10px;
            text-align: center;
        }
        </style>";
    echo "<h2>Inventory</h2><table><tr><th>Food Name</th><th>Price</th><th>Stock</th><th>Image</th><th>Action</th></tr>";

    while ($row = $menuResult->fetch_assoc()) {
        echo "<tr>
                <td>".$row['food_name']."</td>
                <td>".$row['price']."</td>
                <td>".$row['stock']."</td>
                <td><img src='".$row['food_image']."'></td>
                
                <td>
                    <form action='food-view.php' method='post'>
                    <input type='text' name='food_ID' value=" . $row['food_ID'] . " style='display:none'>
                    <button type='submit'>Edit</button>
                    </form>
                </td>
            </tr>";
    }
    echo "</table>";
    echo "<div class='button-container'><form action='add-food.php' method='post'>
                <button type='submit' id='add-button'>Add</button>
        </form></div>
    "
?>