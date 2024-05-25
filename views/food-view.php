<?php 
    session_start();
    include '../DBConnector.php';
    if (isset($_POST['food_ID'])){

        $food_ID = $_POST["food_ID"];
        $foodAttributes = "SELECT * FROM menu WHERE food_ID = $food_ID";
        $foodQuantityVal = 1;
        if(key_exists($food_ID, $_SESSION['orders'])){
            $foodQuantityVal = $_SESSION['orders'][$food_ID];
        }
        $retrievedAttributes = $conn->query($foodAttributes);
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
                            <form action = '../inserts/session-insert-order.php' method = 'post'>
                                <label for ='quantity'> Quantity: </label>
                                <input type='hidden' name='food_ID' value='" . $row['food_ID'] . "'>
                                <input type='hidden' name='food_name' value='" . $row['food_name'] . "'>
                                <input type='hidden' name='price' value='" . $row['price'] . "'>
                                <input type='hidden' id='order_date' name='order_date'>
                                <input type='number' id='quantity' name='quantity' value=".$foodQuantityVal." min='0' max='".$row["stock"]."'>
                                <button type='button' onclick='decrement()'>-</button>
                                <button type='button' onclick='increment()'>+</button>
                                <button type='submit' class='order' name='submit'> Submit Order </button>
                            </form>
                            <br>
                            <button onclick='goBack()' class='go-back'>Go Back</button>
                        </div>".
                    "</div>" .
                "</div>" .
                "<br>" .
            "</div>";



            echo "<script>
                    function increment() {
                        var input = document.getElementById('quantity');
                        if(parseInt(input.value) < ".$row['stock']."){
                            input.value = parseInt(input.value) + 1;
                        }
                    }

                    function decrement() {
                        var input = document.getElementById('quantity');
                        if (parseInt(input.value) >= 1) {
                            input.value = parseInt(input.value) - 1;
                        }
                    }

                    function goBack() {
                        window.history.back();
                    }

                    document.querySelector('form').addEventListener('submit', function() {
                        var orderDateInput = document.getElementById('order_date');
                        var currentDate = new Date();
                        var formattedDate = currentDate.getFullYear() + '-' + 
                                            ('0' + (currentDate.getMonth() + 1)).slice(-2) + '-' + 
                                            ('0' + currentDate.getDate()).slice(-2) + ' ' + 
                                            ('0' + currentDate.getHours()).slice(-2) + ':' + 
                                            ('0' + currentDate.getMinutes()).slice(-2) + ':' + 
                                            ('0' + currentDate.getSeconds()).slice(-2);
                        orderDateInput.value = formattedDate;
                    });

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