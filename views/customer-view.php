<?php 
    
    session_start();
    $_SESSION = [];
    // print_r($_SESSION);
    include "../DBConnector.php";
    echo "<link rel='stylesheet' href='../css/style.css'>";
    echo "<link rel='stylesheet' href='../css/buttons.css'>";
    echo "<link rel='stylesheet' href='../css/cards.css'> ";

    echo "<div class='center-form'>".
            "<form action='../setups/setup-session-customer.php' method='post' class='form-control'>" .
                "<p class = 'title'> Customer Order Form </p>".

                "<div class = 'input-field'>".
                    "<input type='text' name='customer_name' id='customerName' required='' class ='input'>".
                    "<label for ='customerName' class='label' > Enter Name </label>".
                "</div>".

                "<div class = 'input-field'>".
                    "<input type='text' name='customer_address' id='customerAddress' class ='input'>".
                    "<label for ='customerAddress' class='label' > Address </label>".
                "</div>".
                "<button type='submit' class='submit-btn'>Make an Order</button>" .
            "</form>" .
        "</div>";

?>