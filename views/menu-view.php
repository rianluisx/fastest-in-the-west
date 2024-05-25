<?php 

    session_start();
    include '../DBConnector.php';

    if(isset($_SESSION['customer_name']) && isset($_SESSION['customer_address'])) {
        $menuQuery = "SELECT * FROM menu";
        $menuResult = $conn->query($menuQuery);
        echo "<p class = 'menu-header'> Our Menu </p>";

        if ($menuResult->num_rows > 0) {
            while ($row = $menuResult->fetch_assoc()) {
                
                echo "<link rel='stylesheet' href='../css/cards.css'> ";
                echo "<link rel='stylesheet' href='../css/style.css'>";
                echo "<link rel='stylesheet' href='../css/buttons.css'>";
    


                echo "<div class='cards-container'>" .
                        "<div class='cards'>" .
                            "<form action='food-view.php' method='post'>" .
                                "<input type='image' class='center' src='" . $row['food_image'] . "' alt='" . $row['food_name'] . "'>" .
                                "<input type='hidden' name='food_ID' value='" . $row['food_ID'] . "'>" .
                            "</form>" .
                            "<div class='container'>" .
                                "<h4><b>" . $row["food_name"] . "</b></h4>" .
                            "</div>" .
                        "</div>" .
                    "<br>" .
                    "</div>";
            }
            echo "<br>";
            echo "<div class='cstm-buttons'>" .
                    "<button onclick ='registerOrder()' class='submit-order'> Submit Orders </button>" . "&nbsp" .
                    "<button onclick ='viewOrders()' class='view-order'> View Orders </button>".
                "</div>";
            
            echo "<script>
                    function registerOrder(){
                        window.location.href = '../inserts/insert-session.php';
                    }
                    function viewOrders(){
                        window.location.href = '../views/customer-receipt.php';
                    }
                    
                </script>";
        } else {
            echo "<script>alert('No menu items available');</script>";
        }
    } else {
        echo "<script>alert('An error occured with the session');</script>";
    }

?>
