<?php 

    // this will be used for printing ang receipt progress palang

    include '../DBConnector.php';

    
    if (isset($_POST['food_ID'])){

        $food_ID = $_POST["food_ID"];
        $foodAttributes = "SELECT * FROM menu WHERE food_ID = $food_ID";
        $retrievedAttributes = $conn->query($foodAttributes);
        $customer_ID = $_POST["customer_ID"];
    
        if ($retrievedAttributes->num_rows > 0) {
            
    
            $row = $retrievedAttributes->fetch_assoc();
    
            echo "<link rel='stylesheet' href='../css/cards.css'> ";
            echo "<link rel='stylesheet' href='../css/style.css'>";
            echo "<link rel='stylesheet' href='../css/buttons.css'>";

            echo "<div class='cards-container-food'>" .
                "<div class='cards-food'>" .
 
                    "<img class='center' src='" . $row['food_image'] . "' alt='" . $row['food_name'] . "'>" .
 
                    "<div class='container-food'>" .
                        "<h1><b>" . $row["food_name"] . "</b></h1>" .
                        "<h3> $" . $row["price"] . "</h3>" .
                        "<p class='lorem'>
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                        </p>".

                        "<div class='quantity center'>
                            <form action = 'order-view.php' method = 'post'>
                                <label for ='quantity'> Quantity: </label>
                                <input type='hidden' name='food_ID' value='" . $row['food_ID'] . "'>
                                <input type='hidden' name='food_name' value='" . $row['food_name'] . "'>
                                <input type='hidden' name='price' value='" . $row['price'] . "'>
                                <input type='hidden' name='customer_ID' value='" . $customer_ID . "'>
                                <input type='number' id='quantity' name='quantity' value='1' min='1'>
                                <button type='button' onclick='decrement()'>-</button>
                                <button type='button' onclick='increment()'>+</button>
                                <button type='submit' class='order' name='submit'> Submit Order </button>
                            </form>
                        </div>".

    
                    "</div>" .
                    
                "</div>" .
                "<br>" .
            "</div>";

            echo "<script>
                    function increment() {
                        var input = document.getElementById('quantity');
                        input.value = parseInt(input.value) + 1;
                    }

                    function decrement() {
                        var input = document.getElementById('quantity');
                        if (parseInt(input.value) > 1) {
                            input.value = parseInt(input.value) - 1;
                        }
                    }
                </script>";


    

    
        } else {
            echo "<script>
                alert('No matching food item')
            </script>";
        }




    } else {
        echo "<script>
            alert('Food ID not passed properly!')
        </script>";
    }







    




?>