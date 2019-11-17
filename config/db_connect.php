<?php

    $conn = mysqli_connect('localhost', 'redhornet', 'redhornet', 'ninja_pizza');

    if(!$conn) {
        echo "Connection error: " . mysqli_connect_error();
    }

?>