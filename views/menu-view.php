<?php 

    include '../DBConnector.php';

    $menuQuery = "SELECT * FROM menu";
    $menuResult = $conn->query($menuQuery);

    if ($menuResult->num_rows > 0) {
        while ($row = $menuResult->fetch_assoc()) {

            echo "<link rel='stylesheet' href='../css/cards.css'> ";
            echo "<link rel='stylesheet' href='../css/style.css'>";
   
            echo "<div class ='cards'>";
                echo "<img class = 'center' src = '" . $row['food_image'] . "' alt = ' " .$row['food_name'] . " '";
                echo "<div class = 'container'>";
                    echo "<h4><b>" . $row['food_name'] . "</h4><b>";
                echo "</div>";
            echo "</div>";
  




        }
    }

    // echo "<style>
    // img{
    //     object-fit: cover;
    //     width: 100px;
    //     height: 100px;
    // }
    // table{
    //     width: 100%;
    //     text-align: center;
    // }
    // </style>";
    // echo "<table><tr><th>Food Name</th><th>Price</th><th>Stock</th><th>Image</th><th>Action</th></tr>";
    // while ($row = $menuResult->fetch_assoc()) {
    //     echo "<tr>
    //             <td>".$row['food_name']."</td>
    //             <td>".$row['price']."</td>
    //             <td>".$row['stock']."</td>
    //             <td><img src='".$row['food_image']."'></td>
                
    //             <td>
    //                 <form action='food-view.php' method='post'>
    //                 <input type='text' name='food_ID' value=" . $row['food_ID'] . " style='display:none'>
    //                 <button type='submit'>order</button>
    //                 </form>
    //             </td>
    //         </tr>";
    // }
?>