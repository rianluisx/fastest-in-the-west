<?php 

    session_start();
    include '../DBConnector.php';
    include 'render-receipt.php';


    if (!isset($_SESSION['orders']) || empty($_SESSION['orders'])) {
        echo "<script>alert('No orders placed yet'); window.location.href = 'menu-view.php';</script>";
        exit();
    }

    renderReceipt($_SESSION['orders'], $conn);
    
    echo "<script>
            function goBack() {
                window.location.href = 'menu-view.php';
            }
        </script>";

    $conn->close();

?>