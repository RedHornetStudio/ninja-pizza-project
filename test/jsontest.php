<?php 

    $dogs = json_decode(file_get_contents('dogs.json'));

    echo '<pre>';
    print_r($dogs);
    echo '</pre>';

    foreach($dogs as $dog) {
        echo '<li>' . $dog->name . ' is a ' . $dog->breed . '</li>';
    }

?>