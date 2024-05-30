<?php 
    session_start();
    include '../DBConnector.php';
    if (isset($_POST['food_ID'])){

        $foodID = $_POST["food_ID"];
        $foodAttributes = "SELECT * FROM menu WHERE food_ID = $foodID";
        $foodQuantityVal = 1;
        if(key_exists($foodID, $_SESSION['orders'])){
            $foodQuantityVal = $_SESSION['orders'][$foodID];
        }
        $retrievedAttributes = $conn->query($foodAttributes);
        if ($retrievedAttributes->num_rows > 0) {
            $row = $retrievedAttributes->fetch_assoc();
    
            echo "<link rel='stylesheet' href='../css/cards.css'> ";
            echo "<link rel='stylesheet' href='../css/style.css'>";
            echo "<link rel='stylesheet' href='../css/buttons.css'>";
            echo "<script src='https://kit.fontawesome.com/dc0eb96805.js' crossorigin='anonymous'></script>";

            echo "<div class='cards-container-food'>" .
                    "<div class='cards-food'>" .
                        "<div class='container-food'>" .
                            "<img class='center' src='" . $row['food_image'] . "' alt='" . $row['food_name'] . "'>" .
                            "<br>".
                            "<h1><b>" . $row["food_name"] . "</b></h1>" .
                            "<h3> $" . $row["price"] . "</h3>" .
                            "<p class='lorem'>
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.
                            </p>".
                            "<form action = '../inserts/session-insert-order.php' method = 'post'>
                                <input type='hidden' name='food_ID' value='" . $row['food_ID'] . "'>
                                <input type='hidden' name='food_name' value='" . $row['food_name'] . "'>
                                <input type='hidden' name='price' value='" . $row['price'] . "'>
                                <input type='hidden' id='order_date' name='order_date'>

                                <div class='quantity'>
                                    <button class ='quantifiable' type='button' onclick='decrement()'>
                                        <i class='fa-solid fa-minus'></i>
                                    </button>
                                    <input type='number' id='qtyInput' name='quantity' value=".$foodQuantityVal." min='0' max='".$row["stock"]."'>
                                    <button class ='quantifiable' type='button' onclick='increment()'>
                                        <i class='fa-solid fa-add'></i>
                                    </button>
                                </div>
                                <br> <br> <br>
                                <button type='submit' class='order' name='submit'> Add Order </button>
                                <button type='button' class='cancel' onclick ='goBack()'> Go Back </button> 
                            </form>" .
                        "</div>" .
                    "</div>" .
                "<br>" .
            "</div>";

            echo "<script>
                    function increment() {
                        var input = document.getElementById('qtyInput');
                        if(parseInt(input.value) < ".$row['stock']."){
                            input.value = parseInt(input.value) + 1;
                        }
                    }

                    function decrement() {
                        var input = document.getElementById('qtyInput');
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