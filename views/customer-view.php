<?php 
    
    session_start();
    $_SESSION = [];
    print_r($_SESSION);
    include "../DBConnector.php";
    echo "<link rel='stylesheet' href='../css/cards.css'> ";
    echo "<link rel='stylesheet' href='../css/style.css'>";
    echo "<link rel='stylesheet' href='../css/buttons.css'>";

    echo "<div class='cards-container-customer'>" .
            "<div class='cards-customer'>" .
                "<br><br><h3>Customer Order Form</h3><br><br>".
                "<form action='../setups/setup-session-customer.php' method='post'>" .
                    "<label for ='customerName' > Name: </label>".
                    "<input type='text' name='customer_name' id='customerName' required>".
                    "<br><br>".
                    "<label for ='customerAddress' > Address: </label>".
                    "<input type='text' name='customer_address' id='customerAddress' required>".
                    "<br><br>".
                    "<button type='submit' class='order'>Make an Order</button>" .
                "</form>" .
                "<div class='container-customer'>" .
                "</div>" .
            "</div>" .
            "<br>" .
        "</div>";
?>